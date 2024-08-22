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
        <div class="d-flex justify-content-end flex-row gap-2" style="margin-bottom: 1.5vh">
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
                    <label for="nameBasic" class="form-label">Name</label>
                    <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col mb-0">
                    <label for="emailBasic" class="form-label">Email</label>
                    <input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                  </div>
                  <div class="col mb-0">
                    <label for="dobBasic" class="form-label">DOB</label>
                    <input type="date" id="dobBasic" class="form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="card mb-3 position-relative">
              <div class="row g-0">
                <div class="col-md-4">
                  <img class="card-img card-img-left" src="http://127.0.0.1:8000/assets/img/elements/12.jpg" alt="Card image">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Hamburger</h5>
                    <p class="card-text">
                      Muazzam mozeralla ile 180 gram etin birleşimi. Enfes!rleşimi. Enfes!rleşimi. Enfes!
                    </p>
                    <div class=" flex-row d-flex w-100">
                      <p class="card-text w-75"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <div class="justify-content-end w-25 flex-row d-flex" style="place-items: center">
                        <div class="d-flex align-items-center">
                          <h4 class="text-center mb-0" style="color: black">15</h4>
                          <img src="/assets/img/icons/payments/turkish-lira (1).png" alt="Lira icon">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Edit butonu, sağ üst köşede kalem ikonu ile -->
              <button class="btn btn-primary position-absolute btn-sm"
                      data-bs-toggle="modal" data-bs-target="#basicModal"
                      style="top: 5px; right: 5px;">
                <i class="bx bxs-edit" style="font-size: 1rem"></i>
              </button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3 position-relative">
              <div class="row g-0">
                <div class="col-md-4">
                  <img class="card-img card-img-left" src="http://127.0.0.1:8000/assets/img/elements/12.jpg" alt="Card image">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Hamburger</h5>
                    <p class="card-text">
                      Muazzam mozeralla ile 180 gram etin birleşimi. Enfes!rleşimi. Enfes!rleşimi. Enfes!
                    </p>
                    <div class=" flex-row d-flex w-100">
                      <p class="card-text w-75"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <div class="justify-content-end w-25 flex-row d-flex" style="place-items: center">
                        <div class="d-flex align-items-center">
                          <h4 class="text-center mb-0" style="color: black">15</h4>
                          <img src="/assets/img/icons/payments/turkish-lira (1).png" alt="Lira icon">
                        </div>                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Edit butonu, sağ üst köşede kalem ikonu ile -->
              <button class="btn btn-primary position-absolute btn-sm"
                      data-bs-toggle="modal" data-bs-target="#basicModal"
                      style="top: 5px; right: 5px;">
                <i class="bx bxs-edit" style="font-size: 1rem"></i>
              </button>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3 position-relative">
              <div class="row g-0">
                <div class="col-md-4">
                  <img class="card-img card-img-left" src="http://127.0.0.1:8000/assets/img/elements/12.jpg" alt="Card image">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Hamburger</h5>
                    <p class="card-text">
                      Muazzam mozeralla ile 180 gram etin birleşimi. Enfes!rleşimi. Enfes!rleşimi. Enfes!
                    </p>
                    <div class=" flex-row d-flex w-100">
                      <p class="card-text w-75"><small class="text-muted">Last updated 3 mins ago</small></p>
                      <div class="justify-content-end w-25 flex-row d-flex" style="place-items: center">
                        <div class="d-flex align-items-center">
                          <h4 class="text-center mb-0" style="color: black">15</h4>
                          <img src="/assets/img/icons/payments/turkish-lira (1).png" alt="Lira icon">
                        </div>                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Edit butonu, sağ üst köşede kalem ikonu ile -->
              <button class="btn btn-primary position-absolute btn-sm"
                      data-bs-toggle="modal" data-bs-target="#basicModal"
                      style="top: 5px; right: 5px;">
                <i class="bx bxs-edit" style="font-size: 1rem"></i>
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
