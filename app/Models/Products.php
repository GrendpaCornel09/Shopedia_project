<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Translation\CatalogueMetadataAwareInterface;
use App\Models\Categories;
use App\Models\CountriesOfOrigin;

use function PHPSTORM_META\map;

class Products extends Model
{
    use HasFactory;

    // public $timestamps=false;

    protected $fillable=[
        'product_name',
        'country_of_origin_id',
        'category_id',
        'price',
        'stock',
    ];

    protected $guarded=[
        'id',
    ];

    public function categories(){
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function countries_of_origin(){
        return $this->belongsTo(CountriesOfOrigin::class,'country_of_origin_id');
    }
}
