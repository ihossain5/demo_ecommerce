<!doctype html>
<html lang="en">
    @php
    use App\Http\Controllers\CartController;
        $total = CartController::cartItem();
        $carts = CartController::viewCartItems();
    @endphp
    
<!-- Mirrored from laravelecommerceexample.ca/shop/tablet-1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 14:20:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="csrf-token" content="{{ csrf_token() }}" />
       
        <title>Laravel Ecommerce | </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/frontend/css/app.css')}}">
        <link rel="stylesheet" href={{asset('/frontend/css/responsive.css')}}">

        <link rel="stylesheet" href="{{asset('/frontend/css/algolia.css')}}">
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
        <style>


        </style>
    </head>


<body class="">
<header>
   <div class="top-nav container">
      <div class="top-nav-left">
          <div class="logo"><a href="/">Ecommerce</a></div>
             <ul>
                <li><a href="{{route('products.index')}}"> Shop</a></li>          
             </ul>
      </div>
      <div class="top-nav-right ">
           <ul> 
              @auth
              <li><a href="{{route('order.index')}}">Order</a></li>
              <li>
                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
              </li>  
                    @else
                          <li><a href="{{route('register')}}">Sign Up</a></li>
                        <li><a href="{{route('login')}}">Login</a></li>
              @endauth
           </ul>
        </div>         
    </div> <!-- end top-nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light float-sm-end">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">        
          <ul class="navbar-nav">                 
            <li class="nav-item dropdown">
              @auth
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cart Items (<span class="cart"> {{$total}}</span> )
              </a>
              <ul class="dropdown-menu cart_drop" aria-labelledby="navbarDropdownMenuLink">                          
                @foreach ($carts as $cart)                
                <li>
                  <img src="{{asset('/storage/products/'.$cart->product->image)}}" alt="" width="40">
                  <span class="item-name ">{{$cart->product->name}}</span> 
                  <span class="item-quantity">Quantity: {{$cart->quantity}}</span>
                </li>
                @endforeach 
              
                <a href="{{route('cart.show')}}" class="button mt-5">View Cart</a>  
              </ul>
              @else
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cart Items 
              </a>
              @endauth
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>

@yield('content')



<footer>
    <div class="footer-content container">
        
    </div> <!-- end footer-content -->
</footer>



     {{-- Add to cart with ajax --}}
<script>
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
});

  $(document).on('submit', '#addToCart', function(event){
  event.preventDefault();
  var id = $(this).data('id');



    $.ajax({
    url:"{{url('/cart/add/')}}/"+id,
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
  
    success:function(response)
    { 
 
      if (response.success) {
        $('#message').append(
        '<div class="alert alert-success alert-dismissible shadow mb-5 fade show" role="alert">'+
              response.success+
              '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' + '</button>'+
        '</div>'
      );

      $('.cart').html(response.cartItem);

    
      $('.cart_drop').append(
        "<li><img src='/storage/products/"+response.data.product_image+"' style='width: 40px;'>"
        +"<span class='item-name'>"+response.data.product_name+"</span>"
        +"<span class='item-name'>"+response.data.quantity+"</span>"+
        "</li>"
        
        );

      }

      if (response.error) {
        $('#message').append(
        '<div class="alert alert-danger alert-dismissible shadow mb-5 fade show" role="alert">'+
              response.error+
              '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">' + '</button>'+
        '</div>'
      );
      }

      
      console.log(response);
      

    }//success end
   
    
  });

 
});
    </script>
 {{-- <script>
        $.ajaxSetup({
           headers: {
             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
     });
        $(document).ready(function(){
            $('.addToCart').submit(function(e){
                e.preventDefault();

            let product_id = $(this).data('id');               
            let quantity = $("input[name=quantity]").val();
            
            let product_price = $("input[name=product_price]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
    
              $.ajax({
                url:"{{route('cart.add')}}/",
                type:"POST",
                dataType:"json",
                data:{
                    quantity:quantity,
                    product_id:product_id,
                    product_price:product_price,
                   _token: _token
            },
                success:function(response){
                   if(response) {
                    alert(response.success);
                    window.location.href = '/';               
                    }
                }
            });
        });
    });
    </script> --}}


</body>

<!-- Mirrored from laravelecommerceexample.ca/shop/tablet-1 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 14:20:04 GMT -->
</html>
