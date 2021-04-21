<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','buyer_id','amount','delivery_date','status','payment_status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
   

    public function items()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class,'transactionable');
    }


    public function getShowIdAttribute()
    {
        return "#".str_repeat(0,6-strlen((String) $this->id)).$this->id;
    }
}
