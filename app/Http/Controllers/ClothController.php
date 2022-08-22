<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ClothController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothes = Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
        ->select('shops.*', 'shops.id as shops_id', 'cloths.*', )
        ->get();
        return view('back.clothes.index', ['clothes'=> $clothes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view('back.clothes.create', ['shops'=> $shops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClothRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dump($request->amount_left);
       $cloth = new Cloth;
       $cloth->cloth_name = $request->cloth_name;
       $cloth->shop_id = $request->shop;
       $cloth->price = $request->price;
       $cloth->amount_left = $request->amount_left;
       $cloth->discount = $request->discount;
       $cloth->save();

        return redirect()-> route('clothes')->with('message', $request->cloth_name . 'is added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function show(Cloth $cloth)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function edit(Cloth $cloth)
    {
        dump($cloth);
        $shops = Shop::all();
        return view('back.clothes.edit', ['shops'=> $shops, 'cloth'=> $cloth]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClothRequest  $request
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cloth $cloth)
    {
        $cloth = new Cloth;
        $cloth->cloth_name = $request->cloth_name;
        $cloth->shop_id = $request->shop;
        $cloth->price = $request->price;
        $cloth->amount_left = $request->amount_left;
        $cloth->discount = $request->discount;
        $cloth->save();
 
         return redirect()-> route('clothes')->with('message', $request->cloth_name . 'is edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cloth  $cloth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cloth $cloth)
    {
        $cloth->delete();
        return redirect()-> route('clothes')->with('message', $cloth->cloth_name . 'is deleted.');
    }
}
