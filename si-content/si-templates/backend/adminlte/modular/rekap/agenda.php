
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Manajemen Agenda
    
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Manajemen Agenda</li>
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
                     <h3 class="widget-user-username">Rekap Agenda</h3>
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

                        <label for="username" class="col-sm-2 control-label">Program Studi<i class="required"></i></label>



                        <div class="col-sm-8">

                          <?php echo cmb_dinamis('nama_prodi','ci_prodi','nama_prodi','id',$nama_prodi, 'select2'); ?>

                          

                          <small class="info help-block"></small>

                        </div>

                    </div>

                     <div class="form-group ">
                        <label for="text" class="col-sm-2 control-label">Tanggal <i class="required"></i></label>
                        <div class="col-sm-4">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="tanggal" value="<?= $tanggal ?>" class="form-control pull-right datepicker" >
                            </div>
                          <small class="info help-block required">
                           
                          </small>

                        </div>
                        
                        <div class="col-sm-4">
                          <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" name="range" value="<?= $tanggal ?>" class="form-control pull-right datepicker" >
                            </div>
                          <small class="info help-block required">
                           
                          </small>

                        </div>
                    </div>
                    
                    <div class="message">
                      <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('message') ?></div>
                      <?php endif ?>
                    </div>

                    <div class="row-fluid col-md-7 ">
                        <button type="button" class="btn btn-flat btn-info btn_get_data btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Rekap </button>
                        <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)" href="<?= base_url('admin/rekap') ?>"><i class="fa fa-undo" ></i> Cancel</a>
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
   
  
  <h2>Download Excel</h2>
   <div class="table-responsive">
     <table id="log-generate" class="table table-bordered table-striped dataTable">
        <thead class="head-table">
          <tr class="">
           <th>
            #
           </th>
           <th >Program Studi</th>
           <!-- <th >Agenda title</th> -->
           <th >Nama file</th>
           <th>Periode</th>
           <th>Tanggal Generate</th>
           <th>Download File</th>
        </tr>
        </thead>
        <tbody>
 
        </tbody>
    </table>
   </div>
</section>


<!-- /.content -->

<script type="text/javascript">
$(document).ready(function(){
  $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
          return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
        };
  function reload_ajax() {
    table.ajax.reload(null, false);
  }
  table = $("#log-generate").DataTable({
    initComplete: function() {
      var api = this.api();
      $("#log-generate input")
        .off(".DT")
        .on("keyup.DT", function(e) {
          api.search(this.value).draw();
        });
    },
    dom:
      "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [
      
    ],
    oLanguage: {
      sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: BASE_URL + "admin/rekap/show_log_agenda",
      type: "POST"
      //data: csrf
    },
    columns: [
      {
        data: "id",
        orderable: false,
        searchable: false
      },
      { data: "nama_prodi" },
      //{ data: "judul_kegiatan" },
      { data: "name" },
      { data: {
          tanggal: "periode_tgl",
          range: "periode_range"
        },
        orderable: false,
        searchable: false,
        render: function(data, type, row, meta) {
           return `<span class="badge badge-pill badge-info">${data.periode_tgl } s/d ${data.periode_range}</span>`;

        }
      },
      { data: "date" },
    ],
    columnDefs: [
      {
        searchable: false,
        targets: 5,
        data: {
          id: "id",
          name : "name",
          status_all: 'status_all' 
         
        },
        render: function(data, type, row, meta) {
          let file_name =data.name;
          
          return `<div class="text-center">
                  <a title="Edit data terpilih" class="btn btn-xs btn-warning" href="${BASE_URL}downloads/reporting/${file_name}.xlsx">
                    <i class="fa fa-download"></i>
                  </a>
                `;
        }
      },
     
    ],
    order: [[1, "asc"]],
    rowId: function(a) {
      return a;
    },
    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $("td:eq(0)", row).html(index);
    }
  });

  table
    .buttons()
    .container()
    .appendTo("#log-generate .col-md-6:eq(0)");

 $('.timepicker').datetimepicker({

           format: 'HH:mm'

          });

            //Date picker

    $('.datepicker').datepicker({

      autoclose: true,
      locale: 'id',
      format: 'yyyy/mm/dd'

    });


    

    $('#btn_save').click(function(event) {
          
          var url = '<?= base_url('admin/rekap/show_agenda'); ?>';
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

               if (data.status == true) {
              $('#modal_rekap').modal('show');
              if (data.all) {
                $('.tr_dosen').hide();
                $('.nama_dosen_header').show();
                $('.table').show();
                  $('.cancel-rekap').show();
                   var rekap = "";
                  var no = 0;

                  var name = '';
                  var date = '';
                  var range = '';
                $.each(data.rekap, function(index, val) {
                  no++;
                   rekap += '<tr>';
                   rekap += '<td>'+no+'</td>';
                    rekap += '<td>'+val.nama_prodi+'</td>';
                   rekap += '<td>'+val.judul_kegiatan+'</td>';
                   rekap += '<td>'+val.jenis_kegiatan+'</td>';
                   rekap += '<td>'+val.kegiatan+'</td>';
                   rekap += '<td>'+val.tanggal+'</td>';
                   rekap += '<td>'+val.jam_mulai+'</td>';
                   rekap += '<td>'+val.jam_berakhir+'</td>';
                   $('.nama_dosen').text(val.nama_dosen);

                });

                
              } else {
                $('.tr_dosen').show();
                $('.nama_dosen_header').hide();
                $('.table').show();
                  $('.cancel-rekap').show();
                   var rekap = "";
                  var no = 0;
                $.each(data.rekap, function(index, val) {
                  no++;
                   rekap += '<tr>';
                   rekap += '<td>'+no+'</td>';
                   rekap += '<td>'+val.judul_kegiatan+'</td>';
                   rekap += '<td>'+val.jenis_kegiatan+'</td>';
                   rekap += '<td>'+val.kegiatan+'</td>';
                   rekap += '<td>'+val.tanggal+'</td>';
                   rekap += '<td>'+val.jam_mulai+'</td>';
                   rekap += '<td>'+val.jam_berakhir+'</td>';
                   $('.nama_dosen').text(val.nama_prodi);

                });  
              }

               
                   
                 $('.periode').text(data.periode);
                 $('#tbody_content').html(rekap);
                  $('#rekap_btn').click(function(event) {
                    genrate_(form);
                  }); 
                 return;
               } else {
                   toastr['error'](data.message);
                  return
                
               }
            })

       
    
    });

    function genrate_(form) {
      var fm = new FormData(form);
      fm.append('save_type', 'generate');

        $.ajax({
          url: '<?= base_url('admin/rekap/show_agenda') ?>',
          type: 'POST',
          dataType: 'JSON',
          data: fm,
          processData:false,
         contentType:false,
         async:false,
        })
        .done(function(res) {
          if (res.status == true) {
            toastr['success'](res.message);
            $('#modal_rekap').modal('hide');
            table.ajax.reload(null,false);
            return 
          } else {
            toastr['error'](res.message);
            $('#modal_rekap').modal('hide');
            table.ajax.reload(null,false);
            return
          }
        })
        .fail(function(res) {
          toastr['error'](res.message);
          table.ajax.reload(null,false);
        })
        
        
        
   
    }


    // $('#rekap_btn').click(function(event) {
    //   /* Act on the event */
    //   var form_rekap = $('#form_rekap');
    //   var data_post = form_rekap.serializeArray();
    //   var save_type = $(this).attr('data-stype');

    //   $.ajax({
    //     url: BASE_URL + 'admin/jadwal/rekap_mengajar',
    //     type: 'POST',
    //     dataType: 'JSON',
    //     data: data_post,
    //   })
    //   .done(function(res) {
    //     console.log(res.message);
    //   })
    //   .fail(function() {
    //     console.log("error");
    //   })
    //   .always(function() {
    //     console.log("complete");
    //   });
      

    // });
     

    
});
</script>

<div class="modal fade" id="modal_rekap" role="dialog" tabindex="-1">
    <div class="modal-dialog full-width">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#03904e; color:#fff; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Rekap Data</h3>
            </div>
            <div class="modal-body  form-horizontal">
              <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Generate data ... </i></span>
                <button type="submit" class="btn btn-flat btn-info  rekap" id="rekap_btn" data-stype='stay' title="save (Ctrl+s)" ><i class="fa fa-save" ></i> Generate Data to Excel</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default cancel-rekap" id="btn_cancel" title="cancel (Ctrl+x)" ><i class="fa fa-undo" ></i> Cancel</button>
            </div>
                <div class="table-responsive"> 
                  <table id="log-generate" class="table table-bordered table-striped dataTable">
                   
                    <tr class="tr_dosen">
                      <td>Program Studi </td>
                      <td><span class="nama_dosen">Muhammad Asrul anwar</span></td>
                    </tr>

                    <tr>
                      <td>Periode</td>
                      <td><span class="periode">Periode</span></td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <strong ><p class="text-center">Data Kehadiran dosen</p></strong>
                      </td>
                    </tr>
                      <tr>
                        <table class="table ">
                            <thead class="head-table">
                              <tr class="">
                               <th>
                                #
                               </th>
                               <th class="nama_dosen_header" style="display:none">Program Studi</th>
                               <th>Judul Kegiatan</th>
                               <th>Jenis Kegiatan</th>
                               <th>Kegiatan Detail</th>
                               <th>Tanggal</th>
                               <th>Jam Mulai</th>
                               <th>Jam Berakhir</th>
                            </tr>
                            </thead>
                            <tbody id="tbody_content">
                     
                            </tbody>
                        </table>
                      </tr>
                   
                   
                  </table>
                </div>
                  
                  
            </div>
            <!-- <div class="modal-footer">

                <div class="message">

                </div>
                <span class="loading loading-hide"><img src="<?= base_url('assets'); ?>/img/loading-spin-primary.svg"> <i>Loading, Generate data ... </i></span>
                <button type="submit" class="btn btn-flat btn-info  rekap" id="rekap_btn" data-stype='stay' title="save (Ctrl+s)"><i class="fa fa-save" ></i> Generate Data to Excel</button>
                <button type="button" data-dismiss="modal" class="btn btn-flat btn-default cancel-rekap" id="btn_cancel" title="cancel (Ctrl+x)"><i class="fa fa-undo" ></i> Cancel</button>
            </div> -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


