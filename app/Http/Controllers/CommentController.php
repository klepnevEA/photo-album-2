<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;

class CommentController extends Controller
{
    public function create()
    {
        $this->validate(request(), [
            'text' => 'required|max:512',
            'photo_id' => 'required|integer|exists:photos,id'
        ]);

        try {
            $comment = Comment::create([
                'text' => request()->input('text'),
                'photo_id' => request()->input('photo_id'),
                'user_id' => auth()->user()->id
            ]);

            $comment->user = $comment->user()->first();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(['comment' => $comment], 200);
    }

    public function edit($id = null)
    {
        $validator = Validator::make(array_merge(request()->all(), ['id' => $id]), [
            'id' => 'required|integer|exists:comments',
            'text' => 'required|max:512'
        ]);

        if (!is_null($id) && $validator->fails()) {
            return response($validator->errors(), 422);
        }

        try {
            $comment = DB::transaction(function () use ($id) {
                $comment = Comment::where('id', $id)->first();

                $comment->text = request()->input('text');
                $comment->save();

                return $comment;
            });
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json($comment, 200);
    }
    
    public function get($id = null)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|integer|exists:comments']);

        if (!is_null($id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            $comment = Comment::where('id', $id)->first();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json($comment, 200);
    }

    public function delete($id = null)
    {
        $validator = Validator::make(['id' => $id], ['id' => 'required|integer|exists:comments']);

        if (!is_null($id) && $validator->fails()) {
            return response()->json(['id' => $validator->errors()->all()], 422);
        }

        try {
            Comment::where('id', $id)->first()->delete();
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response(null, 200);
    }
}
