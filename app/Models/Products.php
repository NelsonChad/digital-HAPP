<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Product_brands;
use App\Models\Product_categories;
use App\Models\Pharmacies;
use Illuminate\Database\Eloquent\Builder;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'code',
        'price',
        'description',
        'brand_id',
        'category_id',
        'pharmacy_id',
    ];

    // filament multi tenancy method
    protected static function booted(): void
    {
        // It return only the products of it pharmency in global scope
        static::addGlobalScope('by_farmacy', function (Builder $query) {
            if (auth()->check()) {
                if(auth()->user()->pharmacy_id != "1"){
                    $query->where('pharmacy_id', auth()->user()->pharmacy_id);
                }
            }
        });
    }

    public function pharmacies()
    {
        return $this->belongsToMany(Pharmacies::class);
    }

    public function search(String $prodName){

        $pharmacies = $this->where(function ($query) use ($prodName){

            if($prodName != ""){
                $query->where('products.name','like',  "%{$prodName}%");
                $query->where('pharmacies.visible',1);
            }
    
        })
        ->join('pharmacies', 'pharmacies.id', '=', 'products.pharmacy_id')
        ->select(
            'pharmacies.id as pharmacy_id',
            'pharmacies.latitude',
            'pharmacies.longitude',
            'pharmacies.name',
            'pharmacies.address',
            'pharmacies.logo',
            'products.name as product_name',
            'products.id as product_id',
            Pharmacies::raw('count(*) as total_products'),
            )
        ->groupBy('pharmacies.id') // Group by pharmacy ID- to not repeat
        ->orderBy('pharmacies.name', 'asc')
        ->get();

        return $pharmacies; 
    }

    public function category(){
        return $this->belongsTo(Product_categories::class);
    }
    public function brand(){
        return $this->belongsTo(Product_brands::class);
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacies::class);
    }
}
