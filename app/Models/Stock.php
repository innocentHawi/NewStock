<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_name',
        'current_purchaseprice',
        'past_purchaseprice',
        'quantity',
        'user_id',
        'type',
    ];
    public function smallBusiness()
    {
        return $this->belongsTo(SmallBusiness::class);
    }
}