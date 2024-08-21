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
          <div class="row mb-5">
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="http://127.0.0.1:8000/assets/img/elements/12.jpg" alt="Card image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This content
                        is a
                        little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="http://127.0.0.1:8000/assets/img/elements/12.jpg" alt="Card image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">
                        This is a wider card with supporting text below as a natural lead-in to additional content. This content
                        is a
                        little bit longer.
                      </p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                </div>
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
