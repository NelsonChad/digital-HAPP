<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'cover',
        'link',
        'email',
        'facebook'=> 1,
        'instagram',
        'whatsapp',
        'showInfo',
        'active',
        'publish_plans_id',
    ];

    use HasFactory;
}
