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
    //* Table id yi alıyor oradan shopcartsları listeliyor o masaya atanan bütün shopcartlar içinden
    // ödenmemiş olan bir taneyi buluyor(ki bu en son shopcart yani adisyon) */

    $table_id = $request->input('table');
    $shopcart_id = shopcart::where('table_id', $table_id)
      ->where('isPaid', false)
      ->pluck('id');
    $arrays = $request->input('array');
    $shopcarts = product_shopcart::whereIn('shopcart_id', $shopcart_id)->get();
    //********************************************************************************************

    //* Burada İSE AJAX İSTEĞİ İLE YOLLADIĞIM ARRAYİN İÇİNDEKİ PRODUCT ID LER İLE DATABASEDEKİ PRODUCTLARI KARŞILAŞTIRIP
    //  AYNI OLAN VAR İSE YENİ QUANTİTY DEĞERİNİ DATABASE E YAZDIRIYOR

    foreach ($arrays as $array) {
      $found = false;  // Bir eşleşme bulunup bulunmadığını kontrol etmek için bir değişken ekliyoruz

      foreach ($shopcarts as $shopcart) {
        if ($shopcart->product_id == $array[0] && !$shopcart->isPaid) {
          $shopcart->quantity = $shopcart->quantity + $array[1];
          $shopcart->save();
          $found = true;  // Eşleşme bulunduğu için değişkeni güncelliyoruz
          break;  // İç döngüyü sonlandırıyoruz
        }
      }
    //  AYNI OLAN YOK İSE YENİ ÜRÜN EKLİYOR
      if (!$found) {  // Eşleşme bulunmadıysa yeni ürün ekleniyor
        $data = new product_shopcart();
        $data->product_id = $array[0];
        $data->shopcart_id = $shopcart_id[0];
        $data->quantity = $array[1];
        $data->save();
      }
    }
  }
      //***********************************************************

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

  public function getQuantity() {
    $tableId = session('TableId'); // 'TableId' anahtarını kullanarak oturumdan alın
    if (!$tableId) {
      // Eğer oturumda 'TableId' yoksa hata döndür
      return response()->json(['error' => 'Table ID not found in session.'], 404);
    }

    // Doğru shopcart_id'yi bulalım
    $shopcart_id = shopcart::where('table_id', $tableId)
      ->where('isPaid', false)
      ->pluck('id');

    if ($shopcart_id->isEmpty()) {
      // Eğer hiçbir shopcart_id bulunamazsa
      return response()->json(['error' => 'No unpaid shopcart found for this table.'], 404);
    }

    // Ürünlerin miktarını al
    $data = product_shopcart::whereIn('shopcart_id', $shopcart_id)
      ->where('isPaid',false)
      ->get(['id', 'quantity']);

    return response()->json($data);
  }

  public function paid(Request $request)
  {
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');
    $shopcartId = $request->input('shopcartId');

    // İlgili product_shopcart kaydını bul
    $shopcartItem = product_shopcart::where('product_id', $productId)
      ->where('shopcart_id', $shopcartId)
      ->where('isPaid', false)
      ->first();

    if ($shopcartItem) {
      // Mevcut quantity'yi azalt
      $shopcartItem->quantity -= $quantity;

      // Eğer quantity sıfır veya daha az ise, kaydı sil
      if ($shopcartItem->quantity <= 0) {
        $shopcartItem->delete();
      } else {
        // Aksi takdirde kaydı güncelle
        $shopcartItem->save();
      }

      // 'isPaid' true olan kaydı bul veya yeni bir tane oluştur
      $paidItem = product_shopcart::where('product_id', $productId)
        ->where('shopcart_id', $shopcartId)
        ->where('isPaid', true)
        ->first();

      if ($paidItem) {
        // 'isPaid' true olan kaydın quantity'sini artır
        $paidItem->quantity += $quantity;
        $paidItem->save();
      } else {
        // Yeni 'isPaid' true olan kayıt oluştur
        $newPaidItem = new product_shopcart();
        $newPaidItem->product_id = $productId;
        $newPaidItem->shopcart_id = $shopcartId;
        $newPaidItem->isPaid = true;
        $newPaidItem->quantity = $quantity;
        $newPaidItem->save();
      }

      return response()->json(['success' => true, 'data' => $productId]);
    } else {
      return response()->json(['success' => false, 'message' => 'Product not found or already paid.']);
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
