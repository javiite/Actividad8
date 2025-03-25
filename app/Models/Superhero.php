<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Superhero extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['real_name', 'hero_name', 'photo_url', 'additional_info'];
}

