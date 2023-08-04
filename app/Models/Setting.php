<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_web',
        'logo',
        'meta_keyword',
        'meta_desc',
        'desc',
        'alamat',
        'email',
        'url_facebook',
        'url_twitter',
        'url_youtube',
        'url_instagram',
        'url_tiktok',
        'lat',
        'long',
        'phone'
    ];
}
