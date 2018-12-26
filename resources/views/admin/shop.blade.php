@extends('admin.back')
@section('content')
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            </ul>
                        </li>
                        <li>
                            <a href="url('admin_type')">
                                <i class="fas fa-chart-bar"></i>User và Thể loại</a>
                        </li>
                         <li>
                            <a href="url('admin_shop')">
                                <i class="fas fa-chart-bar"></i>Shop</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{url('logo.png')}}" alt="AMIN" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <li class="has-sub" >
                            <a class="js-arrow" href="{{url('ad')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a href="{{url('admin_type')}}">
                                <i class="fas fa-chart-bar"></i>User và Thể loại</a>
                        </li>
                          <li class="active">
                            <a href="{{url('admin_shop_add')}}">
                                <i class="fas fa-chart-bar"></i>Thêm sản phẩm</a>
                        </li>
                         <li class="has-sub">
                            <a href="{{url('admin_shop')}}">
                                <i class="fas fa-chart-bar"></i>Bill</a>
                        </li>
                         <li class="has-sub">
                            <a href="{{url('admin_product')}}">
                                <i class="fas fa-chart-bar"></i>Hàng và loại hàng</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
     <!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

    <div class="contact1">
        <div class="container-contact1">
                <div class=" center contact1-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

            <form class="well form-horizontal" method="POST" action="{{route('postaddproduct')}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <fieldset>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Name Product</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                                    <input name="name" placeholder="Name Product" class="form-control" required="true" type="text">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Price</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                                    <input name="price" placeholder="Price" class="form-control" type="number">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Số lượng</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                                    <input name="quantity" placeholder="Count" class="form-control" type="number">
                                                   </div>
                                                </div>
                                             </div>
                                            <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                            <select name="type_id" class="input1 form-control form-control-lg">
                                              @foreach ($brand as $value)
                                              <option value="{{$value['id']}}">{{$value['brandname']}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Description</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="inp


                                                   -group"><span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                                    <textarea id="editor1" class="ckeditor" name="description"></textarea>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="wrap-input1 validate-input" data-validate = "Image is required">
                    <input class="input1" id="image" type="text" name="image" placeholder="Image">
                    <button type="button" id="choose_img" class="btn btn-warning"> Chọn từ server</button>
                    <span class="shadow-input1"></span>
                </div>
                                             <div class="form-group text-right">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                             </div>
                                          </fieldset>
                                       </form>
                                    </table>
        </div>
    </div>




<!--===============================================================================================-->
    <script src="{{url('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());


  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script> CKEDITOR.replace( 'editor1', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
var button1 = document.getElementById( 'choose_img' );
button1.onclick = function() {
    selectFileWithCKFinder('image');
};
function selectFileWithCKFinder( elementId ) {
    CKFinder.popup( {
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function( finder ) {

            finder.on( 'files:choose', function( evt ) {

                var file = evt.data.files.first();
                //console.log(file.getUrl());
                var output = document.getElementById( elementId );
                output.value += file.getUrl()+",";

            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                //console.log(evt.data.resizedUrl);
                var output = document.getElementById( elementId );
                output.value = evt.data.resizedUrl;
            } );
        }
    } );
}
</script>