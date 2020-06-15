@extends('layouts.app')

@section('content')

<script>
    function Remove(ID) {
        window.location.href="/cart/remove/"+ID;
    }
</script>

<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="mx-auto my-5">
        <div class="title products-title">
            Cart
        </div>
      </div>
      <div class="mx-auto my-5">
          <div class="row justify-content-center">
              <div class="col-md-4">
                  <div class="card">
                      <div class="list-group-item-new">
                        @isset($products)
                        <form class="form-horizontal" method="POST" action="{{"/order"}}">
                            @csrf
                            {{ method_field('PATCH') }}
                            @foreach($products as $p)
                            <div class="product-bg">
                                <div class="product-box" style="height: 200px;">
                                  <h4 class="nomargin">{{$p->Name}}</h4>
                                  {{$p->price}} EUR
                                  <br>Quantity
                                  <input type="number" min="1" class="form-control make" name="quantity[]" id="quantity" value="1">
                                  <input type="hidden" name="product_id[]" value="{{$p->id}}" />
                                  <input type="button" class="btn btn-danger" value="Delete product" onclick="Remove({{ $p->id }})"/>
                                  </div>
                            </div>
                            </div>
                            @endforeach
                            <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                <input type="submit" style="margin-right: 38%;" class="btn btn-warning" value="Make Order">
                              </div>
                            </div>
                        </form>
                        @endisset
                        @empty($products)
                          <div class="title products-title">
                              Empty cart
                          </div>
                        @endempty
                      </div>
                    </div>
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
