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
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function strategyTag()
    {
        return $this->belongsTo(StrategyTag::class, 'strategy_tag_id');
    }

    public function typeTag()
    {
        return $this->belongsTo(TypeTag::class, 'type_tag_id');
    }

}
