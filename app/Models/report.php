<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'violence_id',
    ];
}
