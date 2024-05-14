
<?php if (session()->has('error')): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '<?= session()->getFlashdata('error'); ?>'
});
</script>
<?php endif ?>
<?php if (session()->has('success')): ?>
<script>                
const Toast = Swal.mixin({
    toast: true,
    position: 'mid-center',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

Toast.fire({
    icon: 'success',
    title: '<?= session()->getFlashdata('success'); ?>'
});
</script>
<?php endif ?>
  <script src="assets/admin/sweetalert2.all.min.js"></script>

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
  
</body>
</html>