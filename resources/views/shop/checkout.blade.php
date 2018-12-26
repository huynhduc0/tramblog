<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{url('img/core-img/favicon.ico')}}">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{url('shop/css/core-style.css')}}">
    <link rel="stylesheet" href="{{url('shop/style.css')}}">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
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
                    <li ><a href="{{url('shop/home')}}">Home</a></li>
                    <li><a href="{{url('shop/viewshop')}}">Shop</a></li>
                    <li><a href="{{url('shop/random')}}">Random Product</a></li>
                    <li><a href="{{url('shop/cart')}}">Cart</a></li>
                    <li class="active"><a href="{{url('shop/checkout')}}">Checkout</a></li>
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
       
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                          @if(count($cart)==0)
                                <div class="alert alert-warning" role="alert">
                                    <strong>Chưa có gì để đặt</strong>Mua hàng thôi nào cưng 
                                </div>
                                @else
                        <div class="checkout_details_area mt-50 clearfix">
                           

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <form action="{{url('shop/makeorder')}}" method="post">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="name" class="form-control" id="Tên" value="" placeholder=" Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select id="tinhthanhpho" class="w-100" name="tinhthanhpho" >     
                                        </select>
                                    </div>
                                     <div class="col-12 mb-3">
                                    <select class="w-100" id="quanhuyen" name="quanhuyen">
                                    </select>
                                </div>
                                     <div class="col-12 mb-3">
                                    <select class="w-100" id="xaphuong" name="xaphuong">
                                    </select>
                                     <input type="text" name="chitiet" class="form-control" id="" value="" placeholder="Địa chỉ chi tiết" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="phone" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea  name="note" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

                                   <!--  <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                        </div>
                                    </div> -->
                                </div>
                           
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                             <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                       
                                        <th>Quantity</th>
                                         <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $value)
                                    <tr id="sp{{$value['id']}}">
                                        
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{$value->attributes['img']}}" alt="Product"></a>

                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$value->name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>{{$value->quantity}}</span>
                                        </td>
                                        <td>  <span>{{$value['price']*$value['quantity']}}</span></td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>{{$total}}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>{{$total}}</span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                               
                            </div>

                            <div class="cart-btn mt-100">
                                <button type="submit" class="btn amado-btn w-100">Checkout</button>
                            </div>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
         
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
@endif
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
  

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{url('shop/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{url('shop/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{url('shop/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{url('shop/js/plugins.js')}}"></script>
    <!-- Active js -->
    <!-- <script src="{{url('js/active.js')}}"></script> -->

</body>

</html>
<script>
   city=document.getElementById('tinhthanhpho');
   console.log(city);
   // city.append($('<option>',{value: '31',text: 'huhuhu'}));
  window.onload = function (){
    
   console.log(city);
     console.log($("#selectCity"));
     $.ajax({
         url: "{{url('shop/getTinhThanhPho')}}",
         type: 'GET',
         success:function (data) {
             
             tp=jQuery.parseJSON(data);
             tp.map(function(elem) {
                var o = new Option(elem.name, elem.matp);
                $(o).html(elem.name);
                $("#tinhthanhpho").append($(o));
             });
             // city=document.getElementById('tinhthanhpho');
             // console.log(city)
         }
     });
     $("select#tinhthanhpho").change(function(){
        $("#quanhuyen").html('');
        $("#xaphuong").html('');
        var tp=$("#tinhthanhpho");
        // console.log(tp.find(':selected').val());
        $.ajax({
         url: "{{url('shop/getQuanHuyen')}}/"+tp.find(':selected').val(),
         type: 'GET',
         success:function (data) {
             tp=jQuery.parseJSON(data);
             tp.map(function(elem) {
                var o = new Option(elem.name, elem.maqh);
                $(o).html(elem.name);
                $("#quanhuyen").append($(o));
             });
             // city=document.getElementById('tinhthanhpho');
             // console.log(city)
         }
     });

});
      $("select#quanhuyen").change(function(){
        $("#xaphuong").html('');
        var qh=$("#quanhuyen");
        console.log(qh.find(':selected').val());
        $.ajax({
         url: "{{url('shop/getXaPhuong')}}/"+qh.find(':selected').val(),
         type: 'GET',
         success:function (data) {
             xp=jQuery.parseJSON(data);
             xp.map(function(elem) {
                var o = new Option(elem.name, elem.matp);
                $(o).html(elem.name);
                $("#xaphuong").append($(o));
             });
             // city=document.getElementById('tinhthanhpho');
             // console.log(city)
         }
     });

});

};
</script>