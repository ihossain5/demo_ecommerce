@extends('frontend.layout.app')
@section('content')  
<div class="breadcrumbs">
    <div class="breadcrumbs-container container">
        <div>
            <a href="index.html">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Shop</span>
        </div>
        <div>
        </div>
    </div>
</div> <!-- end breadcrumbs -->

<x-alert/>

    <div class="products-section container">
        
        <div class="sidebar">
            <h3>By Category</h3>
            <ul>  
                @foreach ($categories as $category)  
                <li class=""><a href="">{{$category->name}}</a></li>                 
                @endforeach
            </ul>
        </div> <!-- end sidebar -->
        <div>
            <div class="products-header">
                <h1 class="stylish-heading">All product</h1>               
            </div>

            <div class="products text-center">
                @foreach ($products as $product)
                    <div class="product border border-secondary p-5">
                        <a href="{{route('product.detail',[$product->id])}}"><img src="{{asset('frontend/storage/products/dummy/laptop-1.jpg')}}" alt="product"></a>
                        <a href="{{route('product.detail',[$product->id])}}"><div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">{{$product->price}}</div>
                        {{-- <button type="submit" class="btn btn-sm btn-outline-success " data-id="{{$product->id}}" style="margin-left: 20px;">Add to Cart</button> --}}

                      
                            {{-- <form action="{{route('cart.add')}}" method="POST">@csrf
                                <input type="number" class="form-control mb-3 " name="quantity" value="1" >
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="product_price" value="{{$product->price}}">
                                <button type="submit" class="btn btn-sm btn-info" style="margin-left: 20px;">Add to Cart</button>
                            </form>  --}}
                            
                            <form action="" id="addToCart">               
                                <input type="number" class="form-control" name="quantity" value="1" >
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="product_price" value="{{$product->price}}">
                                <button type="submit" class="btn btn-sm btn-outline-success addcart" style="margin-left: 20px;">Add to Cart</button>
                            </form>
                      
                    </div>                   
                    @endforeach
                                   
                       
            </div> <!-- end products -->

            <div class="spacer"></div>
        </div>
    </div>

    @endsection