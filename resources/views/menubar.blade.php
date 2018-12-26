
	<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="{{url('homepage')}}" class="logo"><img src="{{url('./img/logo.png')}}" alt=""></a>
						</div>
						<!-- /logo -->
						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="{{url('homepage')}}">News</a></li>
							<li><a href="{{url('shop/home')}}">Shop</a></li>
							@php ($i = 1)
							@foreach($types as $value)
							<li class="cat-{{$i}}"><a href="{{url('category/'.$value['id'])}}">{{$value['type_name']}}</a></li>
							@php ($i++)
							@endforeach
						</ul>
						<!-- /nav -->
						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<div class="search-form">
								<input class="search-input" id="key" type="text" name="search" oninput="search()" placeholder="Enter Your Search ...">
								<div style="background-color: white; padding-bottom: 20px" id="result"></div>
								<script >
									function search() {
										// body...
										$.getJSON('{{url("search")}}'+'/'+$('#key').val(), function(data) {
												/*optional stuff to do after success */
												if (data.length>0) {
													$('#result').html('');
												data.map(function(elem) {
													var noidung=''; 
													noidung+='<div class="post post-widget">'
														noidung+='<a class="post-img" href="{{url("view")}}/'+elem.id+'"><img src="'+elem.image+'" alt=""></a>';;
														noidung+='<div class="post-body">';
														noidung+='<h3 class="post-title"><a href="{{url("view")}}/'+elem.id+'">'+elem.title+'</a></h3>';
														noidung+='View:'+elem.view_count+' <br>'
															
														noidung+='</div>';
														noidung+='</div>';
													$('#result').append(noidung);
												})
											}
											else{
												$('#result').html('KHÔNG TÌM THẤY');
											}
										});
									}
								</script>
								<button class="search-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->
			
		<!-- /Header -->