<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'surname',
        'avatar',
        'number',
        'email',
        'password',
        'latitude',
        'longitude',
        'type',
        'login_type',
        'fcm_device_key',
        'facebook_token',
        'google_token',
        'type_id',
    ];
}
