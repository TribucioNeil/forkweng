  <script src="assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/admin/vendors/chart.js/Chart.min.js"></script>

  <script src="assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/admin/vendors/chart.js/Chart.min.js"></script>
  <!-- <script src="assets/admin/vendors/datatables.net/jquery.dataTables.js"></script> -->
  <!-- <script src="assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <!-- <script src="assets/admin/js/dataTables.select.min.js"></script> -->

  <script src="assets/admin/js/off-canvas.js"></script>
  <script src="assets/admin/js/hoverable-collapse.js"></script>
  <script src="assets/admin/js/template.js"></script>
  <script src="assets/admin/js/settings.js"></script>
  <script src="assets/admin/js/todolist.js"></script>
  <script src="assets/admin/js/dashboard.js"></script>
  <script src="assets/admin/js/Chart.roundedBarCharts.js"></script>
  <script src="assets/admin/sweetalert2.all.min.js"></script>


  <!-- <script src="assets/admin/vendors/datatables.net/jquery.dataTables.js"></script> -->
  <!-- <script src="assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
  <!-- <script src="assets/admin/js/dataTables.select.min.js"></script> -->



  <!-- DATATABLES -->
  <!-- jQuery -->
  <script src="assets/admin/datatables/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/admin/datatables/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="assets/admin/datatables/datatables-jquery/jquery.dataTables.min.js"></script>
  <script src="assets/admin/datatables/datatables-bs4/dataTables.bootstrap4.min.js"></script>
  <script
    src="assets/admin/datatables/datatables-responsive/dataTables.responsive.min.js"></script>
  <script
    src="assets/admin/datatables/datatables-responsive/responsive.bootstrap4.min.js"></script>
  <script src="assets/admin/datatables/datatables-buttons/dataTables.buttons.min.js"></script>
  <script src="assets/admin/datatables/datatables-buttons/buttons.bootstrap4.min.js"></script>
  <script src="assets/admin/datatables/jszip/jszip.min.js"></script>
  <script src="assets/admin/datatables/pdfmake/pdfmake.min.js"></script>
  <script src="assets/admin/datatables/pdfmake/vfs_fonts.js"></script>
  <script src="assets/admin/datatables/datatables-buttons/buttons.html5.min.js"></script>
  <script src="assets/admin/datatables/datatables-buttons/buttons.print.min.js"></script>
  <script src="assets/admin/datatables/datatables-buttons/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/admin/datatables/js/adminlte.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <style>
  .btn-white {
    background-color: transparent !important;
    padding: 9px !important;
    border-radius: 4px;
  }
</style>

<script>
  $(function () {
    $("#example1")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        searching: false,
        
        buttons: [
          {
            extend: 'excel',
            text: '<i class="fas fa-file-excel text-success"></i>',
            titleAttr: 'Export to Excel',
            className: 'btn-white',
            exportOptions: {
              rows: { _: 'not(.dt-head-row)' },
              columns: [0, 1, 2, 3, 4] // Excludes the action column (index 4)
            },
            action: function (e, dt, button, config) {
              config.title = 'CALAPAN CITY PESO';
              $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
            }
          },
          {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf text-danger"></i>',
            titleAttr: 'Export to PDF',
            className: 'btn-white',
          },
          {
            extend: 'print',
            text: '<i class="fas fa-print text-primary"></i>',
            titleAttr: 'Print',
            className: 'btn-white',
          },
          
        ],
        columnDefs: [
          { targets: 1, type: 'date-euro' } // Set the second column to be treated as a date column
        ],
        order: [[2, "desc"]]
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    // Similarly adjust for other DataTable instances if needed

  });
</script>
<?php if (!empty(session()->getFlashdata('error'))) : ?>
  <script>
    Swal.fire({
      // icon: 'error',
      // title: 'Error',
      text: '<?= session()->getFlashdata('error'); ?>',
    })
  </script>
<?php endif ?>
<?php if (!empty(session()->getFlashdata('success'))) : ?>
  <script>
    const SuccessToast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    SuccessToast.fire({
      icon: 'success',
      title: '<?= session()->getFlashdata('success'); ?>'
    })
  </script>

<script>
$(document).ready(function() {
    // Combine data from different tables into one dataset
    var combinedData = [];

    // Assuming data in example1 and example2 tables are stored in separate arrays
    var data1 = []; // Data from table 1
    var data2 = []; // Data from table 2

    combinedData = combinedData.concat(data1, data2);

    // Initialize DataTable with combined dataset
    var table = $('#example').DataTable({
        data: combinedData, // Use combined dataset
        columns: [
            // Define your column structure here
        ]
    });

    // Implement custom search function
    $('#searchInput').on('keyup', function() {
        var query = this.value.toLowerCase();

        // Filter the combined dataset
        var filteredData = combinedData.filter(function(item) {
            // Implement your custom search logic here
            // For example, search across multiple columns
            return item.column1.toLowerCase().includes(query) ||
                   item.column2.toLowerCase().includes(query) ||
                   // Add more columns as needed
                   // ...
        });

        // Clear existing DataTable rows and redraw with filtered data
        table.clear().rows.add(filteredData).draw();
    });
});
</script>
<?php endif ?>
</body>
</html>