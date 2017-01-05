<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Photo;
use App\Hashtag;
use Illuminate\Http\Request;
use App\Http\Requests;

class PhotoController extends Controller
{
    public function create()
    {
        $this->validate(request(), [
            'name' => 'max:64',
            'description' => 'max:512',
            'image.*' => 'required|mimes:jpeg,bmp,png|max:2500',
            'album_id' => 'required|integer|exists:albums,id'
        ]);

        try {
            $photos = DB::transaction(function () {
                $photos = [];
                if (is_array(request()->file('image'))) {
                    foreach (request()->file('image') as $image) {
                        $photo = Photo::create([
                            'name' => request()->input('name'),
                            'description' => request()->input('description'),
                            'album_id' => request()->input('album_id'),
                            'user_id' => auth()->user()->id
                        ]);

                        $photo->setImage($image)->save();

                        $photo->user = $photo->user()->first();
                        $photo->album = $photo->album()->first();
                        $photo->likesCount = $photo->likes()->count();
                        $photo->commentsCount = $photo->comments()->count();
                        $photo->isLiked = false;

                        array_push($photos, $photo);
                    }
                } else {
                    $photo = Photo::create([
                        'name' => request()->input('name'),
                        'description' => request()->input('description'),
                        'album_id' => request()->input('album_id'),
                        'user_id' => auth()->user()->id
                    ]);

                    $photo->setImage(request()->file('image'))->save();

                    $photo->user = $photo->user()->first();
                    $photo->album = $photo->album()->first();
                    $photo->likesCount = $photo->likes()->count();
                    $photo->commentsCount = $photo->comments()->count();
                    $photo->isLiked = false;

                    array_push($photos, $photo);
                }

                return $photos;
            });
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(['photos' => $photos], 200);
    }

    public function edit($id = null)
    {
        $validator = Validator::make(array_merge(request()->all(), ['id' => $id]), [
            'id' => 'required|integer|exists:photos',
            'name' => 'max:64',
            'description' => 'max:512',
        ]);

        if (!is_null($id) && $validator->fails()) {
            return response($validator->errors(), 422);
        }

        try {
            $photo = Photo::where('id', $id)->first();

            $photo->update([
                'name' => request()->input('name'),
                'description' => request()->input('description')
            ]);

            // Удалим все хэштеги фото
            Hashtag::deleteByObjectId($id);
            // Создадим новые хэштеги
            Hashtag::createFromString($photo->description, $id);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json($photo, 200);
    }

    public function get()
    {
        $this->validate(request(), [
            'id' => 'integer|exists:photos',
            'take' => 'integer',
            'skip' => 'integer',
        ]);

        try {
            if (request()->has('id')) {
                $photos = [Photo::where('id', request()->input('id'))->first()];
            } else {
                $photos = array_slice(Photo::all()->sortByDesc('updated_at')->all(),
                    request()->has('skip') ? request()->input('skip') : 0,
                    request()->has('take') ? request()->input('take') : 6);
            }

            foreach ($photos as $photo) {
                $photo->user = $photo->user()->first();
                $photo->album = $photo->album()->first();
                $photo->likesCount = $photo->likes()->count();
                $photo->commentsCount = $photo->comments()->count();
                $photo->isLiked = $photo->likes()->where('user_id', auth()->user()->id)->first() ? true : false;
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['photos' => $photos], 200);
    }

    public function getUser()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:photos']);

        try {
            $user = Photo::where('id', request()->input('id'))->first()->user()->get();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['users' => $user], 200);
    }

    public function getAlbum()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:photos']);

        try {
            $album = Photo::where('id', request()->input('id'))->first()->album()->get();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['albums' => $album], 200);
    }

    public function getLikesCount()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:photos']);

        try {
            $likesCount = Photo::where('id', request()->input('id'))->first()->likes()->count();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['count' => $likesCount], 200);
    }

    public function getComments()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:photos']);

        try {
            $comments = Photo::where('id', request()->input('id'))->first()->comments()->get();

            foreach ($comments as $comment) {
                $comment->user = $comment->user()->first();
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['comments' => $comments], 200);
    }

    public function getCommentsCount()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:photos']);

        try {
            $commentsCount = Photo::where('id', request()->input('id'))->first()->comments()->count();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['count' => $commentsCount], 200);
    }

    public function delete($id = null)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|integer|exists:photos']);

        if (!is_null($id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            $photo = Photo::where('id', $id)->first();

            if (!is_null($photo->coveredAlbum()->first())) {
                return response()->json([
                    'message' => 'Нельзя удалить обложку альбома!'
                ], 422);
            }

            $comments = $photo->comments()->get();

            foreach ($comments as $comment) {
                $comment->delete();
            }

            $photo->delete();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(null, 200);
    }
}
