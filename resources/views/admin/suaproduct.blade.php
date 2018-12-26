<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{url('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
<!--===============================================================================================-->
</head>

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

            <form class="well form-horizontal" method="POST" action="{{url('saveproduct/'.$product['id'])}}" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <fieldset>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Name Product</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                                                    <input name="name" value="{{$product['name']}}" placeholder="Name Product" class="form-control" required="true" type="text">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Price</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                                    <input name="price" value="{{$product['price']}}" placeholder="Price" class="form-control" type="number">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-md-4 control-label">Số lượng</label>
                                                <div class="col-md-8 inputGroupContainer">
                                                   <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                                    <input name="quantity" value="{{$product['count']}}" placeholder="Count" class="form-control" type="number">
                                                   </div>
                                                </div>
                                             </div>
                                            <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                            <select name="type_id" class="input1 form-control form-control-lg">
                                              @foreach ($brand as $value)
                                               @if($value['id']==$product['brandID'])
                                                  <option selected="true" value="{{$value['id']}}">{{$value['brandname']}}</option>
                                                  @else
                                                  <option value="{{$value['id']}}">{{$value['brandname']}}</option>
                                                  @endif
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
                    <input class="input1" id="image" type="text" name="image" placeholder="Image" value="{{$product['img']}},">
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
    <script src="{{url('vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

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
CKEDITOR.instances['editor1'].setData('{!! $product['description'] !!}');
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