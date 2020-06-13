@extends('layouts.app')

@section('content')
  <div class="content">
    <div class="mx-auto my-5">
      <div class="title m-b-md">
          <h2>ADMINISTRATOR<br>PANEL</h2>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card" style="border-radius: 21px;">
                <div class="card-body">
                    <ul class="list-group">
                       <li class="admin-group-item green-warning"><a href="http://tastiify.com/products/create">Create product</a></li>
                       <li class="admin-group-item green-warning"><a href="http://tastiify.com/country/create">Create country</a></li>
                       <li class="admin-group-item green-warning"><a href="http://tastiify.com/products/edit">Edit product</a></li>
                       <li class="admin-group-item red-warning"><a href="http://tastiify.com/products/delete">Delete product</a></li>
                       <li class="admin-group-item red-warning"><a href="http://tastiify.com/country/delete">Delete country</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>  
@endsection
