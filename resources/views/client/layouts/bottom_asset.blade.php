<script src="assets/client/js/jquery.min.js"></script>
<script src="assets/client/js/bootstrap.min.js"></script>
<script src="assets/client/js/jquery.stellar.min.js"></script>
<script src="assets/client/js/main.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/toastr.min.js"></script>
@if(session('success'))
  <script>
      toastr.success('{{ session('success') }}', 'Thông báo', {timeOut: 4000});
  </script>
@endif
@if(session('error'))
  <script>
      toastr.error('{{ session('error') }}', 'Lỗi', {timeOut: 4000});
  </script>
@endif
@yield('script')