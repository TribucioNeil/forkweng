<script src="assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/admin/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="assets/admin/js/dataTables.select.min.js"></script>
  <script src="assets/admin/sweetalert2.all.min.js"></script>

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
<?php endif ?>

  <script src="assets/admin/js/off-canvas.js"></script>
  <script src="assets/admin/js/hoverable-collapse.js"></script>
  <script src="assets/admin/js/template.js"></script>
  <script src="assets/admin/js/settings.js"></script>
  <script src="assets/admin/js/todolist.js"></script>
  <script src="assets/admin/js/dashboard.js"></script>
  <script src="assets/admin/js/Chart.roundedBarCharts.js"></script>
</body>
</html>