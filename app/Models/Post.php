<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content','user_id'];
    // protected $guarded = [];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}