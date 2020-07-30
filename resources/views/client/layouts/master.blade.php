@include('client.layouts.top_asset')
<body>
	<!-- HEADER -->
	@include('client.layouts.header')
	<!-- /HEADER -->

	<!-- CONTENT -->
	@yield('content')
	<!-- /CONTENT -->

	<!-- FOOTER -->
	@include('client.layouts.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	@include('client.layouts.bottom_asset')

</body>

</html>
