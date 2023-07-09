<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return $products;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
            'category' => 'required',
            'rating' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);

        $product = new Product;
        $product = Product::create($request->all());  
        $product->save();

        if ($request->expectsJson()) {
            $response = [
                'result_code' => 0,
                'message' => "Product Created",
                'data' => $product
            ];
        
            return response()->json($response);
        }
        
        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);       

        if(!$product)
        {
            $res=[];
            $res['result_code']=2;
            $res['message']="Product with ID {$id} not found.";
            $res['data']=$product;
    
            return $res;
        }

        return $product; 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);       
        $product->update($request->all());
        $product->save();

        if ($request->expectsJson()) {
            $response = [
                'result_code' => 0,
                'message' => "Product Updated",
                'data' => $product,
            ];
        
            return response()->json($response);
        }
        
       
            return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);              
        if(!$product)
        {
            $res=[];
            $res['result_code']=2;
            $res['message']="Product with ID {$id} not found.";
            $res['data']=$product;
    
            return $res;
        }
        $product->delete();

        return response()->json([
            'result_code' => 0,
            'message' => 'Product deleted',
            'data' => null
        ]);
    }
}
