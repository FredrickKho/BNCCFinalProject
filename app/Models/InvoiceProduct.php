<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    protected $primaryKey=['invoice_id','product_id'];
    protected $fillable = ['invoice_id','product_id'];
    use HasFactory;
}
