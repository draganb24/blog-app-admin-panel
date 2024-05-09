<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentlyLoggedInUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_token',
        'browser'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
