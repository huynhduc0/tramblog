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
                        <li class="active">
                            <a href="{{url('admin_type')}}">
                                <i class="fas fa-chart-bar"></i>User và Thể loại</a>
                        </li>
                          <li class="has-sub">
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
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-5">

                                    <div class="card-header">
                                        <strong>Dropdowns</strong> Groups
                                    </div>
                                    <div class="card-body card-block">
                                        <form class="form-horizontal" method="post" action="{{url('updatetype')}}">
                                            {{csrf_field()}}
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <div class="btn-group">
                                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary">Thể loại</button>
                                                                <div  tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">
                                                                    @foreach ($admintypes as $value)
                                                                    <button type="button" value="{{$value['type_name']}}" tabindex="0" class="dropdown-item"
                                                                    onclick="setName('{{$value['id']}}','{{$value['type_name']}}')">{{$value['type_name']}}</button>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="text" id="id" name="id" hidden="true" class="form-control">
                                                        <input type="text" id="newname" name="newname" placeholder="Tên" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                            </div>

                                        </form>
                                    </div>
                                 <div class="card-header">
                                        <strong>Inline</strong> Form
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="addtype" method="post" class="form-inline">
                                            <div class="form-group">
                                                {{csrf_field()}}
                                                <input type="text" name="name" id="exampleInputName2" placeholder="Tên thể loại" required="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                            </div>

                                        </form>
                                    </div>
                                 <div class="col-md-6">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data table</h3>
                               
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Tình trạng</th>
                                                <th>Số bài viết</th>
                                                 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admintypes as $value)
                                            <tr class="tr-shadow">
                                                <td>{{$value['type_name']}}</td>
                                                 <td>
                                                    @if($value['status']==1)
                                                    <span class="status--process">Đang hiện</span>
                                                    @else
                                                      <span class="status--deni">Đang ẩn</span>
                                                    @endif
                                                </td>
                                                <td>{{count($value['count'])}}</td>
                                                 <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{url('duyetloai/'.$value['id'])}}"><button class="item" data-toggle="tooltip" data-placement="top" title="Duyệt">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                         </a>
                                                         <a href="{{url('chanloai/'.$value['id'])}}">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Không cho hiển thị">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>           
                                                    </a>
                                                    </div>
                                                </td>
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                            </div>
                            <div class="col-lg-7">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                   
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <!-- <td>type</td> -->
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   @foreach($users as $value)
                                                   @if($value['id']!=Auth::id() && $value['id']!=3)
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$value['name']}}</h6>
                                                            <span>
                                                                <a href="#">{{$value['email']}}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    @if($value['account_type']==1)
                                                    <td>
                                                        <button id="btn_change{{$value['id']}}" class="role admin" value="{{$value['account_type']}}" onclick="changetype({{$value['id']}})">admin</span>
                                                    </td>
                                                    @else
                                                     <td>
                                                        <button id="btn_change{{$value['id']}}" class="role user" value="{{$value['account_type']}}" onclick="changetype({{$value['id']}})">user</button>
                                                    </td>
                                                    @endif
                                                   <!--  <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td> -->
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endif
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                       <!--  <button class="au-btn au-btn-load">load more</button> -->
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

    </div>
@endsection
<script >
    function changetype(id) {
        // body...
        var stt=$('#btn_change'+id).val();
                // console.log($('#btn_'+id).val());
                if(stt=='0'){
                    // console.log('hmmm');
                    $('#btn_change'+id).html('admin');
                    $('#btn_change'+id).removeClass('user');
                    $('#btn_change'+id).addClass('admin');
                    $('#btn_change'+id).val('1');
                }
                else if(stt=='1'){
                    $('#btn_change'+id).html('user');
                    $('#btn_change'+id).removeClass('admin');
                    $('#btn_change'+id).addClass('user');
                    $('#btn_change'+id).val('0');
                }
                $.ajax({
                    url: "{{ url('changetype_acc') }}",
                    type: 'POST',
                    data: {id:id, status:stt,_token: '<?php echo csrf_token() ?>'},
                    success:function(data){
                        console.log(data);
                    }
                })
                .done(function() {
                    console.log("success");
                })
                .fail(function() {
                    console.log("error");
                })
            };
            function setName(id,name) {
                  $('#id').val(id);
                $('#newname').val(name);
            }
</script>