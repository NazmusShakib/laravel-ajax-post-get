<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Ajax</title>
   <meta name="csrf-token" content="{{ csrf_token() }}" />

    {!! Html::style('knowmadic/css/bootstrap.min.css')!!}
</head>
<body>
	<div class="container">
		<div class="row col-lg-5">
			<h2>Get Request</h2>
			<button type="button" class="btn btn-warning" id="getRequest">GetRequest</button>
		</div>

		<div class="row col-lg-5">
			<form id="register" action="#">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<label for="firstname"></label>
				<input type="text" id="firstname"  name="firstname" value="{{old('firstname')}}" class="form-control">
				
				<label for="lastname"></label>
				<input type="text" id="lastname" name="lastname" value="{{old('lastname')}}" class="form-control">

				<input type="submit" value="Register" class="btn btn-pramary">
			</form>
		</div>


	</div>

	<div id="getRequestData">
		

	</div>

	<div id="postRequestData">
		

	</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
		});

		$(document).ready(function(){
			$('#getRequest').click(function(){
/*				$.get('getRequest', function(data){
					$('#getRequestData').append(data);
					console.log(data);
				});*/
				
				$.ajax({
					type: "GET",
					url: "getRequest",
					success: function(data){
						console.log(data);
						$('#getRequestData').append(data);
					}
				});
			});

			$('#register').submit(function(){
				var fname = $('#firstname').val();
				var lname = $('#lastname').val();
/*				$.post('register',{firstname:fname,lastname:lname},function(data){
					console.log(data);
					$('#postRequestData').html(data);
				});*/
				alert('Testing Responce');
				var dataString = "firstname="+fname+"&lastname="+lname;
				$.ajax({
					type:"POST",
					url: "register",
					data: dataString,
					success: function(data){
						console.log(data);
						$('#postRequestData').html(data);
					}
				});
			});
		});
	</script>

</body>
</html>