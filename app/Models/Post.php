<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "slug", "likes", "content", "user_id"
    ] ;  

    protected $casts = [
        "likes" => 'integer'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
