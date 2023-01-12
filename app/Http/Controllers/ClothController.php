<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ClothController extends Controller
{

    public function index()
    {
        $clothes = Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
        ->select('shops.*', 'shops.id as shops_id', 'cloths.*', )
        ->get();
        return view('back.clothes.index', ['clothes'=> $clothes]);
    }

    public function create()
    {
        $shops = Shop::all();
        return view('back.clothes.create', ['shops'=> $shops]);
    }

    public function store(Request $request)
    {
       $cloth = new Cloth;
       $cloth->cloth_name = $request->cloth_name;
       $cloth->shop_id = $request->shop;
       $cloth->price = $request->price;
       $cloth->amount_left = $request->amount_left;
       $cloth->discount = $request->discount;
       $cloth->save();

        return redirect()-> route('clothes')->with('message', $request->cloth_name . 'is added.');
    }

    public function edit(Cloth $cloth)
    {
        $shops = Shop::all();
        return view('back.clothes.edit', ['shops'=> $shops, 'cloth'=> $cloth]);
    }

    public function update(Request $request, Cloth $cloth)
    {
        $cloth->cloth_name = $request->cloth_name;
        $cloth->shop_id = $request->shop;
        $cloth->price = $request->price;
        $cloth->amount_left = $request->amount_left;
        $cloth->discount = $request->discount;
        $cloth->save();
 
         return redirect()-> route('clothes')->with('message', $request->cloth_name . 'is edited.');
    }

    public function destroy(Cloth $cloth)
    {
        $cloth->delete();
        return redirect()-> route('clothes')->with('message', $cloth->cloth_name . 'is deleted.');
    }
}
