<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'document_path',
        'document_title',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
