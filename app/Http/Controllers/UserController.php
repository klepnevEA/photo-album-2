<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use DB;
use Mail;
use Image;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;


class UserController extends Controller
{
    public function auth()
    {
        $this->validate(request(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'remember' => 'boolean'
        ]);

        // TODO: поправить запоминание пользователя
        try {
            if (!User::where('email', request()->input('email'))->first()->is_active) {
                return response()->json(['notactive' => ['Пользователь не активирован']], 401);
            }

            if (!auth()->attempt([
                'email' => request()->input('email'),
                'password' => request()->input('password')
            ], request()->input('remember'))
            ) {
                return response()->json(['unauthorized' => ['Email или пароль не верен']], 401);
            }
        } catch (QueryException $e) {
            return response()->json(['message' => ['Ошибка на стороне сервера']], 500);
        }

        return response()->json(array_merge(auth()->user()->toArray(),
            ['remember' => auth()->viaRemember()]), 200);
    }

    public function create()
    {
        $this->validate(request(), [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:32',
            'password' => 'required|min:8'
        ]);

        try {
            $user = DB::transaction(function () {
                $user = User::create([
                    'name' => request()->input('name'),
                    'email' => request()->input('email'),
                    'password' => bcrypt(request()->input('password')),
                    'activation_code' => strtolower(str_random(50))
                ]);

                Mail::send('auth.emails.activate', ['link' => url('/api/user/activate/' . $user->id . '/' . $user->activation_code)], function ($m) use ($user) {
                    $m->to($user->email)->subject('Активация пользователя ' . $user->name . ' ' . $user->email);
                });

                return $user;
            });
        } catch (QueryException $e) {
            return response()->json(['message' => ['Ошибка на стороне сервера']], 500);
        }

        return $user;
    }

    public function activate($id, $activation_code)
    {
        $validator = Validator::make([
            'id' => $id,
            'activation_code' => $activation_code
        ], [
            'id' => 'integer|exists:users',
            'activation_code' => 'exists:users'
        ]);

        if (!is_null($id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            $user = User::where('id', $id)->first();

            if ($user->is_active) {
                response()->json(['activated' => ['Пользователь уже активирован']]);
            }

            $user->is_active = true;
            $user->save();

            auth()->login($user);
        } catch (QueryException $e) {
            return response()->json(['message' => ['Ошибка на стороне сервера']], 500);
        }

        return redirect()->to('/');
    }

    public function get()
    {
        $this->validate(request(), ['id' => 'integer|exists:users']);

        try {
            $user = request()->has('id') ? User::where('id', request()->input('id'))->first() : auth()->user();
            $user->albums = $user->albums()->get();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['user' => $user], 200);
    }

    public function getAlbums()
    {
        $this->validate(request(), ['id' => 'integer|exists:users']);

        try {
            $albums = request()->has('id') ? User::where('id', request()->input('id'))->first()->albums()->get() : auth()->user()->albums()->get();

            foreach ($albums as $album) {
                $album->cover = $album->cover()->first();
                $album->photosCount = $album->photos()->count();
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => ['Ошибка на стороне сервера']
            ], 500);
        }

        return response()->json(['albums' => $albums], 200);
    }

    public function getPhotos($id = null)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'integer|exists:users']);

        if (!is_null($id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            $photos = $id ? User::where('id', $id)->first()->photos()->get() : auth()->user()->photos()->get();
        } catch (QueryException $e) {
            return response()->json([
                'message' => ['Ошибка на стороне сервера']
            ], 500);
        }

        return response()->json($photos, 200);
    }

    public function edit()
    {
        $this->validate(request(), [
            'name' => 'required|max:32',
            'surname' => 'max:32',
            'about' => 'max:512',
            'social_vk' => 'max:256|url',
            'social_fb' => 'max:256|url',
            'social_tw' => 'max:256|url',
            'social_g' => 'max:256|url',
            'avatar' => 'mimes:jpeg,bmp,png|max:2500',
            'background' => 'mimes:jpeg,bmp,png|max:2500'
        ]);

        if (request()->file('background') && (Image::make(request()->file('background'))->width() < 1200 || Image::make(request()->file('background'))->height() < 600)) {
            return response()->json(['message' => ['Изображение должно иметь разрешение 1200х600 минимум']], 422);
        }

        try {
            $user = DB::transaction(function () {
                if (request()->file('avatar')) {
                    auth()->user()->setAvatar(request()->file('avatar'))->save();
                }

                if (request()->file('background')) {
                    auth()->user()->setBackground(request()->file('background'))->save();
                }

                auth()->user()->update([
                    'name' => request()->input('name'),
                    'surname' => request()->input('surname'),
                    'about' => request()->input('about'),
                    'social_vk' => request()->input('social_vk'),
                    'social_fb' => request()->input('social_fb'),
                    'social_tw' => request()->input('social_tw'),
                    'social_g' => request()->input('social_g')
                ]);

                $user = auth()->user();
                $user->albums = $user->albums()->get();

                return $user;
            });

        } catch (QueryException $e) {
            return response()->json([
                'message' => ['Ошибка на стороне сервера']
            ], 500);
        }

        return response()->json(['user' => $user], 200);
    }

    public function isLogined()
    {
        $isLogined = auth()->check();

        if (!$isLogined) {
            return response(null, 401);
        }

        return response(null, 200);
    }

    public function logout()
    {
        auth()->logout();
        return response(null, 200);
    }
}
