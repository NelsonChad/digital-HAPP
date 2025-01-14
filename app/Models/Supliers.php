<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supliers extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'product_suppliers';

    protected $fillable = [
        'supplier_name',
        'contact'
    ];
}
