<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Image;
use Storage;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'about',
        'social_vk',
        'social_fb',
        'social_tw',
        'social_g',
        'email',
        'password',
        'activation_code',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activation_code',
        'is_active'
    ];

    public function albums() {
        return $this->hasMany('App\Album');
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function setAvatar($image)
    {
        $avatarFolder = 'avatar/';
        $extension = $image->getClientOriginalExtension();

        $storage = Storage::disk('public');

        // Подбор еще не существующего имени изображения
        do {
            $avatarName = strtolower(str_random(25)) . '_' . time();
            $imagePath = $avatarFolder . $avatarName . '.' . $extension;
        } while ($storage->has($imagePath));

        // Удаляем существуещее изображение
        if(!empty($this->attributes['avatar_path'])) {
            $storage->delete($this->attributes['avatar_path']);
        }

        // Сохранение аватара
        $avatar = Image::make($image);
        $avatar->fit(126, 126);
        $storage->put($imagePath, $avatar->stream());

        $this->attributes['avatar_path'] = $imagePath;
        $this->attributes['avatar_url'] = 'storage/' . $imagePath;

        return $this;
    }

    public function setBackground($image)
    {
        $backgroundFolder = 'background/';
        $extension = $image->getClientOriginalExtension();

        $storage = Storage::disk('public');

        // Подбор еще не существующего имени изображения
        do {
            $backgroundName = strtolower(str_random(25)) . '_' . time();
            $imagePath = $backgroundFolder . $backgroundName . '.' . $extension;
        } while ($storage->has($imagePath));

        // Удаляем существуещее изображение
        if(!empty($this->attributes['background_path'])) {
            $storage->delete($this->attributes['background_path']);
        }

        // Сохранение аватара
        $background = Image::make($image);

        // Сохранение аватара
        $storage->put($imagePath, $background->stream());

        $this->attributes['background_path'] = $imagePath;
        $this->attributes['background_url'] = 'storage/' . $imagePath;

        return $this;
    }
}