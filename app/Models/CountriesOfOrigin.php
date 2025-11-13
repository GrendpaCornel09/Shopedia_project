<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class CountriesOfOrigin extends Model
{
    use HasFactory;

    // public $timestamps=false;

    protected $table='countries_of_origin';

    protected $fillable=[
        'country_of_origin',
    ];

    protected $guarded=[
        'id',
    ];

    public function products(){
        return $this->hasMany(Products::class,'countries_of_origin');
    }
}
