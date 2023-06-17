<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
 /*        $cart = DB::table('carts')->get()->first();
        if (empty($cart)) {
            DB::table('carts')->insert(['created_at' => now(), 'updated_at' => now()]);
            $cart = DB::table('carts')->get()->first();
        }
        $cartItems = DB::table('cart_items')->where('cart_id', $cart->id)->get();
        $cart = collect($cart);
        $cart['items'] = collect($cartItems); */
        $user = auth()->user();
        $cart = Cart::with(['cartItems'])->where('user_id', $user->id)
                                         ->where('checkouted', false)
                                         ->firstOrCreate(['user_id' => $user->id]);

        return response(($cart));
    }

    public function checkout()
    {
        $user = auth()->user();
        $cart = $user->carts()->where('checkouted', false)->with('cartItems')->first();
        if($cart){
            $result = $cart->checkout();
            return response($result);
        }
        else{
            return response('沒有購物車', 400);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
