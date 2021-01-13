@extends('frontend.layout.app')
@section('content')

            <div class="featured-section">
                <x-alert/>
                <div class="container">
                    <h1 class="text-center">Laravel Ecommerce</h1>

                    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.</p>

                    <div class="text-center button-container">
                        <a href="#" class="button">Featured</a>
                        <a href="#" class="button">On Sale</a>
                    </div>

                    

                    <div class="products text-center">
                                                    <div class="product">
                                <a href="{{route('products.index')}}"><img src="{{asset('/frontend/storage/products/dummy/appliance-5.jpg')}}" alt="product"></a>
                                <a href="{{route('products.index')}}"><div class="product-name">Appliance 5</div></a>
                                <div class="product-price">$897.87</div>
                            </div>
                                                    <div class="product">
                                <a href="{{route('products.index')}}"><img src="{{asset('/frontend/storage/products/dummy/laptop-12.jpg')}}" alt="product"></a>
                                <a href="{{route('products.index')}}"><div class="product-name">Laptop 12</div></a>
                                <div class="product-price">$2352.83</div>
                            </div>
                                                    <div class="product">
                                <a href="{{route('products.index')}}"><img src="{{asset('/frontend/storage/products/dummy/phone-4.jpg')}}" alt="product"></a>
                                <a href="{{route('products.index')}}"><div class="product-name">Phone 4</div></a>
                                <div class="product-price">$906.04</div>
                            </div>
                                                    <div class="product">
                                <a href="shop/phone-2.html"><img src="{{asset('/frontend/storage/products/dummy/phone-2.jpg')}}" alt="product"></a>
                                <a href="shop/phone-2.html"><div class="product-name">Phone 2</div></a>
                                <div class="product-price">$1283.94</div>
                            </div>
                                                    <div class="product">
                                <a href="shop/desktop-1.html"><img src="{{asset('/frontend/storage/products/dummy/desktop-1.jpg')}}" alt="product"></a>
                                <a href="shop/desktop-1.html"><div class="product-name">Desktop 1</div></a>
                                <div class="product-price">$3563.80</div>
                            </div>
                                                    <div class="product">
                                <a href="shop/phone-8.html"><img src="{{asset('/frontend/storage/products/dummy/phone-8.jpg')}}" alt="product"></a>
                                <a href="shop/phone-8.html"><div class="product-name">Phone 8</div></a>
                                <div class="product-price">$1270.77</div>
                            </div>
                                                    <div class="product">
                                <a href="shop/camera-3.html"><img src="{{asset('/frontend/storage/products/dummy/camera-3.jpg')}}" alt="product"></a>
                                <a href="shop/camera-3.html"><div class="product-name">Camera 3</div></a>
                                <div class="product-price">$1903.01</div>
                            </div>
                                                    <div class="product">
                                <a href="shop/laptop-22.html"><img src="{{asset('/frontend/storage/products/dummy/laptop-22.jpg')}}" alt="product"></a>
                                <a href="shop/laptop-22.html"><div class="product-name">Laptop 22</div></a>
                                <div class="product-price">$2294.58</div>
                            </div>
                        
                    </div> <!-- end products -->

                    <div class="text-center button-container">
                        <a href="shop.html" class="button">View more products</a>
                    </div>

                </div> <!-- end container -->

            </div> <!-- end featured-section -->

            <blog-posts></blog-posts>
 @endsection