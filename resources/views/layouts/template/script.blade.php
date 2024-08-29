<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script> --}}
<!-- Summernote -->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('assets/dist/js/demo.js')}}"></script> --}}

{{-- fontawesome kit --}}
<script src="https://kit.fontawesome.com/80f227685e.js" crossorigin="anonymous"></script>

{{-- file login --}}
{{-- <script src="{{asset('assets/dist/js/adminlte.min.js?v=3.2.0')}}"></script> --}}
{{-- file login --}}

{{-- sweatalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- sweatalert --}}

{{-- fitur search data table --}}
<script>
  // Fitur Search
document.getElementById('searchInput').addEventListener('keyup', function() {
    var input = this.value.toLowerCase();
    var rows = document.querySelectorAll('#dataTable tr');
    var found = false;

    rows.forEach(function(row) {
        // Cek jika ini bukan baris 'no data'
        if (row.id !== 'noDataRow') {
            var text = row.textContent.toLowerCase();
            if (text.indexOf(input) > -1) {
                row.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
            }
        }
    });

    // Tampilkan baris "Data yang Anda cari tidak ada" jika tidak ada data yang ditemukan
    if (!found) {
        document.getElementById('noDataRow').style.display = '';
    } else {
        document.getElementById('noDataRow').style.display = 'none';
    }
});
</script>
{{-- /fitur search data table --}}