<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // Tentukan nama tabel jika berbeda dari 'products'
    protected $table = 'products'; 

    // Field yang boleh diisi (fillable)
    protected $fillable = [
        'title', 
        'short_desc', 
        'price', 
        'image_url', 
        'detail_desc'
    ];
}