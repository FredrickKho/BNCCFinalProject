<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = ['invoice_id','product_id'];
    protected $fillable = ['invoice_num','product_id','qty','address','zipcode'];
    
    use HasFactory;
}
