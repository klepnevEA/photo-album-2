<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Validator;
use Storage;
use File;
use Image;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Photo;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    /**
     * Удаляет пустые элементы в массиве
     *
     * @param array $array
     * @param array $fields
     * @return array
     */
    protected static function removeEmptyFields(Array $array, Array $fields = []) {
        return array_filter($array,
            function ($element)
            {
                return !empty($element);
            }
        );
    }

    /**
     * Исключает из массива $request поля, не содержащиеся в массиве $accepted
     *
     * @param array $request
     * @param array $accepted
     * @return array
     */
    protected static function sanitizeRequestData(Array $request, Array $accepted = []) {
        $data = $request;

        foreach ($request as $key => $value) {
            if (in_array($key, $accepted)) {
                continue;
            }

            unset($data[$key]);
        }

        return $data;
    }
}
