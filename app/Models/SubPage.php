<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'slug', 'desc', 'lang'];
}
