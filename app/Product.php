<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id','product_name','product_type','product_description','unit_id','image'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
    public  function  sellerProposes(){
        return $this->hasMany(SellerPropose::class);

    }

    public function getSalesRateAttribute()
    {
        return blank($this->productPrices->sortByDesc('updated_date')->first()) ? '' : $this->productPrices->sortByDesc('updated_date')->first()->sales_rate;
    }
}
