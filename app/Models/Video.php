<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description', // Adding description to fillable
        'original_path',
        'path_360p',
        'path_480p',
        'path_720p',
        'path_1080p',
        'status',
        'category_id', // Adding category_id to fillable
    ];

    public function videocategory()
    {
        return $this->belongsTo(VideoCategory::class, 'category_id', 'id');
    }
}
