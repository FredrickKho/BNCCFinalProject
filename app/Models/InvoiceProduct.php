<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $primaryKey = 'invoice_products_id';
    protected $fillable = ['invoiceNumber','address','zipcode'];

    public function Invoice(){
        return $this->hasMany(Invoice::class);
    }
    use HasFactory;
}
