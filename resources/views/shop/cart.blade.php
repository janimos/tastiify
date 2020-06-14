@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="mx-auto my-5">
        <div class="title products-title">
            Cart
        </div>
      </div>
      <div class="mx-auto my-5">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="list-group-item-new">
                        <form class="form-horizontal" method="POST" action="{{"/order"}}">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="col-sm-4 col-lg-4 col-md-3 product-bg">
                                @foreach($products as $p)
                                <div class="product-box">
                                  <h4 class="nomargin">{{$p->Name}}</h4>
                                  {{$p->price}} EUR
                                  <input type="number" min="1" class="form-control make" name="quantity[]" id="quantity" value="1">
                                  <input type="hidden" name="product_id[]" value="{{$p->id}}" />
                                  </div>
                                @endforeach
                                </div>
                          <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                              <input type="submit" class="btn btn-warning" value="Make Order">
                            </div>
                          </div>
                        </form>
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
