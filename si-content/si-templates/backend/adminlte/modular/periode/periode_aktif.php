
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Set Periode
    
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="">Periode</li>
      <li class="active">Set Periode</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
      
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="row pull-right">
                        
                       
                        

                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET.'include/img/list.png'; ?>" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Tentukan Periode aktif</h3>
                     <h5 class="widget-user-desc"> </h5>
                  </div>

                  
                  
                  <div > 
                    <?= form_open('', [
                        'name'    => 'form_user', 
                        'class'   => 'form-horizontal', 
                        'id'      => 'form', 
                        'enctype' => 'multipart/form-data', 
                        'method'  => 'POST'
                      ]); 

                      ?>
                      
                      <div class="form-group ">

                        <label for="username" class="col-sm-2 control-label">Periode<i class="required"></i></label>
                        <div class="col-sm-8">
                          <?php echo cmb_dinamis('periode_aktif','si_periode','keterangan','id',$periode_aktif, 'select2'); ?>
                          <small class="info help-block"></small>
                        </div>

                    </div>


                    <div class="row-fluid col-md-7 ">
                        <button type="button" class="btn btn-flat btn-info btn_get_data btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> SET PERIODE </button>
                        <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</a>
                        <span class="loading loading-hide"><img src="<?= BASE_ASSET ?>include/img/loading-spin-primary.svg"> <i>Loading, Saving data</i></span>
                     </div>

                  <?= form_close(); ?>
                  </div>
               </div>
               <hr>
              
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>

   </div>
   
  


<!-- /.content -->

<script type="text/javascript">
$(document).ready(function(){
  

    

    $('#btn_save').click(function(event) {
          
          var url = '<?= base_url('admin/periode/set'); ?>';
          var save_type = 'back';
          var form = $('#form')[0];
          var form_data = new FormData(form);
          form_data.append('save_type', save_type);
           $.ajax({
               url: url,
               type:"post",
               dataType: 'json',
               data:form_data,
               processData:false,
               contentType:false,
               async:false,
           })
           .done(function(data){

              
            })

       
    
    });

     

    
});
</script>


