@if(count($errors)>0)
	<div class="alert alert-warning" role="alert">
		<ul>
			@foreach ($errors->all() as $error)
			<li> <strong>Lỗi mẹ rồi: huhu </strong> {{$errors}}</li>
			@endforeach
		</ul>
	</div>
@endif