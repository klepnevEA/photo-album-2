<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'album_id',
        'user_id'
    ];

    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    public function coveredAlbum()
    {
        return $this->hasOne('App\Album', 'cover_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function hashtags()
    {
        return $this->hasMany('App\Hashtag', 'object_id', 'id');
    }

    public function get()
    {
        $this->user = $this->user()->first();
        $this->album = $this->album()->first();
        $this->likesCount = $this->likes()->count();
        $this->commentsCount = $this->comments()->count();
        $this->isLiked = $this->likes()->where('user_id', auth()->user()->id)->first() ? true : false;

        return $this;
    }

    public function setImage($image)
    {
        $photoFolder = 'photo/';
        $extension = $image->getClientOriginalExtension();
        $thumbnailFolder = 'photo/thumbnail';

        $storage = Storage::disk('public');

        // Подбор еще не существующего имени изображения
        do {
            $photoName = strtolower(str_random(25)) . '_' . time();
            $imagePath = $photoFolder . $photoName . '.' . $extension;
            $thumbnailPath = $thumbnailFolder . $photoName . '-thumbnail.' . $extension;
        } while ($storage->has($imagePath));

        // Удаляем существуещее изображение
        if (!empty($this->attributes['image_path'])) {
            $storage->delete($this->attributes['image_path']);
            $storage->delete($this->attributes['thumbnail_path']);
        }

        // Сохранение миниатюры
        $thumbnail = Image::make($image);
        $thumbnail->fit(380, 380);
        $storage->put($thumbnailPath, $thumbnail->stream());

        // Сохранение изображения
        $photo = Image::make($image);
        $storage->put($imagePath, $photo->stream());

        $this->attributes['image_path'] = $imagePath;
        $this->attributes['image_url'] = 'storage/' . $imagePath;
        $this->attributes['thumbnail_path'] = $thumbnailPath;
        $this->attributes['thumbnail_url'] = 'storage/' . $thumbnailPath;

        return $this;
    }
}
