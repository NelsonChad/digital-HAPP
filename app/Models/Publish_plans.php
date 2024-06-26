<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish_plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan',
        'duration',
        'price',
    ];

}
 