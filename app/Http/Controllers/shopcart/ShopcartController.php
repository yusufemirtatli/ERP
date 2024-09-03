<?php

namespace App\Http\Controllers\shopcart;

use App\Http\Controllers\Controller;
use App\Models\product;
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
    //* Table id'yi alıyor ve bu masaya atanan ödenmemiş shopcartları listeliyor
    $table_id = $request->input('table');
    $shopcart_id = shopcart::where('table_id', $table_id)
      ->where('isPaid', false)
      ->pluck('id')->first(); // İlk shopcart ID'sini alıyoruz

    $arrays = $request->input('array');
    // Bu shopcart'a ait tüm ürünleri alıyoruz
    $shopcarts = product_shopcart::where('shopcart_id', $shopcart_id)->get();

    foreach ($arrays as $array) {
      // İlk olarak ürünün mevcut olup olmadığını kontrol ediyoruz
      $sc = $shopcarts->where('product_id', $array[0])->where('isPaid',false)->first();
      if ($sc) {
        // Eğer mevcutsa, quantity değerini güncelliyoruz
        $sc->quantity += $array[1];
        $sc->save();
        echo "<script>console.log('$sc');</script>";
      } else{
        // Eğer mevcut değilse, yeni bir ürün oluşturuyoruz
        $data = new product_shopcart();
        $data->product_id = $array[0];
        $data->shopcart_id = $shopcart_id;
        $data->quantity = $array[1];
        $data->isPaid = false; // Varsayılan olarak isPaid false olarak ayarlanıyor
        $data->save();
      }
    }
    //***************************SHOPCART TOTAL ******************************
    $this_shopcart = shopcart::find($shopcart_id)->get();
    // yukardaki shopcart id o masada ödenmemiş hesabı olan shopcartı yani son olan shopcartı alıyor.
    $prodcuts_by_shopcarts = product_shopcart::where('shopcart_id',$shopcart_id)
      ->where('isPaid',false)
      ->get(); //shopcarttaki ödenmemiş ürünleri listeledim

    foreach ($prodcuts_by_shopcarts as $product){
      $product_price = product::find($product->product_id)->where('price')->get();
      $this_shopcart->total = $this_shopcart->total + $product_price * $product->quantity;
      $this_shopcart->save();
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
      ->get(['id','product_id', 'quantity','shopcart_id']);

    return response()->json($data);
  }

  public function paid(Request $request)
  {
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');
    $shopcartId = $request->input('shopcartId');

    $shopcartItem = product_shopcart::where('product_id', $productId)
      ->where('shopcart_id', $shopcartId)
      ->where('isPaid', false)
      ->first();

    if ($shopcartItem) {
      $shopcartItem->quantity -= $quantity;
      $shopcartItem->save();

      $paidItem = product_shopcart::where('product_id', $productId)
        ->where('shopcart_id', $shopcartId)
        ->where('isPaid', true)
        ->first();

      if ($paidItem) {
        $paidItem->quantity += $quantity;
        $paidItem->save();
      } else {
        $newPaidItem = new product_shopcart();
        $newPaidItem->product_id = $productId;
        $newPaidItem->shopcart_id = $shopcartId;
        $newPaidItem->isPaid = true;
        $newPaidItem->quantity = $quantity;
        $newPaidItem->save();
      }

      $sc_prod = product_shopcart::where('shopcart_id', $shopcartId)
        ->where('isPaid', false)
        ->where('quantity', '>', 0)
        ->exists();

      if (!$sc_prod) {
        $shopcart = shopcart::find($shopcartId);
        $shopcart->isPaid = true;
        $shopcart->save();

        // JSON olarak bir redirect URL döndür
        return response()->json(['success' => true, 'redirect' => '/masa']);
      }

      return response()->json(['success' => true, 'data' => $productId]);
    } else {
      return response()->json(['success' => false, 'message' => 'Product not found or already paid.']);
    }
  }

  public function updateDatabase(Request $request)
  {
    // JSON verisini al
    $products = $request->input('products');  // 'products' anahtarını kullanarak arrayi alıyoruz

    // Array olarak göndelirlen shopcart_productsları teker teker verilerini alma
    foreach ($products as $product) {
      $productShopcartId = $product['product_shopcart_id']; // Her bir ürün için product_shopcart_id alıyoruz
      $quantity = $product['quantity'];  // Her bir ürün için quantity alıyoruz

      // Burada gelen arrayin içinden shopcart_product'ın id sini alıp
      // database'de o id ile sorgulama yapıp quantity değerini güncelliyoruz
      $item = product_shopcart::find($productShopcartId);
      $item->quantity = $quantity;
      $item->save();

    }

    return response()->json(['success' => true, 'data' => $products]);
  }

  public function updateDatabasePaid(Request $request)
  {
    $products = $request->input('products');  // 'products' anahtarını kullanarak arrayi alıyoruz
    $table_id = $request->input('table_id');  // 'table_id' anahtarını kullanarak masanın ID'sini alıyoruz
    $shopcart_id = shopcart::where('table_id',$table_id)->where('left_total','=',0)->first(); // O masadaki shopcartın idsini aldık

    foreach ($products as $product){
      $productShopcartId = $product['product_shopcart_id']; // Her bir ürün için product_shopcart_id alıyoruz
      $quantity = $product['quantity'];  // Her bir ürün için quantity alıyoruz
      $product_id = $product['product_id'];  // Her bir ürün için quantity alıyoruz
      $item = product_shopcart::find($productShopcartId);
      if ($item) {
        $item->quantity = max($item->quantity - $quantity, 0);  // Negatif miktarlara izin vermeyin
        $item->save();

        $paidItem = product_shopcart::where('shopcart_id', $shopcart_id->id)
          ->where('product_id', $product_id)
          ->where('isPaid', true)
          ->first();

        if ($paidItem) {
          $paidItem->quantity += $quantity;
          $paidItem->save();
        } else {
          $data = new product_shopcart();
          $data->product_id = $product_id;
          $data->quantity = $quantity;
          $data->shopcart_id = $shopcart_id->id;
          $data->isPaid = true;  // isPaid alanını da ekleyin
          $data->save();
        }
      }

    }
    return response()->json(['success' => true, 'data' => $products]);
  }




  /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
