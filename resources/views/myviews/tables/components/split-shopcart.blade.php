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
                      <span id="modal" class="currentValueMax">5 /</span>
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
        <button type="button" class="btn btn-success">Ödendi</button>
      </div>
    </div>
  </div>
</div>

