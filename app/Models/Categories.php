<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Categories extends Model
{
    use HasFactory;

    // public $timestamps=false;

    protected $fillable=[
        'category_name',
    ];

    protected $guarded=[
        'id',
    ];

    public function products(){
        return $this->hasMany(Products::class,'categories');
    }
}
