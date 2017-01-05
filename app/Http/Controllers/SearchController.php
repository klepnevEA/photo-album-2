<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function search()
    {
        $this->validate(request(), ['query' => 'required']);

        try {
            $photos = [];

            if (preg_match('/^#/', request()->input('query'))) {
                // Поиск по хэштегам
                $hashtag = substr(request()->input('query'), 1);

                $results = Hashtag::where('name', $hashtag)->get();

                foreach ($results as $result) {
                    array_push($photos, $result->photo()->first()->get());
                }
            } else {
                $words = explode(' ', request()->input('query'));
                foreach ($words as $word) {
                    // Поиск по названиям фото
                    $resultsByTitle = Photo::where('name', 'like', '%' . $word . '%')->get();
                    foreach ($resultsByTitle as $result) {
                        array_push($photos, $result->get());
                    }

                    // Поиск по описаниям фото
                    $resultsByDesctiption = Photo::where('description', 'like', '%' . $word . '%')->get();
                    foreach ($resultsByDesctiption as $result) {
                        array_push($photos, $result->get());
                    }
                }
            }

            // Удаляем повторы
            $photos = array_unique($photos);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ошибка на стороне сервера'
            ], 500);
        }

        return response()->json(['photos' => $photos], 200);
    }
}
