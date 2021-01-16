@extends('frontend.layout.app')
@section('content')

<div class="breadcrumbs">
  <div class="breadcrumbs-container container">
      <div>
          
      <i class="fa fa-chevron-right breadcrumb-separator"></i>
   
      <i class="fa fa-chevron-right breadcrumb-separator"></i>
      <span>Order Table</span>
      </div>
      <div>
      </div>
  </div>
</div> <!-- end breadcrumbs -->
<div class="container mt-5 bg-light mb-5">
    <div class="row">
        <div class="col-lg 12 mb-5 shadow p-3 bg-white ">
          @auth    
          @if (count($orders)>0 )         
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">sl No</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Total price</th>
                  </tr>
                </thead>
                <tbody>
                                       
                    @foreach ($orders as $key=>$order)

                  <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td><img src="{{'storage/products/'.$order->product->image}}" alt="not found" height="80"></td>
                    <td>{{$order->product->name ?? ''}}</td>
                    <td>{{$order->quantity ?? ''}}</td>
                    <td>{{$order->price ?? ''}}</td>
                    <td>{{$order->payment_method ?? ''}}</td>
                    <td>{{$order->total_price ?? ''}}</td>            
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              {{-- <--- if login but hasn't placed any order ---> --}}
                  @else    
                    <td>You haven't palced any order yet</td>
                  @endif
                  {{-- <--- if  not login  ---> --}}
              @else 
              <h2 class="text-center">Login to place an order</h2>
              @endauth
        </div>
    </div>
</div>

@endsection