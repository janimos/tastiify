@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <!--<h1 class="display-4 font-weight-normal">TASTIIFY</h1>-->
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-title shadow-sm">
          <div class="mx-auto my-5">
            <div class="title m-b-md">
                TASTIIFY
            </div>
            <p class="lead font-weight-normal">
              Taste of nations
            </p>
          </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
          <div class="bg-pink mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden border-rad shadow-sm">
              <div class="my-3 py-3">
                <h2 class="display-5">Japan</h2>
                <p class="lead">お菓子</p>
              </div>

          </div>

          <div class="bg-light-blue mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden border-rad shadow-sm">
              <div class="my-3 py-3">
                <h2 class="display-5">Latvia</h2>
                <p class="lead">Saldumi</p>
              </div>

          </div>
        </div>

        <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
          <div class="bg-light-blue mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden border-rad shadow-sm">
              <div class="my-3 py-3">
                <h2 class="display-5">Russia</h2>
                <p class="lead">Сладости</p>
              </div>
          </div>

          <div class="bg-pink mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden border-rad shadow-sm">
              <div class="my-3 py-3">
                <h2 class="display-5">Spain</h2>
                <p class="lead">Dulces</p>
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
