@extends('frontend.layout.app')
@section('content')

<div class="container mt-5 bg-light">
    <div class="row">
        <div class="col-lg 12 mb-5 shadow p-3 bg-white ">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">sl No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total price</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key=>$order)
                        
                    
                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td>{{$order->product->name}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->total_price}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection