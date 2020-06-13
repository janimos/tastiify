@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="mx-auto my-5">
        <div class="title products-title">
            Products
        </div>
        <div class="keyword">
          <input class="search-field" type="text" id="search" placeholder="Search for products">
          <input type="submit" value="Search">
        </div>
      </div>
      <div class="d-box">
        <div class="col-md-3">
          <div class="list-group">
            <h3>Country</h3>
            <div style="overflow-y: auto; overflow-x: hidden;">
					    <div class="list-group-item checkbox">
                            @foreach($countries as $c)
                                <div class="label-item">
                                <label><input type="checkbox" class="common_selector country" value="{{$c->Name}}"> {{$c->Name}}</label>
                                </div>
                            @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row filter_data">
              @foreach($products as $p)
            <div class="col-sm-4 col-lg-4 col-md-3 product-bg">
              <div class="product-box">
      					<img src="" alt="Product" class="img-responsive">
      					<p align="center"><strong><a href="{{ url('/country/product/'.$p->id) }}">{{$p->Name}}</a></strong></p>
      					<h4 style="text-align:center;" class="text-danger">{{$p->price}}</h4>
      					<p>Country : {{$p->country->Name}}<br></p>
      				</div>
            </div>
              @endforeach
          </div>
        </div>
      </div>

        <footer class="container py-5">
          <div class="links">
              <a href="https://laravel.com/docs">Docs</a>
              <a href="https://laracasts.com">Laracasts</a>
              <a href="https://laravel-news.com">News</a>
              <a href="https://blog.laravel.com">Blog</a>
              <a href="https://nova.laravel.com">Nova</a>
              <a href="https://forge.laravel.com">Forge</a>
              <a href="https://vapor.laravel.com">Vapor</a>
              <a href="https://github.com/laravel/laravel">GitHub</a>
          </div>
        </footer>
    </div>
</div>
@endsection


<!-- <div class="catalog-page">
  <div class="list-filter">

  </div>
  <div class="product-list">
    <div class="product-row">
      <div class="product-grid">

      </div>
    </div>
  </div>
</div> -->
