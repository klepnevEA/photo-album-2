<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'object_id'
    ];

    public function photo() {
        return $this->belongsTo('App\Photo', 'object_id');
    }

    public static function createFromString($string, $id) {
        $hashtags = [];

        // Поиск хэштегов
        preg_match_all("/#[a-zа-я\\d]+/ui", $string, $hashtags);

        // Удаление повторов
        $hashtags = array_unique($hashtags[0]);

        foreach ($hashtags as $hashtag) {
            $tag = substr($hashtag, 1);

            Hashtag::create([
                'name' => $tag,
                'object_id' => $id
            ]);
        }
    }

    public static function deleteByObjectId($id) {
        Hashtag::where('object_id', $id)->delete();
    }
}
