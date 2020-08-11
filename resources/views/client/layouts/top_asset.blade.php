<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">
    
    <base href="{{ asset('') }}">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="assets/client/css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="assets/client/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="assets/client/css/style.css" />
	<link href="css/toastr.css" rel="stylesheet">
	@yield('css')

</head>