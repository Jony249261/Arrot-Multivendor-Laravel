<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerPropose extends Model
{
    protected $fillable = ['product_id','seller_id','price','quantity','total'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
