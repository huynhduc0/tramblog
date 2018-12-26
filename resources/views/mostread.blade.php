						
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
							@foreach ($mostReadPosts as $value)
							<div class="post post-thumb">
								<a class="post-img" href="{{url('view/'.$value['id'])}}"><img style="height: 250px;width: 100%; overflow: hidden;" src="{{$value['image']}}" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-{{$value['type_id']}}" href="{{url('category/'.$value['type_id'])}}">{{$value['type_name']}}</a>
										<span class="post-date">{{$value['created_at']}}</span>
									</div>
									<h3 class="post-title"><a href="{{url('view/'.$value['id'])}}">{{$value['title']}}</a></h3>
								</div>
							</div>
							@endforeach
						</div>
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									@foreach ($types as $value)
									<li><a href="{{url('category/'.$value['id'])}}" class="cat-{{$value['id']}}">{{$value['type_name']}}<span>{{count($value['count'])}}</span></a></li>
									@endforeach
								</ul>
							</div>
						</div>