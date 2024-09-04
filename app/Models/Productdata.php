<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productdata extends Model
{
    use HasFactory;
    
    protected $table ="productdata";
    protected $primaryKey="id";
    protected $fillable = [
        'name',        // Example: the name of the product
        'amount',       // Example: the price of the product
        'description', 
        'image'
        // Example: a description of the product
        // Add any other fields that should be mass-assignable
    ];
}
