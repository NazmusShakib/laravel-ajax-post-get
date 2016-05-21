<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <!-- google font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <!-- Bootstrap Core CSS -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
	{{ Html::style('knowmadic/css/bootstrap.min.css')}}
    <!-- Custom CSS -->
    <!--link href="css/custom_login.css" rel="stylesheet"-->
	{{ Html::style('knowmadic/css/custom_login.css')}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Page Content -->
    <div class="container registration_form">
        <div class="row center_tab">
            <div class="content_box">

				{{ HTML::image('knowmadic/image/logo.png', 'Knowmadic', array('class' => 'log_logo')) }}

                    <form role="form" id="register_form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}


				    	<div class="form-group login_input {{ $errors->has('name') ? ' has-error' : '' }}">

              	<input type="text" class="form-control" id="usr" name="name" placeholder="User Name" value="{{ old('name') }}">

             		 @if ($errors->has('name'))
                	  <span class="help-block">
                     	 	<strong>{{ $errors->first('name') }}</strong>
                 	 </span>
             		 @endif


					</div>




					<div class="form-group login_input{{ $errors->has('password') ? ' has-error' : '' }}">

            	<input type="password" class="form-control" id="pwd" name="password" placeholder="Password">

           		 @if ($errors->has('password'))
               		 <span class="help-block">
                    		<strong>{{ $errors->first('password') }}</strong>
                		</span>
           		 @endif


					</div>



					<div class="form-group login_input{{ $errors->has('email') ? ' has-error' : '' }}">

             		 <input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">

             		 @if ($errors->has('email'))
                 		 <span class="help-block">
                      		<strong>{{ $errors->first('email') }}</strong>
                  		</span>
             		 @endif
					</div>



					<div class="form-group login_input{{ $errors->has('phone') ? ' has-error' : '' }}">

					  <input type="tel" class="form-control" id="phone" placeholder="Contact No" name="phone" value="{{ old('phone') }}">
                   		 @if ($errors->has('phone'))
                       		 <span class="help-block">
                            		<strong>{{ $errors->first('phone') }}</strong>
                        		</span>
                   		 @endif
					</div>


					<button type="submit" class="btn btn-default" id="registration-submit">Submit</button>

				</form>

            </div>
		    <div class="login_reg_link">
			   <a class="login_link" href="{{ url('/login') }}">Already have an Account. Log in Now</a>
			</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!--script src="js/bootstrap.min.js"></script-->
	{{ Html::script('knowmadic/js/bootstrap.min.js')}}     
<script>
    $( "#usr" ).click(function() {
	    jQuery(".login_input input").css("background-color", "rgba(255,255,255,0)");
        jQuery("#usr").css("background-color", "rgba(255,255,255,0.2)");
    });
	$( "#pwd" ).click(function() {
	    jQuery(".login_input input").css("background-color", "rgba(255,255,255,0)");
        jQuery("#pwd").css("background-color", "rgba(255,255,255,0.2)");
    });
	$( "#email" ).click(function() {
	    jQuery(".login_input input").css("background-color", "rgba(255,255,255,0)");
        jQuery("#email").css("background-color", "rgba(255,255,255,0.2)");
    });
	$( "#phone" ).click(function() {
	    jQuery(".login_input input").css("background-color", "rgba(255,255,255,0)");
        jQuery("#phone").css("background-color", "rgba(255,255,255,0.2)");
    });
    </script>
</body>

</html>
