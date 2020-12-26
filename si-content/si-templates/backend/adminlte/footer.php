
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">alite.dev</a>.</strong> All rights reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- PACE -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/PACE/pace.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/dist/js/adminlte.min.js') ?>"></script>
<!-- MASK -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/jMask/dist/jquery.mask.min.js') ?>"></script>
<!-- InputMask -->
<script src="<?= get_template_dir(dirname(__FILE__), 'include/plugins/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
<!-- DataTables -->

<script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/dataTables.bootstrap.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/dataTables.buttons.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/buttons.bootstrap.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/jszip.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/pdfmake.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/vfs_fonts.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/buttons.html5.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/buttons.print.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/dataTables.fixedHeader.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/dataTables.keyTable.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/dataTables.responsive.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/responsive.bootstrap.min.js') ?>"></script>
        <script src="<?= get_template_dir(dirname(__FILE__), 'include/datatables/dataTables.scroller.min.js') ?>"></script>



<script src="<?= get_template_dir(dirname(__FILE__), 'include/js/custom.js') ?>"></script> 
<script src="<?= get_template_dir(dirname(__FILE__), 'include/fancy-box/source/jquery.fancybox.js?v=2.1.5') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/toastr/toastr.js') ?>"></script>

<!-- bootstrap datepicker -->
<!-- bootstrap time picker -->

<script type="text/javascript" src="<?= get_template_dir(dirname(__FILE__), 'include/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/timepicker/moment.min.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/timepicker/bootstrap-datetimepicker.min.js') ?>"></script>


<script src="<?= get_template_dir(dirname(__FILE__), 'include/chosen/chosen.jquery.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/plugins/iCheck/icheck.min.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/sweet-alert/sweetalert-dev.js') ?>"></script>
<script src="<?= get_template_dir(dirname(__FILE__), 'include/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<?= get_template('frola_editor'); ?>
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart()
  })
  $('.ajax').click(function () {
    $.ajax({
      url: '#', success: function (result) {
        $('.ajax-content').html('<hr>Ajax Request Completed !')
      }
    })
  })
$('.timepicker').datetimepicker({

   format: 'HH:mm'

  });
 $('.datepicker').datepicker({

      autoclose: true,

      format: 'yyyy/mm/dd'

    });
$(document).ready(function() {
  $selectElement = $('.select2').select2({
    placeholder: "Please select an Option",
    allowClear: true,
    
  });
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
})


</script>
</body>
</html>