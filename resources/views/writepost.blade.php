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

			<form class="contact1-form validate-form" action="{{url('savepost')}}" method="post">
				 {{ csrf_field() }}
				<span class="contact1-form-title">
					Write post now!
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Title is required">
					<input class="input1" type="text" name="title" placeholder="title">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<select name="type_id" class="input1 form-control form-control-lg">
					  @foreach ($types as $value)
					  <option value="{{$value['id']}}">{{$value['type_name']}}</option>
					  @endforeach
					</select>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Image is required">
					<input class="input1" id="image" type="text" name="image" placeholder="Image">
					<button type="button" id="choose_img" class="btn btn-warning"> Chọn từ server</button>
					<span class="shadow-input1"></span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					Content:
					<textarea class="input1" id="editor1" name="content" placeholder="content"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn">
						<span>
							Save
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
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
				output.value = file.getUrl();

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