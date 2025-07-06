<!-- jQuery -->
<script src="{{ URL::asset('/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JS -->
<script src="{{ URL::asset('/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FeatherIcons JS -->
<script src="{{ URL::asset('/dist/js/feather.min.js') }}"></script>
<!-- Fancy Dropdown JS -->
<script src="{{ URL::asset('/dist/js/dropdown-bootstrap-extended.js') }}"></script>
<!-- Simplebar JS -->
<script src="{{ URL::asset('/vendors/simplebar/dist/simplebar.min.js') }}"></script>
<!-- Tinymce JS -->
<!-- Dragula JS -->
<script src="{{ URL::asset('/vendors/dragula/dist/dragula.min.js') }}"></script>
<!-- PS Scroll JS -->
<script src="{{ URL::asset('/dist/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ URL::asset('/vendors/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('/dist/js/daterangepicker-data.js') }}"></script>
<script src="{{ URL::asset('/vendors/dropzone/dist/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('/vendors/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ URL::asset('/dist/js/dropify-data.js') }}"></script>
<!-- Apex JS -->
<script src="{{ URL::asset('/vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
<!-- Data Table JS -->
<script src="{{ URL::asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ URL::asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js') }}"></script>
<script src="{{ URL::asset('vendors/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ URL::asset('dist/js/dataTables-data1234.js') }}"></script>
<!-- Select2 JS -->
<script src="{{ URL::asset('/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('/dist/js/select2-data.js') }}"></script>
<!-- Init JS -->
<script src="{{ URL::asset('/dist/js/init.js') }}"></script>
<script src="{{ URL::asset('/dist/js/chips-init.js') }}"></script>


<script>
    document.addEventListener('focusin', function (e) {
        if (e.target.closest('.select2-search__field') !== null) {
            e.stopImmediatePropagation();
        }
    });
</script>

<script src="{{ URL::asset('vendors/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('dist/js/sweetalert-data.js') }}"></script>

@if (session('success'))
<script>
    Swal.fire({
        title: "{{ session('success') }}",
        icon: 'success',
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
</script>
@endif
@if (session('error'))
<script>
    Swal.fire({
        title: "{{ session('error') }}",
        icon: 'error',
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
    });
</script>
@endif

