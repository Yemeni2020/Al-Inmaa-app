<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About_us extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'description','image_path'];
    // Define the fillable attributes
    protected $fillable = ['title', 'description', 'image'];

    // Define an accessor to get the full URL of the image
    public function getImageUrlAttribute()
    {
        // Check if image exists and return its URL
        if ($this->image) {
            return Storage::url($this->image);
        }

        // If no image is found, return a default image (optional)
        // return asset('images/default-about-us.jpg'); // Ensure you have a default image in your public directory
    }
}
