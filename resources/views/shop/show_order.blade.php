@extends('layouts.app')
@section('content')



<div class="container">
  <div class="mx-auto my-5">
    <div class="title" style="text-align: center;">
        Order {{ $order->id }} Information
    </div>
  </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="border-radius: 21px;">
                <div class="card-body">
                    <h4>Selected products :</h4>
                    <div class="card-text">
                      @foreach($mas as $p => $q)
                        <h5 id="" class="extra ">
                          {{ $p }} ({{ $q }} quantity)
                        </h5>
                      @endforeach
                    </div>
                    <br>

                    <h5>Name : {{$username}}</h5>

                    <h5>Total price : {{ $order->price }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
