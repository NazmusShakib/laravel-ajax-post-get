<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel ACL</title>
    {!! Html::style('knowmadic/css/bootstrap.min.css')!!}
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">

</head>
<body>

@include('partials.header')

<div class="main">
    @yield('content')
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	{{ Html::script('knowmadic/js/bootstrap.min.js')}}  

</body>
</html>