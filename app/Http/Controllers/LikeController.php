<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Requests;

class LikeController extends Controller
{
    public function like($photo_id = null)
    {
        $validator = Validator::make(['id' => $photo_id], ['id' => 'required|integer|exists:photos']);

        if (!is_null($photo_id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            $like = Like::where('user_id', auth()->user()->id)->where('photo_id', $photo_id)->first();

            if ($like) {
                return response()->json(['liked' => ['Лайк уже поставлен']], 422);
            }

            return Like::create([
                'user_id' => auth()->user()->id,
                'photo_id' => $photo_id
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json($like, 200);
    }

    public function unlike($photo_id = null)
    {
        $validator = Validator::make(['id' => $photo_id], ['id' => 'required|integer|exists:photos']);

        if (!is_null($photo_id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            $like = Like::where('user_id', auth()->user()->id)->where('photo_id', $photo_id)->first();

            if (!$like) {
                return response()->json(['unliked' => ['Лайка и так нет']], 422);
            }

            $like->delete();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(null, 200);
    }
}
