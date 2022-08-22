<?php

namespace App\Http\Controllers;

use App\Models\Front;
use App\Models\Shop;
use App\Models\Cloth;
use App\Models\Rate;
use Auth;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shopList()
    {
        $shops = Shop::all();
        return view('front.shops', ['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clothesList(Request $request)
    {
        $request->filter ?? 0;
        if($request->s){
            $search_words = explode(' ', trim($request->s));
            if(count($search_words) > 1 ){
                $search_words = array_slice($search_words, 0, );
            }

            $clothes = Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
            ->select('shops.*', 'shops.id as shops_id', 'cloths.*')
            ->where(function($case) use ($search_words){
                foreach($search_words as $word){
                    $case->where('cloths.cloth_name', 'like', '%'. $word.'%');
                }
            })->get();
        }
        else {
            if($request->filter == 0){
                $clothes = match($request->sort){
                    'name-asc'=>Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
                    ->select('shops.*', 'shops.id as shops_id', 'cloths.*', )
                    ->orderBy('name', 'asc')
                    ->get(), 
                    'name-desc'=>Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
                    ->select('shops.*', 'shops.id as shops_id', 'cloths.*', )
                    ->orderBy('name', 'desc')
                    ->get(),
                    default => Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
                    ->select('shops.*', 'shops.id as shops_id', 'cloths.*', )
                    ->get(),
                };
            } 
            else {
                $clothes = match($request->sort){
                    'name-asc'=>Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
                    ->select('shops.*', 'shops.id as shops_id', 'cloths.*')
                    ->where('shops.id', '=', $request->filter)
                    ->orderBy('name', 'asc')
                    ->get(), 
                    'name-desc'=>Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
                    ->select('shops.*', 'shops.id as shops_id', 'cloths.*')
                    ->where('shops.id', '=', $request->filter)
                    ->orderBy('name', 'desc')
                    ->get(),
                    default => Cloth::join('shops', 'cloths.shop_id', '=', 'shops.id')
                    ->select('shops.*', 'shops.id as shops_id', 'cloths.*')
                    ->where('shops.id', '=', $request->filter)
                    ->get(),
                };
            }
     }
        $shops = Shop::all();
        return view('front.clothes', [
            'clothes'=> $clothes, 
            'shops'=> $shops, 
            'sort'=> $request->sort ?? 'default',
            'filter' => $request->filter]);
        }
        public function rate(Request $request, Cloth $cloth){
            $cloth->rate = $request->rating;
            $cloth->amount_of_rates += 1;
            $cloth->save();
            return redirect()->back()->with('message', 'Than you for rating');
        }
}
