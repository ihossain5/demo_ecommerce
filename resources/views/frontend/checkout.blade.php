@extends('frontend.layout.app')
@section('content')
<div class="container">
   
@if (count($carts)>0)
    
<x-alert/>
    <h1 class="checkout-heading stylish-heading">Checkout</h1>
    <div class="checkout-section">
        <div>
            <form action="{{route('order.new')}}" method="POST" >@csrf
                
                <h2>Billing Details</h2>

                <div class="form-group">
                  
                    <label for="email">Email Address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                      @error('email')
                      <div id="card-errors" role="alert">
                          {{$message}}
                      </div>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                      <div id="card-errors" role="alert">
                          {{$message}}
                      </div>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                    @error('address')
                      <div id="card-errors" role="alert">
                          {{$message}}
                      </div>
                      @enderror
                </div>

                <div class="half-form">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city">
                        @error('city')
                      <div id="card-errors" role="alert">
                          {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="province">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="province" name="phone" >
                    @error('phone')
                      <div id="card-errors" role="alert">
                          {{$message}}
                      </div>
                      @enderror
                    </div>
                </div> <!-- end half-form -->


                <div class="spacer"></div>

                <h2>Select Payment method</h2>

                <div class="form-group">
                    <select name="payment_method" id="">
                        <option value="">Select</option>
                        <option value="bkash" class="form-control">bKash</option>
                        <option value="nagad" class="form-control">Nagad</option>
                        <option value="cash" class="form-control">Cash on Delevery</option>
                    </select>
                </div>

               

                    <!-- Used to display form errors -->
                    
                
                <div class="spacer"></div>

                <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>


            </form>

               
                        </div>



        <div class="checkout-table-container">
            <h2>Your Order</h2>
            @foreach ($carts as $cart)

            <div class="checkout-table">
                                    <div class="checkout-table-row">
                    <div class="checkout-table-row-left">
                        <img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="item" class="checkout-table-img">
                        <div class="checkout-item-details">
                            <div class="checkout-table-item">{{$cart->product->name}}</div>
                            <div class="checkout-table-description">{!! $cart->product->description !!}</div>
                            <div class="checkout-table-price">${{$cart->total_price}}</div>
                        </div>
                    </div> <!-- end checkout-table -->

                    <div class="checkout-table-row-right">
                        <div class="checkout-table-quantity">{{$cart->quantity}}</div>
                    </div>
                </div> <!-- end checkout-table-row -->
                
            </div> <!-- end checkout-table -->

        
            @endforeach
            <div class="checkout-totals">
                <div class="checkout-totals-left">
                    Subtotal <br>
                  
                    @if (session()->has('coupon'))
                    Discount ({{ session()->get('coupon')['name'] }})
                        <form action="{{route('destroy.coupon')}}" method="POST" style="display: inline">
                            @csrf @method('DELETE')
                            <button type="submit" style="font-size: 14px">Remove</button>
                        </form>
                      <br>
                      <hr>
                      New Subtotal <br>
                    @endif 
                    <hr>
                    <span class="checkout-totals-total">Total</span>

                </div>

                <div class="checkout-totals-right">
                    {{$totalAmount}} <br>
                    @if (session()->has('coupon'))
               -{{ $discount }}  <br> <hr>
                    {{$newSubTotal}} <br>
                    @endif  

                    <hr>
                    <span class="checkout-totals-total">{{$newTotal}}</span>

                </div>
            </div> 
            @if (!session()->has('coupon'))
                 
            <a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="{{route('store.coupon')}}" method="POST">@csrf 
                    <input type="text" name="coupon_code" id="coupon_code">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> <!-- end have-code-container -->
            @endif
            
        </div>

    </div> <!-- end checkout-section -->
    @else 
     <div style="padding-bottom: 80px;" >
        <h1 class="checkout-heading stylish-heading">First add items into cart</h1>
     </div>
    @endif
</div>
@endsection