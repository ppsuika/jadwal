<style type="text/css">
  .bg-white {
    background: #fff;
  }

  .small-box:hover {
    color: #ddd;
}

.bg-white>.small-box-footer {
    background: rgb(80, 191, 255);

}
</style>
<div class="main">
  <div class="main-inner">
    <div class="container">
      
      <div class="row">
        <div class="span12">

          <div class="widget">
            <div class="widget-header">
              <i class="icon-list-alt"></i><h3> Tampilan</h3>    
            </div>
            <!-- /widget-content -->
            <div class="widget-content" id="wrap-tampilan">

            	<p class="help-block">Template yang sedang digunakan saat ini ...  </p>
            	<div class="row">
            		<div class="col-md-6 single-tampilan" id="template-now">
          				<img class="img img-responsive" src="<?=base_url();?>assets/images/blank.png" /><br>
          				<a href="<?= base_url('admin/template/setting') ?>"  class="btn btn-primary btn-flat" >Setting Tampilan</a>
            		</div>
            	</div>            	

            	<h3>Berikut template yang bisa Anda gunakan : </h3>
            	<p class="help-block">Template yang bisa Anda gunakan, Anda pun bisa mengkostumisasinya! </p>

            	<div class="row" id="list-tampilan"></div>            	

            </div>
            <!-- /widget-content --> 
          </div>

          
        </div>
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->

<div class="modal fade " id="modal_form" role="dialog" tabindex="-1">
    <div class="modal-dialog full-width">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">Settings Tampilan</h3>
            </div>
            <div class="modal-body form-horizontal row">
                <form id="form-tampilan"> 

                <fieldset class="form-horizontal"><div class="control-group"></div></fieldset> 
                <input type="hidden" name="template_directory" value="" id="template_directory" />
              </form>
                  
                  
            </div>
            <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Updating data</i></span>
                <button type="submit" class="btn btn-flat btn-info btn_save btn_action" id="submit-tampilan" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Simpan !</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
  jQuery(document).ready(function($) {
    var path = window.location.pathname;
    var host = window.location.hostname; 
    var url = '<?= base_url('admin/template/getTemplate') ?>';
    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'JSON',
    })
    .done(function(data) {
     $('#list-tampilan div.single-tampilan').remove();
        $('#modal_form .modal-body #form-tampilan fieldset.form-horizontal div.control-group').empty();
        $.each(data.record, function(index, element) {
          var img_url = '<?= FRONTENDTPATH;?>'+element.template_directory;
          // alert(element.template_name);
          $('#list-tampilan').append(
              '<div class="col-md-4  col-sm-4 single-tampilan">'+
                '<div class="small-box bg-white">'+
                  '<div class="inner">'+
                  '  <img class="img img-responsive" src="'+img_url+'/screenshot.png" />'+
                    '<h4>'+element.template_name+'</h4> <small><i><strong>v.'+element.template_version+'</small></i></strong>'+
                  '</div>'+
                  '<a href="#aktifkan?template='+element.template_directory+'" id="aktifkan" data-id="'+element.template_directory+'" class="small-box-footer">'+
                  ' Aktifkan <i class="fa fa-arrow-circle-right"></i>'+
                  '</a>'+
                '</div>'+
              '</div>'

            );
        });
          var img_url = '<?= FRONTENDTPATH;?>'+data['template_setting'].template_directory;

        /* ini untuk bagian detail template edit */
          $('#template-now img').attr('src', img_url+'/screenshot.png');
        
        
      
        $('body').scrollTop(0);
    })
    .always(function() {
        $('body').scrollTop(0);
      
    });
  });


  $(document).on('click', '#aktifkan', function(event) {
    event.preventDefault();
      var path = window.location.pathname;
      var host = window.location.hostname; 
      var url = '<?= base_url('admin/template/getTemplate') ?>';
      var template = $(this).attr('data-id');

       $.ajax({
          url: url,
          type: 'POST',
          dataType: 'JSON',
          data: {template:template},
        })
        .done(function(res) {
          var img_url = '<?= FRONTENDTPATH;?>'+res.data.template_directory;

         $('#modal_form .modal-body div.template_detail').remove();
            $('#modal_form .modal-body').append(
              '<div class="template_detail">'+
                '<div class="col-md-6 col-sm-6">'+
                  '<img class="img img-responsive" src="'+img_url+'/screenshot.png" />'+
                '</div>'+
                '<div class="col-md-6 col-sm-6">'+
                  '<h2>Template '+res.data.template_name+' <small>'+res.data.template_version+'</small></h2>'+
                  '<p>Dibuat oleh: <strong>'+res.data.template_author+'</strong></p>'+
                  res.data.template_description+
                '</div>'+
              '</div>');

            $('#modal_form .modal-body #form-tampilan #template_directory').val(template);
            $('#modal_form .modal-body #form-tampilan fieldset.form-horizontal').hide();
            $('#modal_form .modal-header #modal_formLabel').text('Aktifkan Template '+humanize(template));
            $('#modal_form .modal-footer #submit-tampilan').text('Aktifkan Template Ini!');
            $('#modal_form').modal('show');
        });
    });


  $('#submit-tampilan').click(function() {
    var url = '<?= base_url('admin/template/update_save'); ?>';
    var save_type = 'back';
    var form = $('#form-tampilan');
    var data_post = form.serializeArray();
    $.ajax({
      url: url,
      type: 'POST',
      dataType: 'JSON',
      data: data_post,
    })
    .done(function(res) {
      if (res.success == true) {
         toastr['success'](res.message);
            $('#modal_form').modal('hide');
            ambil_tampilan();

       } else {
         toastr['success'](res.message);
         $('#modal_form').modal('hide');
         ambil_tampilan();
       }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      ambil_tampilan()
    });
    


  });

  /*FUNCTION SECTiON*/

  function humanize(str){
    str = str.replace(/-/g, ' ');
    str = str.replace(/_/g, ' ');
    return str.charAt(0).toUpperCase() + str.slice(1);
  }

  function ambil_tampilan(){
    if($('#list-tampilan').length > 0){
      var url = '<?= base_url('admin/template/getTemplate') ?>';
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'JSON',
      })
      .done(function(data) {
       $('#list-tampilan div.single-tampilan').remove();
          $('#modal_form .modal-body #form-tampilan fieldset.form-horizontal div.control-group').empty();
          $.each(data.record, function(index, element) {
            var img_url = '<?= FRONTENDTPATH;?>'+element.template_directory;
            // alert(element.template_name);
            $('#list-tampilan').append(
                '<div class="col-md-4  col-sm-4 single-tampilan">'+
                  '<div class="small-box bg-white">'+
                    '<div class="inner">'+
                    '  <img class="img img-responsive" src="'+img_url+'/screenshot.png" />'+
                      '<h4>'+element.template_name+'</h4> <small><i><strong>v.'+element.template_version+'</small></i></strong>'+
                    '</div>'+
                    '<a href="#aktifkan?template='+element.template_directory+'" id="aktifkan" data-id="'+element.template_directory+'" class="small-box-footer">'+
                    ' Aktifkan <i class="fa fa-arrow-circle-right"></i>'+
                    '</a>'+
                  '</div>'+
                '</div>'

              );
          });
            var img_url = '<?= FRONTENDTPATH;?>'+data['template_setting'].template_directory;

          /* ini untuk bagian detail template edit */
            $('#template-now img').attr('src', img_url+'/screenshot.png');
          
          
        
          $('body').scrollTop(0);
      })
      .always(function() {
          $('body').scrollTop(0);
        
      });
    }
  }
</script>