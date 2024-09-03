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
      <!--/ Content  -->
      <div class="container">
        <div class="row">

          <h1 class="text-center mb-4">Stok Yönetimi</h1>

          <div style="padding-bottom: 15px" class="card">
            <div class="d-flex flex-row justify-content-between">
              <h3 class="card-header d-flex">Gıda</h3>
              <div class="d-flex" style="place-items: center">
                <button type="button" class="d-flex h-50 btn btn-info" data-bs-toggle="modal" data-bs-target="#basicModal">Ekle</button>
              </div>
            </div>
            <div style="padding: 10px" class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="gidaTablo">
                  <thead>
                  <tr>
                    <th>Ürün Adı</th>
                    <th>Son Kullanma Tarihi</th>
                    <th>Adet</th>
                    <th>Maliyet</th>
                    <th style="padding: 10px; height: 21px; width: 20px">İşlem</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- Ürünler burada listelenecek -->
                  <tr>
                    <th>330 Ml Cocacola</th>
                    <th>25.12.2026</th>
                    <th>31</th>
                    <th>12.98</th>
                    <th>editbutonu</th>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="container-xxl">

              <!-- Modal -->
              <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameBasic" class="form-label">Ürün Adı</label>
                          <input type="text" id="nameBasic" class="form-control" >
                        </div>
                      </div>
                      <div class="row">
                        <div class="col md-6">
                          <label for="emailBasic" class="form-label">Miktar</label>
                          <input type="email" id="emailBasic" class="form-control">
                        </div>
                        <div class="col md-6">
                          <label for="defaultSelect" class="form-label">Birimi</label>
                          <select id="defaultSelect" class="form-select">
                            <option>Birim</option>
                            <option value="1">Kg</option>
                            <option value="2">Gr</option>
                            <option value="3">Adet</option>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Ekle</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </div>
      </div>
      <!--/END Content  -->
    </div>
    <!--/ Layout container -->
  </div>
  <!--/ Layout wrapper -->
@endsection
