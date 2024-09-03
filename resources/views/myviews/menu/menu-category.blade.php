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

      <!-- Content -->
      <div class="container">
        <div class="row">
          <div style="padding-bottom: 15px" class="card">
            <div class="d-flex flex-row justify-content-between">
              <h5 class="card-header d-flex">Kategoriler</h5>
              <div class="d-flex" style="place-items: center">
                <button type="button" class="d-flex h-50 btn btn-info" data-bs-toggle="modal" data-bs-target="#largeModal">Ekle</button>
              </div>
            </div>
            <div class="card">
              <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Kategori Adı</th>
                    <th>Ürün Miktarı</th>
                    <th style="width: 40px">Düzenle</th>
                  </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                  <tr>
                    <td><span class="fw-medium">Soğuk İçecekler</span></td>
                    <td style="padding-left: 60px">7</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i style="margin-left: 25px" class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><span class="fw-medium">Sıcak İçecekler</span></td>
                    <td style="padding-left: 60px">7</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i style="margin-left: 25px" class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><span class="fw-medium">Meşrubatlar</span></td>
                    <td style="padding-left: 60px">7</td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i style="margin-left: 25px" class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
      <div class="{{ $container }}">


        <!-- Modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Kategori Ekleme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="nameLarge" class="form-label">Kategori Başlığı</label>
                    <input type="text" id="nameLarge" class="form-control" placeholder="Örn: Soğuk İçecekler">
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
      </div>
      </div>
      <!--/ Content -->
    </div>
    <!--/ Layout container -->
  </div>
  <!--/ Layout wrapper -->
@endsection
