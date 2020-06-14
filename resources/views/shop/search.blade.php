@extends('layouts.app')
<script type="text/javascript">

</script>
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="mx-auto my-5">
        <div class="title products-title">
            Products
        </div>
      </div>
      <div class="d-box">
        <div class="col-md-12">
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
