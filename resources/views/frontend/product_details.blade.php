@extends('frontend.layout.app')
@section('content')
    
    
<div class="breadcrumbs">
    <div class="breadcrumbs-container container">
        <div>
            
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
     
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>{{$products->name}}</span>
        </div>
        <div>
        </div>
    </div>
</div> <!-- end breadcrumbs -->

    <x-alert/>

    <div class="container">
        
            </div>
    
    <div class="product-section container">
        <div>
            <div class="product-section-image">
                <img src="{{asset('/storage/products/'.$products->image)}}" alt="product" class="active" id="currentImage">
            </div>
      
        </div>
        <div class="product-section-information">
            <h1 class="product-section-title">{{$products->name}}</h1>
            <div class="product-section-subtitle">{!! $products->description !!}</div>
            <div><div class="badge badge-success">In Stock</div></div>
            <div class="product-section-price">${{$products->price}}</div>

            <p>
                Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!
            </p>

            <p>&nbsp;</p>
            <div class="product-section-quantity">
                
            </div>
            {{-- <form action="{{route('cart.add')}}" method="POST">@csrf
                <h5>Quantity</h5> 
             <input type="number" class="form-control" name="quantity" value="1" >
                <input type="hidden" name="product_id" value="{{$products->id}}">
                <input type="hidden" name="product_price" value="{{$products->price}}">

                <button type="submit" class="button button-plain mt-3" style="margin-left: 20px;">Add to Cart</button>
            </form> --}}
            <form action="" id="addToCart" data-id="{{$products->id}}"> @csrf 
                <h5> Quantity</h5>             
                <input type="number" class="form-control" name="quantity" >
                <input type="hidden" name="product_id" value="{{$products->id}}">
                {{-- <input type="hidden" name="product_price" value="{{$product->price}}"> --}}
                <button  type="submit" class="btn btn-sm btn-outline-success" style="margin-left: 20px;">Add to Cart</button>
            </form>
                    </div>
    </div> <!-- end product-section -->

    <div class="might-like-section">
    <div class="container">
        <h2>You might also like...</h2>
        <div class="might-like-grid">
                            <a href="laptop-13.html" class="might-like-product">
                    <img src="../storage/products/dummy/laptop-13.jpg" alt="product">
                    <div class="might-like-product-name">Laptop 13</div>
                    <div class="might-like-product-price">$1824.78</div>
                </a>
                            <a href="desktop-9.html" class="might-like-product">
                    <img src="../storage/products/dummy/desktop-9.jpg" alt="product">
                    <div class="might-like-product-name">Desktop 9</div>
                    <div class="might-like-product-price">$3072.09</div>
                </a>
                            <a href="laptop-24.html" class="might-like-product">
                    <img src="../storage/products/dummy/laptop-24.jpg" alt="product">
                    <div class="might-like-product-name">Laptop 24</div>
                    <div class="might-like-product-price">$2392.32</div>
                </a>
                            <a href="phone-2.html" class="might-like-product">
                    <img src="../storage/products/dummy/phone-2.jpg" alt="product">
                    <div class="might-like-product-name">Phone 2</div>
                    <div class="might-like-product-price">$1283.94</div>
                </a>
            
        </div>
    </div>
</div>


@endsection
