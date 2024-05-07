<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class learning_data extends Model
{
    use HasFactory;

    
    protected $table = 'learning_data';


    protected $fillable = [
        'id',
        'name',
        'studyhour',
        'month',
        'user_id',
        'category_id',
    ];
}
