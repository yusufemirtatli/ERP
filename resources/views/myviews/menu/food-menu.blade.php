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
            <form action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ürün Ekle</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="title" name="title" aria-describedby="floatingInputHelp">
                      <label for="floatingInput">Ürün Adı</label>
                    </div>
                    <div style="margin-top: 1vh" class="mb-3">
                      <label for="formFile" class="form-label">Ürün Görseli</label>
                      <input class="form-control" type="file" id="formFile">
                    </div>
                    <div>
                      <label for="desc" class="form-label">Ürün Açıklaması</label>
                      <input id="desc" name="desc" class="form-control" type="text">
                    </div>
                    <div class="mb-3" style="margin-top: 2vh">
                      <label for="category_id" class="form-label">Ürün Kategorisi</label>
                      <select id="category_id" name="category_id" class="form-select">
                        <option>Ürün Kategorisi Seç</option>
                        @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div style="margin-top: 1vh" class="row g-2">
                      <div class="col mb-0">
                        <label for="price" class="form-label">Fiyat 1</label>
                        <input id="price" name="price" class="form-control" type="text" placeholder="Görünür Fiyat">
                      </div>
                      <div class="col mb-0">
                        <label for="exampleFormControlTextarea1" class="form-label">Fiyat 1,5</label>
                        <input id="exampleFormControlTextarea1" class="form-control" type="text">
                      </div>
                      <div class="col mb-0">
                        <label for="exampleFormControlTextarea1" class="form-label">Fiyat 2</label>
                        <input id="exampleFormControlTextarea1" class="form-control" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Ürünü Ekle</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ürün Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="card mb-4">
                <div class="card-body">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" aria-describedby="floatingInputHelp">
                    <label for="floatingInput">Ürün Adı</label>
                    <div id="floatingInputHelp" class="form-text"></div>
                  </div>
                  <div style="margin-top: 1vh" class="mb-3">
                    <label for="formFile" class="form-label">Ürün Görseli</label>
                    <input class="form-control" type="file" id="formFile">
                  </div>
                  <div>
                    <label for="exampleFormControlTextarea1" class="form-label">Ürün Açıklaması</label>
                    <input id="exampleFormControlTextarea1" class="form-control" type="text" rows="3">
                  </div>
                  <div class="mb-3">
                    <label for="category" class="form-label">Ürün Kategorisi</label>
                    <select id="category" class="form-select">
                      <option>Ürün Kategorisi Seç</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div style="margin-top: 1vh" class="row g-2">
                    <div class="col mb-0">
                      <label for="exampleFormControlTextarea1" class="form-label">Fiyat 1</label>
                      <input id="exampleFormControlTextarea1" class="form-control" type="text" placeholder="Görünür Fiyat" rows="1">
                    </div>
                    <div class="col mb-0">
                      <label for="exampleFormControlTextarea1" class="form-label">Fiyat 1,5</label>
                      <input id="exampleFormControlTextarea1" class="form-control" type="text" rows="1">
                    </div>
                    <div class="col mb-0">
                      <label for="exampleFormControlTextarea1" class="form-label">Fiyat 2</label>
                      <input id="exampleFormControlTextarea1" class="form-control" type="text" rows="1">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Çıkış</button>
                <button type="button" class="btn btn-primary">Ürünü Güncelle</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-5">
          @foreach($products as $product)
            <div class="col-md-6">
              <div class="card mb-3 position-relative">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="card-img card-img-left" src="http://127.0.0.1:8000/assets/img/elements/12.jpg" alt="Card image">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$product->title}}</h5>
                      <p class="card-text">
                        {{$product->desc}}
                      </p>
                      <div class=" flex-row d-flex w-100">
                        @php
                        $p_cat = \App\Models\category::find($product->category_id);
                        @endphp
                        <p class="card-text w-75"><small class="text-muted">{{$p_cat->title}}</small></p>
                        <div class="justify-content-end w-25 flex-row d-flex" style="place-items: center">
                          <div class="d-flex align-items-center">
                            <h4 class="text-center mb-0" style="color: black">{{$product->price}}</h4>
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
          @endforeach
        </div>
      </div>
      <!--/END Content  -->
    </div>
    <!--/ Layout container -->
  </div>
  <!--/ Layout wrapper -->
@endsection
