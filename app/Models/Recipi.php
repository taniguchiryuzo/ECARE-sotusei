<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipi extends Model
{
    use HasFactory;
    protected $table = 'recipis';
    protected $fillable = ['title', 'image', 'body', 'material', 'foodform', 'type'];
}
