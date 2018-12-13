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
			
			<!-- Page Header -->
			<div id="post-header" class="page-header">
				<div class="background-img" style="background-image: url({{$post['thisPost']['image']}});"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="post-meta">
								<a class="post-category cat-{{$post['thisPost']['type_id']}}" href="category.html">{{$post['type']['type_name']}}</a>
								<span class="post-date">{{$post['thisPost']['created_at']}}</span>
							</div>
							<h1>{{$post['thisPost']['title']}}</h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
								<?php echo $post['thisPost']['content'];  ?> <br>
								<h3>View: {{$post['thisPost']['view_count']}}</h3>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class=" avatar" src="{{url($post['author_info']['avatar'])}}" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3>{{$post['author_info']['name']}}</h3>
										</div>
										<p>{!!$post['author_info']['author_intro']!!}</p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						@if(Auth::check())
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a comment</h2>
							</div>
							<form class="post-reply" method="post" action="{{url('post_comment')}}">
								{{csrf_field()}}
								<input type="text" hidden="true" name="post_id" value="{{$post['thisPost']['id']}}">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
										</div>
										<button type="submit" class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						@endif
						<div class="section-row">
							<div class="section-title">
								<h2>{{count($post['comments'])}} Comments</h2>
							</div>

							<div class="post-comments">
								<!-- comment -->
								@foreach ($post['comments'] as $value)

									@if($value['reply_id']==0)
									<div class="media">
									<div class="media-left">
										<img class="media-object" src="{{url($value['avatar'])}}" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h4>{{$value['name']}}</h4>
											<span class="time">{{$value['created_at']}}</span>
											<a href="" id="reply{{$value['id']}}" class="reply">Reply</a>
										</div>
										<p>{{$value['content']}}</p>
										@foreach ($post['comments'] as $val)
											@if($val['reply_id']==$value['id'])
												<div class="media">
													<div class="media-left">
														<img class="media-object" src="{{url($val['avatar'])}}" alt="">
													</div>
													<div class="media-body">
														<div class="media-heading">
															<h4>{{$val['name']}}</h4>
															<span class="time">March 27, 2018 at 8:00 am</span>
															
														</div>
														<p>{{$val['content']}}</p>

													</div>
												</div>
											@endif
										@endforeach
										<!-- comment -->
								
									@if(Auth::check())
											<form class="post-reply" method="post" action="{{url('post_comment')}}">
												{{csrf_field()}}
												<input type="text" hidden="true" name="post_id" value="{{$post['thisPost']['id']}}">
												<input type="text" hidden="true" name="reply_id" value="{{$value['id']}}">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="input" name="message" placeholder="Message"></textarea>
														</div>
														<button type="submit" class="primary-button">Submit</button>
													</div>
												</div>
											</form>
									
										@endif
									</div>
								</div>
						@endif	
					@endforeach
								<!-- /comment -->

								<!-- comment -->
							
					<!-- 	</div> -->
					</div>
						<!-- /comments -->
</div>
</div>
					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

						<!-- post widget -->
							@include('mostread')
						<!-- /post widget -->

	
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
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">January 2018</a></li>
									<li><a href="#">Febuary 2018</a></li>
									<li><a href="#">March 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
					<!-- /aside -->
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
								<a href="index.html" class="logo"><img src="./img/logo.png" alt=""></a>
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
		<!-- /Footer --