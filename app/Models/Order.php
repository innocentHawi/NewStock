<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'investor_id',
        'stock_id',
        'quantity',
        'small_business_id',
        'orderType',
        'created_at',
    ];

    protected $table = 'order';

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function smallBusiness()
    {
        return $this->belongsTo(SmallBusiness::class);
    }
}