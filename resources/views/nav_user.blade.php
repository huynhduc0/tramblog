
<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							@if(!Auth::check())
							<li><a href="{{url('dn')}}">Login</a></li>
							@else
							
							<li> <img class="avatar" src="{{url($profile['avatar'])}}" class="
								img-responsive">,<br><h1> HI, {{$profile['name']}}</h1></li>
								<li> <a href="{{url('writepost')}}">Write post</a></li>
								@if($profile['account_type']==1)
								<li><a href="{{url('ad')}}">Trang admin</a></li>
								@endif
							<li> <a href="{{url('out')}}">Đăng xuất</a></li>
							<li> <a href="{{url('bio')}}">Cập nhật giới thiệu và Avatar</a></li>
							@endif
							
						<!-- 	<li><a href="index.html">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="#">Join Us</a></li>
							<li><a href="#">Advertisement</a></li>
							<li><a href="contact.html">Contacts</a></li> -->
							
						</ul>
					</div>
					<!-- /nav -->
					<!-- widget posts -->
					@if(Auth::check())
					<div class="section-row">
						<h3>Your last posts</h3>
						@foreach ($myPosts as $value)
						<div class="post post-widget" id="post">
							<a class="post-img" href="{{url('view/'.$value['id'])}}"><img src="{{$value['image']}}" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="{{url('view/'.$value['id'])}}">{{$value['title']}}</a></h3>
								View: {{$value['view_count']}} <br>
								
							</div>
						</div>
						<h5>Tình trạng:
							@if($value['status']==0)
								Đợi duyệt<a href="{{url('suapost/'.$value['id'])}}">
								<button type="button" class="btn btn-warning" >Sửa</button>
								</a>
							@elseif($value['status']==-1)
								Bị chăn<a href="{{url('suapost/'.$value['id'])}}">
								<button type="button" class="btn btn-warning" >Sửa</button>
								</a>
							@elseif ($value['status']==1)
								Đang ẩn
								<button type="button" id="btn_{{$value['id']}}" value="hide" class="btn btn-success" onclick="Update({{$value['id']}})">Hiện</button><a href="{{url('suapost/'.$value['id'])}}">
								<button type="button" class="btn btn-warning">Sửa</button>
								</a>
							@elseif ($value['status']==2)
								Đang hiển thị
								<button type="button" id="btn_{{$value['id']}}" value="show" class="btn btn-danger" onclick="Update({{$value['id']}})">Ẩn</button><a href="{{url('suapost/'.$value['id'])}}">
								<button type="button" class="btn btn-warning">Sửa</button>
								</a>
							@endif
						</h5>
						@endforeach
						<div id="pagination">{{ $myPosts->links() }}</div>
						<script >
			function Update(id) {
				var stt=$('#btn_'+id).val();
				// console.log($('#btn_'+id).val());
				if(stt=='hide'){
					// console.log('hmmm');
					$('#btn_'+id).html('Ẩn');
					$('#btn_'+id).removeClass('btn-success');
					$('#btn_'+id).addClass('btn-danger');
					$('#btn_'+id).val('show');
				}
				else if(stt=='show'){
					$('#btn_'+id).html('Hiện');
					$('#btn_'+id).removeClass('btn-danger');
					$('#btn_'+id).addClass('btn-success');
					$('#btn_'+id).val('hide');
				}
				$.ajax({
					url: "{{ url('changestatus') }}",
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
			
		</script>
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					@endif
					<div class="section-row">
						<h3>Follow us</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				</div>
			<!-- /Nav -->
			
			<!-- Page Header -->
			
			<!-- /Page Header -->
		</header>
		