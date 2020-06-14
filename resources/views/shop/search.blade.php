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
                @isset($countries)
                @foreach($countries as $c)
                  <div class="label-item">
                    <label><input type="checkbox" class="common_selector country" value="{{$c->Name}}"> {{$c->Name}}</label>
                  </div>
                @endforeach
                @endisset
                @empty($countries)
                    <div class="label-item">
                        <lable>No countries yet.</lable>
                    </div>
                @endempty
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row filter_data">
              @isset($products)
            @foreach($products as $p)
              <div class="col-sm-4 col-lg-4 col-md-3 product-bg">
                <div class="product-box">
                  <a href="{{ url('/country/product/'.$p->id) }}">
          					<p align="center"><strong>{{$p->Name}}</strong></p>
                  </a>
        					<h4 style="text-align:center;" class="text-danger">{{$p->price}} (EUR)</h4>
        					<p>Country : {{$p->country->Name}}<br></p>
        				</div>
              </div>
            @endforeach
              @endisset
              @empty($products)
                     <p>No products yet.</p>
              @endempty
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
