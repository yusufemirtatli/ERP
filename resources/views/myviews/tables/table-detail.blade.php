@php
  $container = 'container-xxl';
  $containerNav = 'container-xxl';
@endphp

@extends('layouts.contentNavbarLayout')

@section('title', 'Container - Layouts')

@section('content')
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">

    <!-- Layout container -->
    <div class="layout-container">

      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        @include('layouts.sections.menu.verticalMenu')
      </aside>
      <!--/ Menu -->
      @include('myviews.menu.components.add-prod-to-shopcart')
      <!-- Large Modal -->
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
                    <tr>
                      <td style="max-width: 150px">Çay</td>
                      <td class="justify-content-between" style="min-width: 140px; width: 168px;">
                        <button
                          style="margin-right: 1vh"
                          type="button"
                          class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                          onclick="updateValuesModal(this, 'decrement')"
                        >
                          <span class="tf-icons bx bx-minus"></span>
                        </button>
                        <div style="display: inline-block; text-align: center; width: auto;">
                          <span class="currentValueMax">1 /</span><span id="modal" class="value" style="display: inline-block; min-width: 20px; text-align: center;">0</span>
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
                      <td id="modal" class="tane">12<span> TL</span></td>
                      <td id="modal" class="total">0 <span> TL</span></td>
                    </tr>
                    <tr>
                      <td style="max-width: 150px">Hamburger</td>
                      <td class="justify-content-between" style="min-width: 140px; width: 168px;">
                        <button
                          style="margin-right: 1vh"
                          type="button"
                          class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                          onclick="updateValuesModal(this, 'decrement')"
                        >
                          <span class="tf-icons bx bx-minus"></span>
                        </button>
                        <div style="display: inline-block; text-align: center; width: auto;">
                          <span class="currentValueMax">1 /</span><span id="modal" class="value" style="display: inline-block; min-width: 20px; text-align: center;">0</span>
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
                      <td id="modal" class="tane">60<span> TL</span></td>
                      <td id="modal" class="total">0 <span> TL</span></td>
                    </tr>
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
              <button type="button" class="btn btn-success">Ödendi</button>
            </div>
          </div>
        </div>
      </div>
      <!--/ Content  -->
      <div class="container">
        <div class="row">
          <div class="card" style="margin-bottom: 15px">
            <div class="d-flex flex-row justify-content-between">
              <h5 class="card-header d-flex">Adisyon Toplam</h5>
              <div class="d-flex" style="place-items: center">
                <button type="button" class="d-flex h-50 btn btn-info" data-bs-toggle="modal" data-bs-target="#addprod">Ürün Ekle</button>
              </div>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Ürün</th>
                    <th style="text-align: left;padding-left: 5vh">Miktar</th>
                    <th>Tane Fiyatı</th>
                    <th>Toplam Fiyat</th>
                    <th>Sil</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <tr>
                  <td style="max-width: 150px">Çay</td>
                  <td class="justify-content-between" style="min-width: 140px ; width: 150px">
                    <button style="margin-right: 1vh" type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary" onclick="updateValues(this, 'decrement')">
                      <span class="tf-icons bx bx-minus"></span>
                    </button>
                    <span id="default" class="value" style="display: inline-block; width: 22px; text-align: center;">0</span>
                    <button style="margin-left: 1vh" type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary" onclick="updateValues(this, 'increment')">
                      <span class="tf-icons bx bx-plus"></span>
                    </button>
                  </td>
                  <td id="default" class="tane">12<span> TL</span></td>
                  <td id="default" class="total">0 <span> TL</span></td>
                  <td>
                    <button type="button" class="btn rounded-pill btn-sm btn-icon btn-outline-danger">
                      <span class="tf-icons bx bxs-trash"></span>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td style="max-width: 150px">Hamburger</td>
                  <td class="justify-content-between" style="min-width: 140px ; width: 150px">
                    <button style="margin-right: 1vh" type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary" onclick="updateValues(this, 'decrement')">
                      <span class="tf-icons bx bx-minus"></span>
                    </button>
                    <span id="default" class="value" style="display: inline-block; width: 22px; text-align: center;">0</span>
                    <button style="margin-left: 1vh" type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary" onclick="updateValues(this, 'increment')">
                      <span class="tf-icons bx bx-plus"></span>
                    </button>
                  </td>
                  <td id="default" class="tane">60<span> TL</span></td>
                  <td id="default" class="total">0 <span> TL</span></td>
                  <td>
                    <button type="button" class="btn rounded-pill btn-sm btn-icon btn-outline-danger">
                      <span class="tf-icons bx bxs-trash"></span>
                    </button>
                  </td>
                </tr>
                </tbody>
              </table>
              <div class="d-flex justify-content-end align-items-center m-6 mb-2" style="margin-top: 1vh">
                <div class="order-calculations">
                  <div class="d-flex justify-content-start">
                    <h6 class="w-px-100 mb-0">Toplam:</h6>
                    <h6 class="mb-0" id="grandTotal">0 TL</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="justify-content-end d-flex gap-1">
              <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#largeModal">
                Hesabı Ayır
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Böl</button>
                <ul class="dropdown-menu" style="">
                  <li><a class="dropdown-item" href="javascript:void(0);">2'ye Böl</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">3' e Böl</a></li>
                  <li><a class="dropdown-item" href="javascript:void(0);">4' e Böl</a></li>
                </ul>
              </div>
              <button class="btn btn-success">
                Toplam
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--/END Content  -->
    </div>
    <!--/ Layout container -->
  </div>
  <!--/ Layout wrapper -->
@endsection
<script>
  // INDEX SCRİPTİ
  function updateValues(button, action) {
    // Button'un bulunduğu satırı bul
    var row = button.closest('tr');

    var valueElement = row.querySelector('[id="default"].value');
    var taneElement = row.querySelector('[id="default"].tane');
    var totalElement = row.querySelector('[id="default"].total');


    // Mevcut value ve tane değerlerini al
    var currentValue = parseInt(valueElement.textContent);
    var taneValue = parseInt(taneElement.textContent.trim());

    // Değeri artır veya azalt
    if (action === 'increment') {
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
    updateGrandTotal();
  }


  function updateGrandTotal() {
    // Tüm total class'larına sahip elementleri bul
    var totals = document.querySelectorAll('[id="default"].total');

    // Genel toplamı hesaplamak için bir değişken tanımla
    var grandTotal = 0;

    // Her bir total değeri için döngüye gir ve genel toplama ekle
    totals.forEach(function(totalElement) {
      // Total değerini sayıya çevir ve genel toplamı artır
      var totalValue = parseInt(totalElement.textContent);
      grandTotal += totalValue;
    });

    // Genel toplamı ekrana yaz
    document.getElementById('grandTotal').innerHTML = grandTotal + ' TL';
  }

</script>
<script>
  // HESABI AYIR SCRİPTİ
  function updateValuesModal(button, action) {
    // Button'un bulunduğu satırı bul
    var row = button.closest('tr');

    // İlgili elementleri seç
    var valueElement = row.querySelector('[id="modal"].value');
    var taneElement = row.querySelector('[id="modal"].tane');
    var totalElement = row.querySelector('[id="modal"].total');
    var valueElementMax = document.querySelector('[id="default"].value');

    // Mevcut value ve tane değerlerini al
    var currentValue = parseInt(valueElement.textContent);
    var taneValue = parseInt(taneElement.textContent.trim());
    var maxValue = parseInt(valueElementMax.textContent);

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

    // 'currentValueMax' span içeriğini güncelle
    var currentValueMaxElement = row.querySelector('.currentValueMax');
    if (currentValueMaxElement) {
      currentValueMaxElement.textContent = currentValue + ' /';
    }

    // Genel toplamı güncelle
    updateGrandTotalModal();
  }

  function updateGrandTotalModal() {
    // Tüm total class'larına sahip elementleri bul
    var totals = document.querySelectorAll('[id="modal"].total');

    // Genel toplamı hesaplamak için bir değişken tanımla
    var grandTotal = 0;

    // Her bir total değeri için döngüye gir ve genel toplama ekle
    totals.forEach(function(totalElement) {
      // Total değerini sayıya çevir ve genel toplamı artır
      var totalValue = parseInt(totalElement.textContent);
      grandTotal += totalValue;
    });

    // Genel toplamı ekrana yaz
    document.getElementById('grandTotalModal').innerHTML = grandTotal + ' TL';
  }
</script>

