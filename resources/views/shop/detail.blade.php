@extends('shop.master')
@section('content')
    <!-- ##### Main Content Wrapper Start ##### -->
            <style>
            .golden {
                color: #ee0;
                background-color: #444;
            }

            .big-red {
                color: #f11;
                font-size: 50px;
            }
        </style>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
         <link rel="stylesheet" href="{{url('shop/SimpleStarRating.css')}}">
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                 <ul>
                    <li><a href="{{url('shop/home')}}">Home</a></li>
                    <li><a href="{{url('shop/viewshop')}}">Shop</a></li>
                    <li class="active" ><a href="{{url('shop/random')}}">{{$sanpham[0]['name']}} - 
                    @if(isset($random)) random
                    @else details
                    @endif
                    </a></li>
                    <li><a href="{{url('shop/cart')}}">Cart</a></li>
                    <li><a href="{{url('shop/checkout')}}">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="{{url('shop/home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('shop/brand').'/'.$sanpham[0]['brandID']}}">{{$sanpham[0]['brandname']}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$sanpham[0]['name']}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{$sanpham[0]['img'][0]}});">
                                    </li>
                                    @foreach ($sanpham[0]['img'] as $key=>$value)
                                    @if($key>0)
                                    <li data-target="#product_details_slider" data-slide-to="{{$key}}" style="background-image: url({{$value}});">
                                    </li>
                                    @endif
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{$sanpham[0]['img'][0]}}">
                                            <img  style="height: 400px; overflow: hidden;" class="d-block w-100" src="{{$sanpham[0]['img'][0]}}" alt="First slide">
                                        </a>
                                    </div>
                                     @foreach ($sanpham[0]['img'] as $key=>$value)
                                     @if ($key>0)
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{$value}}">
                                            <img  style="height: 400px; overflow: hidden;" class="d-block w-100" src="{{$value}}" alt="Second slide">
                                        </a>
                                    </div>
                                    @endif
                                   @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">{{number_format($sanpham[0]['price'])}} VND</p>
                                <a href="product-details.html">
                                    <h6>{{$sanpham[0]['name']}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                         @for($i=1;$i<=$sanpham[0]['rate'];$i++ )
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <div class="review">
                                            <a href="#">Write A Review</a>
                                           <main>
                                                        <td><span class="rating"></span></td>
                                                        <br><p id="sao">{{$sanpham[0]['rate']}}</p>
                                           <!--  <p>
                                                Click a rating, then check your console!
                                            </p> -->
                                        </main>
                                        <script src="{{url('shop/SimpleStarRating.js')}}"></script>
                                        <script>
                                            var ratings = document.getElementsByClassName('rating');

                                            for (var i = 0; i < ratings.length; i++) {
                                                var r = new SimpleStarRating(ratings[i]);

                                                ratings[i].addEventListener('rate', function(e) {
                                                    console.log('Rating: ' + e.detail);
                                                    $.ajax({
                                                        url: "{{url('shop/rate')}}",
                                                        type: 'POST',
                                                        data: { _token: "{{ csrf_token() }}",id:{{$sanpham[0]['id']}},start:e.detail},
                                                        success: function(data){
                                                            // alert("cảm ơn bạn đã đánh giá");
                                                            swal("Cảm ơn bạn đã đánh giá", "bạn chọn "+e.detail +" sao "+" Trung bình là "+data+" sao", "success");
                                                            $("#sao").html(data);
                                                        }
                                                    });
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                @if($sanpham[0]['count']>0)
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                                @else 
                                <p class="notavaibility"><i class="fa fa-circle"></i> Out Of Stock</p>
                                @endif
                            </div>

                            <div class="short_overview my-5">
                                <p>{!! $sanpham[0]['description']!!}</p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form action="{{url('shop/addCart')}}" class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    {{ csrf_field() }}
                                    <p>Qty</p>
                                    <input type="text" name="id" class="d-none" value="{{$sanpham[0]['id']}}">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" max="{{$sanpham[0]['count']}}" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                @if($sanpham[0]['count']>0)
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                                @else
                                   <button type="submit" disabled="true" name="addtocart" value="5" class="btn amado-btn">OUT OF STOCK</button>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.html"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.html">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="shop.html">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="product-details.html">Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="cart.html">Cart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
@endsection