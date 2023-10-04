<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'purchase_price',
        'current_purchaseprice',
        'stock_id',
        'user_id',
        'stock_name'
    ];

    protected $table = 'portfolio';
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
   
}