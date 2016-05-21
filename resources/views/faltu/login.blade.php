<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
	{!! Html::style('knowmadic/css/bootstrap.min.css')!!}
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->

    <!-- Custom CSS -->
    <!--link href="css/custom_login.css" rel="stylesheet"-->
	{!! Html::style('knowmadic/css/custom_login.css')!!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>





    <!-- Page Content -->
    <div class="container">
        <div class="row center_tab">
            <div class="content_box">
                <!--img src="knowmadic/image/logo.png" class="log_logo"-->
                
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

            {{ HTML::image('knowmadic/image/logo.png', 'Knowmadic', array('class' => 'log_logo')) }}
                <h1>Welcome to <label>Knowmadic</label></h1>






            <form class="" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}


				<div class="form-group login_input {{ $errors->has('email') ? ' has-error' : '' }}">

					<input type="email" id="usr" class="form-control" name="email" placeholder="User Name" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
				</div>


				<div class="form-group login_input {{ $errors->has('password') ? ' has-error' : '' }}">

					  <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
				</div>


				<button type="submit" class="btn btn-default" id="login-submit">Submit</button>


				</form>







            </div>
		    <div class="login_reg_link">
			   <a class="" href="{{ url('/password/reset') }}">Forget Password?</a>
			   <a href="{{ url('/register') }}">Register Now</a>
			</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!--script src="js/bootstrap.min.js"></script-->
	{!! Html::script('knowmadic/css/bootstrap.min.js')!!}

     <script>
    $( "#usr" ).click(function() {
	    jQuery(".login_input input").css("background-color", "rgba(255,255,255,0)");
        jQuery("#usr").css("background-color", "rgba(255,255,255,0.2)");
    });
	$( "#pwd" ).click(function() {
	    jQuery(".login_input input").css("background-color", "rgba(255,255,255,0)");
        jQuery("#pwd").css("background-color", "rgba(255,255,255,0.2)");
    });
    </script>
</body>

</html>
