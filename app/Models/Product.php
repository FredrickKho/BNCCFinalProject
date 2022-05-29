<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = ['category','name','price','qty','picture'];
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function invoice(){
        return $this->belongsToMany(Invoice::class);
    }
}
