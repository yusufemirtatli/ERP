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
    $table_id = $request->input('table');
    $shopcart_id = shopcart::where('table_id', $table_id)
      ->where('isPaid', false)
      ->pluck('id');
    $arrays = $request->input('array');
    $shopcarts = product_shopcart::whereIn('shopcart_id', $shopcart_id)->get(); // 'where' yerine 'whereIn' kullanarak düzeltildi

    foreach ($arrays as $array) {
      $found = false;  // Bir eşleşme bulunup bulunmadığını kontrol etmek için bir değişken ekliyoruz

      foreach ($shopcarts as $shopcart) {
        if ($shopcart->product_id == $array[0] && !$shopcart->isPaid) {  // '=' yerine '==' kullanarak karşılaştırma yapıyoruz
          $shopcart->quantity = $shopcart->quantity + $array[1];
          $shopcart->save();
          $found = true;  // Eşleşme bulunduğu için değişkeni güncelliyoruz
          break;  // İç döngüyü sonlandırıyoruz
        }
      }

      if (!$found) {  // Eşleşme bulunmadıysa yeni ürün ekleniyor
        $data = new product_shopcart();
        $data->product_id = $array[0];
        $data->shopcart_id = $shopcart_id[0];
        $data->quantity = $array[1];
        $data->save();
      }
    }
  }

  public function updateQuantity(Request $request)
  {
    $productShopcartId = $request->input('product_shopcart_id');
    $newQuantity = $request->input('quantity');
    $productShopcart = product_shopcart::find($productShopcartId);

    if ($productShopcart) {
      $productShopcart->quantity = $newQuantity;
      $productShopcart->save();

      return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Product not found']);
  }

  /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
