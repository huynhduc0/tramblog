<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

	@extends('master')
	@section('content')
    </head>
	<body>
		<!-- Header -->
			@include('menubar')
				<!-- /Main Nav -->
				<!-- Aside Nav -->
				@include('nav_user')
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- post -->
					@foreach ($head as $value)
					<div class="col-md-6">
						<div class="post post-thumb">
							<a  class="post-img"  href="{{url('view/'.$value['id'])}}"><img style="height: 300px;width: 100%; overflow: hidden;" src="{{$value['image']}}" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-{{$value['type_id']}}" href="{{url('category/'.$value['type_id'])}}">{{$value['type_name']}}</a>
									<span class="post-date">{{$value['created_at']}}  View:{{$value['view_count']}}</span>
								</div>
								<h3 class="post-title"><a href="{{url('view/'.$value['id'])}}">{{$value['title']}}</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					@endforeach
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>

					<!-- post -->
					@php ($i=1)
					@foreach($recentPosts as $value)
					@if($i<=3)
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="{{url('view/'.$value['id'])}}"><div class="center-cropped" 
										     style="background-image: url('{{$value['image']}}');">
										</div></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-{{$value['type_id']}}" href="{{url('category/'.$value['type_id'])}}">{{$value['type_name']}}</a>
									<span class="post-date">{{$value['created_at']}}  View:{{$value['view_count']}}</span>
								</div>
								<h3 class="post-title"><a href="{{url('view/'.$value['id'])}}">{{$value['title']}}</a></h3>
							</div>
						</div>
					</div>
					@endif
					@php ($i++)
					@endforeach
					<!-- /post -->
				</div>
				<!-- /row -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>HMMM</h2>
								</div>
							</div>
							<!-- post -->
							<div id="tin">
							@foreach($recentPosts as $value)
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="{{url('view/'.$value['id'])}}"><img <img style="height: 150px;width: 100%; overflow: hidden;" src="{{$value['image']}}" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-{{$value['type_id']}}" href="{{url('category/'.$value['type_id'])}}">{{$value['type_name']}}</a>
											<span class="post-date">{{$value['created_at']}}</span>
										</div>
										<h3 class="post-title"><a href="{{url('view/'.$value['id'])}}">{{$value['title']}}</a></h3>
										
										<div>{!!strip_tags ( substr($value['content'],0,100),'<p>' )  !!}...</div>
									</div>
								</div>
							</div>
							@endforeach
							</div>
							<!-- /post -->

							<!-- /post -->
							
							<div class="col-md-12">
								<div class="section-row">
									<button id="loadmorebutton" class="primary-button center-block" onclick="loadmore()">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="{{url('./img/ad-1.jpg')}}" alt="">
							</a>
						</div>
						<!-- /ad -->
						
						<!-- catagories -->

						<!-- post widget -->
						@include('mostread')
						<!-- /post widget -->
						<!-- post widget -->
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="index.html" class="logo"><img src="{{url('./img/logo.png')}}" alt=""></a>
							</div>
							<ul class="footer-nav">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Advertisement</a></li>
							</ul>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">About Us</h3>
									<ul class="footer-links">
										<li><a href="about.html">About Us</a></li>
										<li><a href="#">Join Us</a></li>
										<li><a href="contact.html">Contacts</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Catagories</h3>
									<ul class="footer-links">
										<li><a href="category.html">Web Design</a></li>
										<li><a href="category.html">JavaScript</a></li>
										<li><a href="category.html">Css</a></li>
										<li><a href="category.html">Jquery</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Join our Newsletter</h3>
							<div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Enter your email">
									<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
								</form>
							</div>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
	@endsection
	<script >
		var offset=2;
		var limit=2;
		function loadmore() {
			// body...
			
			$.getJSON('<?php echo url('loadmore')?>'+'/'+offset+'/'+limit, function(data){
				console.log(data.length);
				if(data.length==0){
					$('#loadmorebutton').html("That's all!");
					$('#loadmorebutton').addClass('btn btn-success');
				}
				else{
				data.map(function(elem) {
					var noidung='<div class="col-md-12">'
						noidung+='<div class="post post-row">';
						noidung+='<a class="post-img" href="{{url("view")}}/'+elem.id+'"><img <img style="height: 150px;width: 100%; overflow: hidden;" src="'+elem.image+'" alt=""></a>';
						noidung+='<div class="post-body">';
						noidung+='<div class="post-meta">';
						noidung+='<a class="post-category cat-'+elem.type_id+'" href="{{url('category')}}/'+elem.type_id+'">'+elem.type_name+'</a>';
						noidung+='<span class="post-date">'+elem.created_at+'</span>';
						noidung+='</div>';
						noidung+='<h3 class="post-title"><a href="{{url("view")}}/'+elem.id+'">'+elem.title+'</a></h3>';
						noidung+='<div>'+elem.content.substr(0, 100).replace(/<(?:.|\n)*?>/gm, '');+'</div></div></div>';
					$('#tin').append(noidung);
				})
			}
			});
			offset+=2;
		}
	</script>
	