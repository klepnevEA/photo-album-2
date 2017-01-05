<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests;

class AlbumController extends Controller
{
    public function create()
    {
        $this->validate(request(), [
            'name' => 'required|max:64',
            'description' => 'max:512',
            'image' => 'required|mimes:jpeg,bmp,png|max:2500'
        ]);

        try {
            $album = DB::transaction(function () {
                $photo = Photo::create([
                    'user_id' => auth()->user()->id
                ])->setImage(request()->file('image'));

                $photo->save();

                $album = Album::create([
                    'name' => request()->input('name'),
                    'description' => request()->input('description'),
                    'cover_id' => $photo->id,
                    'user_id' => auth()->user()->id
                ]);

                $photo->album_id = $album->id;

                $photo->save();

                $album->cover = $album->cover()->first();
                $album->cover->user = $photo->user()->first();
                $album->cover->album = $photo->album()->first();
                $album->cover->likesCount = $photo->likes()->count();
                $album->cover->commentsCount = $photo->comments()->count();
                $album->photosCount = $album->photos()->count();

                return $album;
            });
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(['album' => $album], 200);
    }

    public function edit($id = null)
    {
        $validator = Validator::make(array_merge(request()->all(), ['id' => $id]), [
            'id' => 'required|integer|exists:albums',
            'name' => 'max:64',
            'description' => 'max:512',
            'image' => 'mimes:jpeg,bmp,png|max:2500'
        ]);

        if (!is_null($id) && $validator->fails()) {
            return response($validator->errors(), 422);
        }

        try {
            $album = DB::transaction(function ($id) use ($id) {
                $album = Album::where('id', $id)->first();

                $album->update([
                    'name' => request()->input('name'),
                    'description' => request()->input('description')
                ]);


                if (!is_null(request()->file('image'))) {
                    $photo = Photo::create([
                        'album_id' => $album->id,
                        'user_id' => auth()->user()->id
                    ])->setImage(request()->file('image'));

                    $photo->save();

                    $album->cover_id = $photo->id;
                    $album->save();

                    $album->cover = $album->cover()->first();
                    $album->cover->user = $photo->user()->first();
                    $album->cover->album = $photo->album()->first();
                    $album->cover->likesCount = $photo->likes()->count();
                    $album->cover->commentsCount = $photo->comments()->count();
                    $album->photosCount = $album->photos()->count();
                }

                return $album;
            });
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(['album' => $album], 200);
    }

    public function get()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:albums']);

        try {
            $album = Album::where('id', request()->input('id'))->first();
            $album->cover = $album->cover()->first();
            $album->user = $album->user()->first();
            $album->photos = $album->photos()->get();
            $album->photosCount = $album->photos->count();

            $album->commentsCount = 0;
            $album->likesCount = 0;

            foreach ($album->photos as $photo) {
                $photo->commentsCount = $photo->comments()->count();
                $album->commentsCount += $photo->commentsCount;
                $photo->likesCount = $photo->likes()->count();
                $album->likesCount += $photo->likesCount;
                $photo->user = $photo->user()->first();
                $photo->isLiked = $photo->likes()->where('user_id', auth()->user()->id)->first() ? true : false;
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['album' => $album], 200);
    }

    public function getCover()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:albums']);

        try {
            $cover = Album::where('id', request()->input('id'))->first()->cover()->get();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['cover' => $cover], 200);
    }

    public function getPhotos()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:albums']);

        try {
            $photos = Album::where('id', request()->input('id'))->first()->photos()->get();

            foreach ($photos as $photo) {
                $photo->user = $photo->user()->first();
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['photos' => $photos], 200);
    }

    public function getPhotosCount()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:albums']);

        try {
            $photosCount = Album::where('id', request()->input('id'))->first()->photos()->count();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['count' => $photosCount], 200);
    }

    public function delete()
    {
        $this->validate(request(), ['id' => 'required|integer|exists:albums']);

        try {
            DB::transaction(function ($id) {
                $album = Album::where('id', request()->input('id'))->first();

                $album->photos()->delete();

                $album->delete();
            });
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(null, 200);
    }
}
