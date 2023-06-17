<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$data = $this->getData();
        //$data = DB::table('products')->get();
        DB::table('sbl_team_data')->where('id', 532)->decrement('win');
        return response(123);
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
        $data = $this->getData();
        $newData = $request->all();
        $data->push(collect($newData));
        dump($data);
        return response($data);
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
        $form = $request->all();
        $data = $this->getData();
        $selecteData = $data->where('id', $id)->first();
        $selecteData = $selecteData->merge(collect($form));

        return response($selecteData); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->getData();
        $data = $data->filter(function ($product) use ($id) {
            return $product['id'] != $id;
        });
        return response($data->values());
    }

    public function getData(){
        return collect([
            collect([
                'id' => 0,
                'title' => '測試商品一',
                'content' => '這是很棒的商品',
                'price' => 50
            ]),
            collect([
                'id' => 1,
                'title' => '測試商品二',
                'content' => '這是有點棒的商品',
                'price' => 30
            ]),
            collect([
                'id' => 1,
                'title' => '測試商品二',
                'content' => '這是有點棒的商品',
                'price' => 30
            ]),           
        ]);
    }
}