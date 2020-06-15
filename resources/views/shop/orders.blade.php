@extends('layouts.app')
@section('content')

<div class="container">
  <div class="mx-auto my-5">
    <div class="title" style="text-align: center;">
        Orders
    </div>
  </div>
    <div>
        <div class="col-sm-12">
            <div class="card" style="border-radius: 21px;">
                <div class="card-body">
                  @foreach ( $orders as $order )
                  <div class="card-text">
                    <h4 id="{{ $order->id }}" class="extra">
                        Order {{ $order->id }} : <a class="btn btn-warning float-right"
                        href="/orders/show/{{$order->id}}">Show order</a>
                    </h4><br>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
