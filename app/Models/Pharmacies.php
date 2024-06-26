<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pharmacies extends Model
{
    use HasFactory;

    protected $table = 'pharmacies';

    protected $fillable = [
        'name',
        'logo',
        'slogan',
        'address',
        'latitude',
        'longitude',
        'open_time',
        'close_time',
        'province_id'
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class);
    }

    public function search(String $prodName){

        $pharmacies = $this->where(function ($query) use ($prodName){

            if($prodName != ""){
                $query->where('products.name','like',  "%{$prodName}%");
            }
    
        })
        ->join('pharmacies', 'pharmacies.id', '=', 'products.pharmacy_id')
        ->select(
            'pharmacies.id as pharmacy_id',
            'pharmacies.latitude',
            'pharmacies.longitude',
            'pharmacies.name',
            'pharmacies.address',
            'products.name as product_name',
            'products.id as product_id',
            DB::raw('count(*) as total_products'),
            )
        ->groupBy('pharmacies.id') // Group by pharmacy ID- to not repeat
        ->orderBy('pharmacies.name', 'asc')
        ->get();

        return $pharmacies; 
    }

    public function province(){
        return $this->belongsTo(Provinces::class);
    }
}
