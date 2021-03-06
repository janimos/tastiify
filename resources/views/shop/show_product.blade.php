@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="mx-auto my-5">
        <div class="title products-title">
            @foreach($product as $p)
              {{ $p->Name }}
              <p class="lead font-weight-normal">
                Product from {{ $p->country->Name }}
              </p>
            @endforeach
        </div>
      </div>
      <div class="mx-auto my-5">
        <div class="col-sm-8 product-page-8">
          <div class="card product-body">
            <div class="card-body">
              <div class="product-img">
                @isset($desc->image)
                  <img alt="{{ $p->Name }}"
                  src="data:image/jpeg;charset=utf8;base64,{{ base64_encode($desc->image) }}"/>
                @endisset
                @empty($desc->image)
                  <img alt="{{ $p->Name }}"
                  src=""/>
                @endempty
              </div>
              <div class="product-desc">
                @isset($desc->description)
                  <p>{{ $desc->description }}</p>
                @endisset
                @empty($desc->description)
                  <p>No description yet!</p>
                @endempty
              </div>
            </div>
          </div>
          <div class="mx-auto my-5">
              <div class="row justify-content-center">
                            <form class="form-horizontal" method="POST" action="{{"/add_to_cart"}}">
                                @csrf
                                {{ method_field('PATCH') }}
                                  <label for="make" class="control-label text-md-right">
                                    Price: @foreach ($product as $p) {{ $p->price }} @endforeach EUR
                                  </label>
                              <div class="form-group row">
                                <div class="col-md-6" style="margin-left: 15px;">
                                    <input type="hidden" name="product_id" value="{{$id}}" />
                                  <input type="submit" class="btn btn-warning">
                                </div>
                              </div>
                            </form>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
              </div>
          </div>
        </div>
        <div class="comments">
          <div class="col-sm-4 product-page-4">
            <div class="mx-auto my-5">
              <div class="title products-title">
                  <h2>Comments</h2>
              </div>
            </div>
              <div class="comments-list">
                  @isset($comments)
                @foreach($comments as $c)
                  <div class="media">
                    <div class="media-body">
                      <h4 class="media-heading user_name">{{$c->user->name}}</h4>
                      <p>{{$c->content}}</p>
                    </div>
                  </div>
                @endforeach
                  @endisset
                  @empty($comments)
                    <div class="media">
                    <div class="media-body">
                      <h4 class="media-heading">No comments yet.</h4>
                    </div>
                  </div>
                @endempty
            </div>
          </div>
          <div class="product-page-6" id="add-comment">
            <form action="{{"/comment"}}" method="post" class="form-horizontal" id="commentForm" role="form">
              @csrf
              {{ method_field('PATCH') }}
              <div class="form-group" style="text-align: left;">
                <label class="col-sm-3 control-label add-comment" ><h4>Leave your comment:</h4></label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="product_id" value="{{$id}}" />
                  <input type="submit" class="btn btn-success btn-circle text-uppercase right-btn" value="Comment">
                </div>
              </div>
            </form>
              @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
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
