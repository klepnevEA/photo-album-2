<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cover_id',
        'user_id'
    ];

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function cover() {
        return $this->belongsTo('App\Photo', 'cover_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
