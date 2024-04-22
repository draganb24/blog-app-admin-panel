<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
    ];

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}

