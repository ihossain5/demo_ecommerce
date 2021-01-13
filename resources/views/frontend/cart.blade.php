@extends('frontend.layout.app')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-container container">
        <div>
            <a href="#">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shopping Cart</span>
        </div>
        <div>
        </div>
    </div>
</div>

<div class="cart-section container">
    <div>       
    <x-alert/>
    @auth
        

             @if (count($carts)>0)
                             
        <h2>Shopping Cart</h2>
            @foreach ($carts as $cart)
                
            
        <div class="cart-table">
                            <div class="cart-table-row">
                <div class="cart-table-row-left">
                    <a href="https://laravelecommerceexample.ca/shop/laptop-1"><img src="https://laravelecommerceexample.ca/storage/products/dummy/laptop-1.jpg" alt="item" class="cart-table-img"></a>
                    <div class="cart-item-details">
                        <div class="cart-table-item"><a href="https://laravelecommerceexample.ca/shop/laptop-1">{{$cart->product->name}}</a></div>
                        <div class="cart-table-description">{{$cart->product->name}}</div>
                    </div>
                </div>
                <div class="cart-table-row-right">
                    <div class="cart-table-actions">
                        <form action="{{route('cart.remove',[$cart->id])}}" method="POST">@csrf 
                            
                                <button type="submit" class="cart-options form-control">Remove</button>
                            
                        </form>
                        <form action="{{route('cart.update',[$cart->id])}}" method="POST">@csrf 
                            
                            <input type="number" class="form-control" name="quantity" value="{{$cart->quantity}}" >
                            <input type="hidden" name="product_id" value="{{$cart->product->id}}">
                            <button type="submit" class="cart-options" style="margin-left: 20px;">update Cart</button>
                        </form>                      
                    </div>
                
                    <div style="margin-left: 35px;">${{$cart->product->price }}</div>
                </div>
            </div> <!-- end cart-table-row -->
            
        </div> <!-- end cart-table -->
        

        
            {{-- <a href="#" class="have-code">Have a Code?</a>

            <div class="have-code-container">
                <form action="https://laravelecommerceexample.ca/coupon" method="POST">
                    <input type="hidden" name="_token" value="8wuPcJefgHJXweOFZD6YbEMtMPNO119zDKNXeUeP">
                    <input type="text" name="coupon_code" id="coupon_code">
                    <button type="submit" class="button button-plain">Apply</button>
                </form>
            </div> <!-- end have-code-container --> --}}
     
        <div class="cart-totals">
            <div class="cart-totals-left">
                Shipping is free because we’re awesome like that. Also because that’s additional stuff I don’t feel like figuring out :).
            </div>

            <div class="cart-totals-right">
                <div>
                    
                    <span class="cart-totals-total">Total</span>
                </div>
                <div class="cart-totals-subtotal">
                  
                    <span class="cart-totals-total">${{$cart->total_price  }}</span>
                </div>
            </div>                     
        </div> <!-- end cart-totals -->
        @endforeach
        @else 
        <p>No items in cart</p>
        @endif
        <div class="cart-totals">
            <div class="cart-totals-left">
                 Total
            </div>

            <div class="cart-totals-right">
                <div>
                    
                    <span class="cart-totals-total">Total</span>
                </div>
                <div class="cart-totals-subtotal">
                  
                    <span class="cart-totals-total">${{$total_price  }}</span>
                </div>
            </div>                     
        </div> <!-- end cart-totals -->

        <div class="cart-buttons" style="margin-top: 20px;">
            <a href="{{route('products.index')}}" class="button">Continue Shopping</a>
            <a href="{{route('checkout')}}" class="button-primary">Proceed to Checkout</a>
        </div>
        @else 
        <p>LogIn first to continue</p>
        @endauth
        
      

        
    </div>

</div>
@endsection