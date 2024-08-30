<!-- Large Modal HESANI AYIR -->
<div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card" style="margin-bottom: 15px">
          <div class="d-flex flex-row justify-content-between">
            <h5 class="card-header d-flex">Adisyon Toplam</h5>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>Ürün</th>
                <th style="text-align: left;padding-left: 5vh">Miktar</th>
                <th>Tane Fiyatı</th>
                <th>Toplam Fiyat</th>
              </tr>
              </thead>
              <tbody class="table-border-bottom-0">
              @foreach($products as $product)
                <tr>
                  <td style="max-width: 150px">{{$product->product->title}}</td>
                  <td class="justify-content-between" style="width: 180px">
                    <button
                      style="margin-right: 1vh"
                      type="button"
                      class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                      onclick="updateValuesModal(this, 'decrement')"
                    >
                      <span class="tf-icons bx bx-minus"></span>
                    </button>
                    <div style="display: inline-block; text-align: center; width: 55px;">
                      <span id="modal" class="currentValueMax"
                            data-product-quantity="{{$product->quantity}}"
                            data-product-id="{{$product->product_id}}">{{$product->quantity}} /</span>
                      <span id="modal" class="value" style="display: inline-block; min-width: 20px; text-align: center;">0</span>
                    </div>
                    <button
                      style="margin-left: 1vh"
                      type="button"
                      class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                      onclick="updateValuesModal(this, 'increment')"
                    >
                      <span class="tf-icons bx bx-plus"></span>
                    </button>
                  </td>
                  <td id="modal" class="tane">{{$product->product->price}}<span> TL</span></td>
                  <td id="modal" class="total">0 <span> TL</span></td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center m-6 mb-2" style="margin-top: 1vh">
              <div class="order-calculations">
                <div class="d-flex justify-content-start">
                  <h6 class="w-px-100 mb-0">Toplam:</h6>
                  <h6 class="mb-0" id="grandTotalModal">0 TL</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">İade</button>
        <button type="button" class="btn btn-success" onclick="paid(this)">Ödendi</button>
      </div>
    </div>
  </div>
</div>
<script>
  // HESABI AYIR SCRİPTİ
  function updateValuesModal(button, action) {
    // Button'un bulunduğu satırı bul
    var row = button.closest('tr');

    var maxValueElement = row.querySelector('[id="modal"].currentValueMax')

    // İlgili elementleri seç
    var valueElement = row.querySelector('[id="modal"].value');
    var taneElement = row.querySelector('[id="modal"].tane');
    var totalElement = row.querySelector('[id="modal"].total');

    // Mevcut value ve tane değerlerini al
    var currentValue = parseInt(valueElement.textContent);
    var taneValue = parseInt(taneElement.textContent.trim());
    var maxValue = parseInt(maxValueElement.textContent);

    // Değeri artır veya azalt
    if (action === 'increment' && currentValue < maxValue) {
      currentValue++;
    } else if (action === 'decrement' && currentValue > 0) {
      currentValue--;
    }

    // Güncellenen value değerini ekrana yaz
    valueElement.textContent = currentValue;

    // value ile tane değerini çarp ve sonucu TL ile birlikte ekrana yaz
    var total = currentValue * taneValue;
    totalElement.innerHTML = total + ' <span>TL</span>';

    // Genel toplamı güncelle
    updateGrandTotalModal();
  }
</script>
<script>
  // /************************* ÖDENDİ SCRİPTİ ************************************/
  // Bayrak değişkenini tanımla
  let paidFunctionCalled = false;

  function paid(button) {
    // Bayrağı true olarak ayarla
    paidFunctionCalled = true;

    // Tüm newValue'ları saklamak için bir array oluştur
    var rows = document.querySelectorAll('.modal-content tbody tr');
    var updatePromises = [];

    rows.forEach(function(row) {
      var productId = parseInt(row.querySelector('[data-product-id]').getAttribute('data-product-id'));
      var valueElement = row.querySelector('.value');

      if (!valueElement) {
        console.error("Gerekli element bulunamadı.");
        return;
      }

      var currentValue = parseInt(valueElement.textContent);

      var updatePromise = fetch('/update-paid', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
          product_id: productId,
          quantity: currentValue,
          shopcartId: {{ $shopcartId }},
        })
      })
        .then(response => {
          if (!response.ok) {
            console.error('Network response was not ok:', response.status, response.statusText);
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          if (data.success) {
            console.log('Database updated successfully for product ID:', productId);
          } else {
            console.error('Failed to update the database for product ID:', productId, 'Error:', data.message);
          }
        })
        .catch(error => {
          console.error('Error updating product ID:', productId, 'Error:', error);
        });

      updatePromises.push(updatePromise);
    });

    // Tüm fetch çağrılarının tamamlanmasını bekle
    Promise.all(updatePromises).then(() => {
      // Sayfayı yenilemeden önce işlemin tamamlandığından emin ol
      window.location.reload();
    });
  }

  // Sayfa yenilenmeden önce `updateDatabase()` fonksiyonunu çağır
  window.addEventListener('beforeunload', function(event) {
    if (!paidFunctionCalled) {
      // `paid` fonksiyonu çağrılmadıysa, `updateDatabase()` fonksiyonunu çağır
      updateDatabase();
    }
  });
</script>

