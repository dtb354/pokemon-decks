<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'text',
        'type_tag_id',
        'strategy_tag_id',
        'image',
    ];
}
