<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'content',
        'author',
        'slug',
        'date_of_publishment',
        'image_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id', 'image_id');
    }

}
