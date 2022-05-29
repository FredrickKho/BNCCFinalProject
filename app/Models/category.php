<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{   
    protected $primaryKey='category_id';
    protected $fillable = ['category_name'];
    public function Product(){
        return $this->belongsToMany(Product::class);
    }
    use HasFactory;
}
