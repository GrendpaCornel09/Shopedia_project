<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Categories::paginate(10);
        if($categories->isEmpty()){
            return response()->json([
                'message'=>'categories table is empty.'
            ],200);
        }

        return response()->json([
            'categories'=>$categories->items(),
            'pagination'=>[
                'current_page'=>$categories->currentPage(),
                'last_page'=>$categories->lastPage(),
                'per_page'=>$categories->perPage(),
                'total'=>$categories->total(),
                'next_page_url'=>$categories->nextPageUrl(),
                'previous_page_url'=>$categories->previousPageUrl(),
            ],
        ],200);
    }

    public function show(string $id){
        $category=Categories::find($id);
        if($category){
            return response()->json([
                'category'=>$category,
            ],200);
        }else{
            return response()->json([
                'message'=>'category not found.',
            ],404);
        }
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'category_name'=>'required|string|max:50',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $categories=Categories::create($request->all());
        return response()->json([
            'message'=>'category created successfully.',
            'categories'=>$categories,
        ],201);
    }

    public function update(string $id,Request $request){
        $validator=Validator::make($request->all(),[
            'category_name'=>'required|string|max:50',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $category=Categories::find($id);
        if(!$category){
            return response()->json([
                'message'=>'category not found.',
            ],404);
        }

        $category->update($request->all());
        return response()->json([
            'message'=>'category updated successfully.',
        ],200);
    }

    public function destroy(string $id){
        $category=Categories::find($id);
        if(!$category){
            return response()->json([
                'message'=>'category not found.',
            ],404);
        }

        $category->delete();
        return response()->json([
            'message'=>'category deleted successfully.',
        ],200);
    }
}
