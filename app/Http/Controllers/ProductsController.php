<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(){
        $products=Products::paginate(10);
        if($products->isEmpty()){
            return response()->json([
                'message'=>'products table is empty.',
            ], 200);
        }
        return response()->json([
            'products'=>$products->items(),
            'pagination'=>[
                'current_page'=>$products->currentPage(),
                'last_page'=>$products->lastPage(),
                'per_page'=>$products->perPage(),
                'total'=>$products->total(),
                'next_page_url'=>$products->nextPageUrl(),
                'previous_page_url'=>$products->previousPageUrl(),
            ],
        ], 200);
    }

    public function show(string $id){
        $product=Products::find($id);
        if($product){
            return response()->json([
                'product'=>$product,
            ],200);
        }else{
            return response()->json([
                'message'=>'product not found.',
            ],404);
        }
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|string|max:50',
            'country_of_origin_id'=>'required|integer|exists:countries_of_origin,id',
            'category_id'=>'required|integer|exists:categories,id',
            'price'=>'required|numeric|min:0',
            'stock'=>'required|integer|min:0',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $products=Products::create($request->all());
        return response()->json([
            'message'=>'product created successfully.',
            'products'=>$products,
        ],201);
    }

    public function update(string $id,Request $request){
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|string|max:50',
            'country_of_origin_id'=>'required|integer|exists:countries_of_origin,id',
            'category_id'=>'required|integer|exists:categories,id',
            'price'=>'required|numeric|min:0',
            'stock'=>'required|integer|min:0',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $product=Products::find($id);
        if(!$product){
            return response()->json([
                'message'=>'product not found.',
            ],404);
        }

        $product->update($request->all());
        return response()->json([
            'message'=>'product updated successfully.',
        ],200);
    }

    public function destroy(string $id){
        $product=Products::find($id);
        if(!$product){
            return response()->json([
                'message'=>'Produk tidak ditemukan',

            ],404);
        }

        $product->delete();
        return response()->json([
            'message'=>'product deleted successfully.',
        ],200);
    }

    public function front_end_index(Request $request){

    }
}
