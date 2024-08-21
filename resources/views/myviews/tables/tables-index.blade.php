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
        <div class="row" style="margin-bottom: 2vh">
          <div class="d-flex justify-content-end flex-row gap-2">
            <div class="d-flex btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">Ekle</div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal başlığı</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Buraya modal içeriğini ekleyebilirsin -->
                  Bu, modal içeriğidir.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Kaydet</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Silme Onayı</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Bu masayı silmek istediğinizden emin misiniz?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger">Sil</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="row g-3">
          <div class="col-sm-6 col-md-4 col-xl-2 position-relative">
            <div class="card border-0 text-white btn btn-success w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 1</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
            </div>
          </div>

          <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 text-white btn btn-danger w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 2</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 text-white btn btn-danger w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 3</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 text-white btn btn-success w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 4</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 text-white btn btn-danger w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 5</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 text-white btn btn-success w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 6</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="card border-0 text-white btn btn-success w-100 h-100">
              <div class="card-body">
                <h5 class="justify-content-center d-flex" style="color: #F5F5F9">Masa 7</h5>
                <i class='bx bx-dish d-flex justify-content-center' style="font-size: 54px;color: #F5F5F9"></i>
              </div>
              <!-- Silme ikonu -->
              <i class="bx bx-trash position-absolute top-0 end-0 m-2" style="cursor: pointer; color: #F5F5F9;" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
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
