<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin - @yield('title')</title>
  <base href="{{ asset('') }}">
  <!-- Custom fonts for this template-->
  <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="css/toastr.css" rel="stylesheet">
  <link rel="icon" href="images/logo.png"> 

  <style>
    .ajax-loader {
      display: none;
      background: url('images/loading.gif') no-repeat center center;
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      z-index: 9999999;
    }
  </style>

</head>