<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\ProductRequest;
use App\Oem;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::paginate(8);
        $categories = Categories::all();
        $oems = Oem::all();
        return view('product.listProducts', compact('products','categories','oems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::paginate(8);
        return view('product.listProducts', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->input());
        return response()->json($product);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $categories = Categories::all();
        $product = Product::find($product_id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, $id)
//    {
//        $edit = Product::find($id)->update($request->all());
//        return response()->json($edit);
//    }
    public function update(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $product->ten = $request->ten;
        $product->gia = $request->gia;
        $product->sl = $request->sl;
        $product->id_dm = $request->category;
        $product->id_oem = $request->oem;
        $product->save();
        return response()->json($product);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::destroy($id);
        return response()->json($product);
    }
}
