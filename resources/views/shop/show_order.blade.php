@extends('layouts.app')
@section('content')



<div class="container">
  <div class="mx-auto my-5">
    <div class="title" style="text-align: center;">
        Order Information
    </div>
  </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Selected products :</h4>
                    <div class="card-text">
                      <h5 id="" class="extra ">
                        (EUR)
                      </h5>
                    </div>
                    <br>
                    <h5>Name : </h5>
                    <h5>Surname : </h5>
                    <h5>Phone (+371): </h5>
                    <h5>Shipping address : </h5>
                    <h5>Total price : </h5>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
