<?php

namespace App\Http\Controllers\shopcart;

use App\Http\Controllers\Controller;
use App\Models\product_shopcart;
use App\Models\shopcart;
use Illuminate\Http\Request;

class ShopcartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
  public function update(Request $request)
  {
    $arrays = $request->input('array');
    foreach ($arrays as $array){
        $data = new product_shopcart();
        $data->product_id = $array[0];
        $data->quantity = $array[1];
        $data->save();
    }
  }

  /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
