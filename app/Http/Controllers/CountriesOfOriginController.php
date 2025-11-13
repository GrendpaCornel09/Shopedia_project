<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountriesOfOrigin;
use Illuminate\Support\Facades\Validator;

class CountriesOfOriginController extends Controller
{
    public function index(){
        $countries=CountriesOfOrigin::paginate(10);
        if($countries->isEmpty()){
            return response()->json([
                'message'=>'contries of origin table is empty.'
            ],200);
        }

        return response()->json([
            'countries_of_origin'=>$countries->items(),
            'pagination'=>[
                'current_page'=>$countries->currentPage(),
                'last_page'=>$countries->lastPage(),
                'per_page'=>$countries->perPage(),
                'total'=>$countries->total(),
                'next_page_url'=>$countries->nextPageUrl(),
                'previous_page_url'=>$countries->previousPageUrl(),
            ],
        ],200);
    }

    public function show(string $id){
        $country=CountriesOfOrigin::find($id);
        if($country){
            return response()->json([
                'country'=>$country,
            ],200);
        }else{
            return response()->json([
                'message'=>'country not found.',
            ],404);
        }
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'country_of_origin'=>'required|string',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $countries=CountriesOfOrigin::create($request->all());
        return response()->json([
            'message'=>'country of origin created successfully.',
            'countries'=>$countries,
        ],201);
    }

    public function update(string $id,Request $request){
        $validator=Validator::make($request->all(),[
            'country_of_origin'=>'required|string',
        ]);

        if($validator->fails()){
            $errors=$validator->errors()->all();
            $errorMessage=implode(', ',$errors);
            return response()->json([$errorMessage],422);
        }

        $country=CountriesOfOrigin::find($id);
        if(!$country){
            return response()->json([
                'message'=>'country not found.',
            ],404);
        }

        $country->update($request->all());
        return response()->json([
            'message'=>'country of origin updated successfully.',
        ],200);
    }

    public function destroy(string $id){
        $country=CountriesOfOrigin::find($id);
        if(!$country){
            return response()->json([
                'message'=>'country not found.',
            ],404);
        }

        $country->delete();
        return response()->json([
            'message'=>'country of origin deleted successfully.',
        ],200);
    }
}
