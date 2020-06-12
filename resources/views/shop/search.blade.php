@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
      <div class="d-box">
        <div class="col-md-3">
          <div class="list-group">
            <h3>Country</h3>
            <div style="overflow-y: auto; overflow-x: hidden;">
					    <div class="list-group-item checkbox">
                <div class="label-item">
                  <label><input type="checkbox" class="common_selector country" value="Japan"> Japan</label>
                </div>
                <div class="label-item">
                  <label><input type="checkbox" class="common_selector country" value="Latvia"> Latvia</label>
                </div>
                <div class="label-item">
                  <label><input type="checkbox" class="common_selector country" value="Russia"> Russia</label>
                </div>
                <div class="label-item">
                  <label><input type="checkbox" class="common_selector country" value="Spain"> Spain</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">

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
