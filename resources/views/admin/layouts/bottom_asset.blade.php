<!-- Bootstrap core JavaScript-->
  <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
{{--   <script src="assets/admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/admin/js/demo/chart-area-demo.js"></script>
  <script src="assets/admin/js/demo/chart-pie-demo.js"></script> --}}
  <script src="assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="js/toastr.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>
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