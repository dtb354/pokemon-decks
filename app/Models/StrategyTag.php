<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategyTag extends Model
{
    use Hasfactory;
    public $timestamps = false; // 🔹 important, disables created_at & updated_at

    protected $fillable = ['name'];
}
