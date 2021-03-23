<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'user_id',
    ];


    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user() //foreign key user_id
    {
        return $this->belongsTo(User::class);
    }
}
