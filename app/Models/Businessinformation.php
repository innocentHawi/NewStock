<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businessinformation extends Model
{
    use HasFactory;

    protected $table = 'businessinformation';

    protected $fillable = [
        'business_name',
        'description',
        'address',
        'website',
        'user_id',
    ];

   
}