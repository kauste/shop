<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::all();
        return view('back.shop.index', ['shops'=> $shops]);
    }

    public function create()
    {
        return view('back.shop.create');
    }

    public function store(Request $request)
    {
        $shop = new Shop;
        $shop->name = $request->shop_name;
        $shop->city = $request->city;
        $shop->adress = $request->adress;
        $shop->starts = $request->work_starts.':00';
        $shop->ends = $request->work_ends.':00';
        $shop->save();
        return redirect()-> route('shops')->with('message', 'New shop is added');

    }

    public function edit(Shop $shop)
    {
        return view('back.shop.edit', ['shop'=> $shop]);
    }

    public function update(Request $request, Shop $shop)
    {
        $shop->name = $request->shop_name;
        $shop->city = $request->city;
        $shop->adress = $request->adress;
        $shop->starts = $request->work_starts;
        $shop->ends = $request->work_ends;
        $shop->save();
        return redirect()-> route('shops')->with('message', 'New shop is added');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->back()->with('message', 'Shop is deleted.');
    }
}
