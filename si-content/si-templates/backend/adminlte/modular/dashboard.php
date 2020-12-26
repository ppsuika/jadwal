<section class="content-header">

      <h1>

        Dashboard

        <small>Control panel</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Dashboard</li>

      </ol>

</section>
<?php if ($this->session->flashdata('status') == true): ?>
  <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Perhatian !</h4>
        <?= $this->session->flashdata('message'); ?>
      </div>
<?php endif ?>
<section class="content">

      <div class="row">
        
         <!-- Left col -->

        <section class="col-lg-12 connectedSortable">

          <!-- Custom tabs (Charts with tabs)-->

          <div class="nav-tabs-custom">

            <!-- Tabs within a box -->

            <ul class="nav nav-tabs pull-right">

              <li class="active"><a href="#chart" data-toggle="tab">Jadwal  </a></li>

              <li><a href="#sales" data-toggle="tab">Agenda</a></li>

              <li class="pull-left header"><i class="fa fa-inbox"></i>  <?php 
                     if (get_group('group_code') == 'ADM') {
                       echo "All Program Studi";
                     } else {
                      echo "Program Studi ".get_group('group');
                     }
                      

                     ?></li>
            
            </ul>

              
            

            <div class="tab-content">

              <!-- Morris chart - Sales -->

              <div class="chart tab-pane active" id="chart" style="position: relative; ">
                <div class="row nav nav-tabs " style="padding-bottom: 10px">
                  <div class="col-md-3">
                     <button type="button" onclick="reload_ajax()" class="btn btn-sm btn-flat btn-default"><i class="fa fa-refresh"></i> Reload</button>

                     <button type="button" id="clear_date" onclick="" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-refresh"></i> Reset tanggal</button>
                  </div>
                    <div class="col-md-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggal" value="" class="form-control pull-right datepicker tanggal" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="range" value="" class="form-control pull-right datepicker range" >
                      </div>
                    </div>

                    

                   
                  </div>
                <div class="table-responsive " style="margin-top: 20px">
                  
                <table class="table table-striped table-houver container" id="list_jadwal">
                  <thead>
                    <tr>
                     
                      <th>No</th>
                      <th>Matakuliah</th>
                      <th>Smt</th>
                      <th>Dosen</th>
                      <th>Ruangan</th>
                      <th>Jml Mhs</th>
                      <th>Jam</th>
                      <th>Kehadiran</th>
                      <th>Edit Kehadiran</th>

                    </tr>
                  </thead>
                  <tbody>
                    <!-- <?php

                     $no = 1; foreach ($jadwal_prodi as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_matkul; ?></td>
                        <td><?= $row->semester; ?></td>
                        <td><?= $row->nama_dosen; ?></td>
                        <td><?= $row->nama_ruangan; ?></td>
                        <td><?= $row->jml_mahasiswa; ?></td>
                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                        <td>
                          <a 
                            href="#mymodal"
                            data-remote ="<?= base_url('admin/dashboard/show/'.$row->id) ?>"
                            data-toggle="modal"
                            data-target="#mymodal"
                            data-title ="Edit Kehadiran Dosen <?= $row->nama_dosen ?>" 
                            class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                          </a>
                          <a href="#mymodal"
                            data-remote ="<?= base_url('admin/dashboard/detail/'.$row->id) ?>"
                            data-toggle="modal"
                            data-title ="Detail Kehadiran Dosen <?= $row->nama_dosen ?>" 
                            data-target="#mymodal" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>
                          
                        </td>  
                      
                       
                      </tr>
                    <?php $no++;endforeach ?> -->
                  </tbody>
                  <tfoot>
                    
                  </tfoot>
                </table>
              </div>
              </div>

              <div class="chart tab-pane" id="sales" style="position: relative; height: 300px;">
                <div class="table-responsive ">
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr class="">
                       <th>
                        #
                       </th>
                       <th width="">Judul Kegiatan</th>
                       <th width="130px">Tanggal</th>
                       <th>Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($agenda_prodi as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->judul_kegiatan; ?></td>
                        <td><?= tgl_indo($row->tanggal).' / '.$row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                        <td><?= $row->kegiatan; ?></td>

                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

          <!-- /.nav-tabs-custom -->



      
          <!-- /.box (chat box) -->
        </section>

        <!-- /.Left col -->


        <!-- Left col -->

        

        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->


        <!-- right col -->

        <section class="col-lg-8 connectedSortable">

          <!-- Custom tabs (Charts with tabs)-->

          <div class="nav-tabs-custom">

            <!-- Tabs within a box -->

            <ul class="nav nav-tabs pull-right">

              <li class="active"><a href="#revenue-chart" data-toggle="tab">Jadwal Hari Ini</a></li>

              <li><a href="#sales-chart" data-toggle="tab">Agenda</a></li>

              <li class="pull-left header"><i class="fa fa-inbox"></i> <?= hari_ini(date("w")).', '.tgl_indo(date('Y-m-d')); ?></li>

            </ul>

            <div class="tab-content no-padding">

              <!-- Morris chart - Sales -->

              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <div class="table-responsive " style="padding-top: 10px;">
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Program Studi</th>
                      <th>Smt</th>
                      <th>Matakuliah</th>
                      <th>Dosen</th>
                      <th>Ruangan</th>
                      <th>Jml Mhs</th>
                      <th>Jam</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($jadwal as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_prodi; ?></td>
                        <td><?= $row->semester; ?></td>
                        <td><?= $row->nama_matkul; ?></td>
                        <td><?= $row->nama_dosen; ?></td>
                        <td><?= $row->nama_ruangan; ?></td>
                        <td><?= $row->jml_mahasiswa; ?></td>
                        <td><?= $row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>
              </div>

              <div class="chart tab-pane" id="sales-chart" style="position: relative; ">
                <div class="table-responsive ">
                <table class="table table-striped table-houver container" id="">
                  <thead>
                    <tr class="">
                       <th>
                        #
                       </th>
                       <th width="100px">Program Studi</th>
                       <th width="">Judul Kegiatan</th>
                       <th width="130px">Tanggal</th>
                       <th>Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($agenda as $row): ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row->nama_prodi; ?></td>
                        <td><?= $row->judul_kegiatan; ?></td>
                        <td><?= tgl_indo($row->tanggal).' / '.$row->jam_mulai.' - '.$row->jam_berakhir; ?></td>
                        <td><?= $row->kegiatan; ?></td>

                      </tr>
                    <?php $no++;endforeach ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

          <!-- /.nav-tabs-custom -->



      
          <!-- /.box (chat box) -->
        </section>

      </div>
</section>

<script>
  jQuery(document).ready(function($) {
    $('#table').DataTable({

      "paging": false,

      "lengthChange": false,

      "searching": false,

      "ordering": true,

      "info": false,

      "autoWidth": false

    });
     $('.timepicker').datetimepicker({

           format: 'HH:mm'

  });

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
  
  var dates = $('.datepicker').datepicker({

      autoclose: true,
      format: 'yyyy-mm-dd'

  });

  dates.datepicker().on('changeDate', function (ev) {
    var data = $('.tanggal').serializeArray();
    var range = $('.range').val();
     data.push({
      name : 'range',
      value : range
    });

     $('#clear_date').on('click', function(){
      $('.datepicker').datepicker('setDate', null);
      $('.periode').val('');
      reload_ajax()
    });
    var dataObj= {};
     $(data).each(function(i, field){
      dataObj[field.name] = field.value;
    });
     

     var tanggal = $('.tanggal').val();
     var tanggal_range = $('.range').val();
     var periode = $('.periode').val();
     let src = '<?= base_url("admin/dashboard/getJadwal") ?>';
      if(tanggal != null && range == null && periode == null) {
        url = '<?= base_url("admin/dashboard/getJadwal/") ?>'+tanggal;
     } else if(range != null && tanggal == null && periode == null){
        url = '<?= base_url("admin/dashboard/getJadwal/null/") ?>'+range
     } else if (tanggal != null && tanggal_range != null && periode == null) {
       url = '<?= base_url("admin/dashboard/getJadwal/") ?>'+tanggal+'/'+range;
     } else if (tanggal != null && tanggal_range != null && periode != null) {
     url = '<?= base_url("admin/dashboard/getJadwal/") ?>'+tanggal+'/'+range+''+periode;
     } else if (periode != null && tanggal_range == null && tanggal == null){
        url = '<?= base_url("admin/dashboard/getJadwal/null/null/") ?>'+periode;
     }
     console.log(tanggal_range+' - '+periode);
     table.ajax.url(url).load();
  });

  table = $("#list_jadwal").DataTable({
    initComplete: function() {
      var api = this.api();
      $("#list_jadwal_filter input")
        .off(".DT")
        .on("keyup.DT", function(e) {
          api.search(this.value).draw();
        });
    },
    paging:   false,
    info:     false,
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
      url: BASE_URL + "admin/dashboard/getJadwal",
      type: "POST"
      //data: csrf
    },
    columns: [
      {
        data: "id",
        orderable: false,
        searchable: false
      },
      { data: "nama_matkul"  },
      { data: "semester" },
      { data: "nama_dosen" },
      { data: "nama_ruangan" },
      { data: "jml_mahasiswa" },
      { data: {
          jam_mulai : 'jam_mulai',
        },
        orderable: false,
        searchable: false,
        render: function(data, type, row, meta) {
          return `<span class="badge badge-pill badge-info">${data.jam_mulai } s/d ${data.jam_berakhir}</span>`;
          
        },
        width:100
      },
      { data: {
              jam_masuk:'jam_masuk', 
              jam_keluar:'jam_keluar'
              },
        orderable: false,
        searchable: false,
        render : function(data, type, row, meta) {
          
              return `<span class="badge badge-pill bg-green">Jam Masuk :  ${data.jam_masuk } | Keluar  : ${data.jam_keluar}</span>`;
          
        }  
      },

    ],
    columnDefs: [
       {
        searchable: false,
        targets: 8,
        data: "id",
        render: function(data, type, row, meta) {
          return `<div class="text-center">
                  <a href="#mymodal"
                    title ="EDIT DETAIL JADWAL"
                    data-remote ="<?= base_url('admin/dashboard/zoom/') ?>${data}"
                    data-toggle="modal"
                    data-title ="Detail Kehadiran Dosen - Masukkan Link Rekaman Zoom" 
                    data-target="#mymodal" class="btn btn-xs btn-primary btn-sm"><i class="fa fa-cog"></i> </a>

                  <a  href="#mymodal" title="EDIT KEHADIRAN" class="btn btn-xs btn-warning" data-remote ="<?= base_url('admin/dashboard/show/') ?>${data}" data-toggle="modal" data-target="#mymodal"  data-target="#mymodal">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="#mymodal"
                    title ="DETAIL JADWAL"
                    data-remote ="<?= base_url('admin/dashboard/detail/') ?>${data}"
                    data-toggle="modal"
                    data-title ="Detail Kehadiran Dosen" 
                    data-target="#mymodal" class="btn btn-xs btn-info btn-sm"><i class="fa fa-eye"></i> </a>
                </div>
                `;
        }
      },
      // {
      //   searchable: false,
      //   targets: 7,
      //   data: "id",
      //   render: function(data, type, row, meta) {
      //     return `<a 
      //               href="#mymodal"
      //               data-remote ="<?= base_url('admin/dashboard/show/') ?>${data}"
      //               data-toggle="modal"
      //               data-target="#mymodal"
      //               data-title ="Edit Kehadiran Dosen " 
      //               class="btn btn-warning btn-sm">
      //                   <i class="fa fa-pencil"></i>
      //             </a>
      //             <a href="#mymodal"
      //               data-remote ="<?= base_url('admin/dashboard/detail/') ?>${data}"
      //               data-toggle="modal"
      //               data-title ="Detail Kehadiran Dosen" 
      //               data-target="#mymodal" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </a>`;
      //   }
      // },

    ],
    order: [[1, "dsc"]],
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
    .appendTo("#list_jadwal_wrapper .col-md-6:eq(0)");

  $(".select_all").on("click", function() {
    if (this.checked) {
      $(".check").each(function() {
        this.checked = true;
        $(".select_all").prop("checked", true);
      });
    } else {
      $(".check").each(function() {
        this.checked = false;
        $(".select_all").prop("checked", false);
      });
    }
  });

  $(document).on('change', '.datepicker', function(event) {
    event.preventDefault();
    let tanggal =  $('.tanggal').val();
    let range =  $('.range').val();

  });

  $('#prodi_filter').on('change', function(){
    let id_prodi = $(this).val();
    let src = '<?=base_url()?>admin/mahasiswa/ajax';
    let url;


    if(id_prodi !== 'all'){
      let src2 = src + '/' + id_prodi;
      url = $(this).prop('checked') === true ? src : src2;
    }else{
      url = src;
    }

    table.ajax.url(url).load();
  });

   
  // $(document).ready(function() {
  //   //set initial state.
  //     $('.minimal-red').val(this.checked);
  //     console.log($("input[type='checkbox']").val());
  //     $('.minimal-red').change(function() {
  //         if(this.checked) {
  //            var form_checked = $('#form_checked');
  //             var data_post = form_checked.serializeArray();
  //            $.ajax({
  //              url: '<?= base_url('admin/dashboard/update_kehadiran') ?>',
  //              type: 'POST',
  //              dataType: 'JSON',
  //              data: data_post,
  //            })
  //            .done( (res) {
  //              console.log(res.message);
  //            })
             
             
  //         }
  //         $('.minimal-red').val(this.checked);        
  //     });

    $('.btn_kehadiran').click(function() {
      var id = $(this).attr('data-id');
      $("#sesi_kuliah").empty();
      $('#modal_form').modal('show');
      $.ajax({
        url: '<?= base_url('admin/dashboard/sesis_kehadiran'); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {id: id},
      })
      .done(function(res) {
        $.each(function(row, index) {
          console.log(row.nama_prodi)
        });
        
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
      $('[name=form_kehadiran_id]').val(id);
    });  

    $(document).on('click', '.simpan_url', function(event) {
      event.preventDefault();
      /* Act on the event */
      console.log("OK");
       var form_user = $('#form_url');
      var data_post = form_user.serializeArray();
      $.ajax({
        url: '<?= base_url('admin/dashboard/save_url'); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: data_post,
      })
      .done(function(res) {
        if (res.success == true ) {
             $('#mymodal').modal('hide');
              toastr['success'](res.message);
             
          } else {
            $('#mymodal').modal('hide');
              toastr['success'](res.message);
          }
        
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    });


     $(document).on('click', '.simpan_jam', function(event) {
      event.preventDefault();
      /* Act on the event */
    
       var form_user = $('#form_update_kehadiran');
      var data_post = form_user.serializeArray();


      $.ajax({
        url: '<?= base_url('admin/dashboard/save_jam'); ?>',
        type: 'POST',
        dataType: 'JSON',
        data: data_post,
      })
      .done(function(res) {

        if (res.success == true ) {
             $('#mymodal').modal('hide');
              toastr['success'](res.message);
             reload_ajax()
          } else {
            $('#mymodal').modal('hide');
              toastr['success'](res.message);
              reload_ajax()
          }
        
      })
      .fail(function() {
        toastr['danger'](res.message);
      })
      .always(function() {
        toastr['success'](res.message);
      });
    });
  

    $(document).on('change', 'input.switch-button', function() {
        var id = $('[name=form_kehadiran_id]').val();
        var form_blog = $('#form');
        var data_post = form_blog.serializeArray();
        data_post.push({
              name: 'id',
              value: id
          });

        

        // var val = [];
        // $(':checkbox:checked').each(function(i){
        //   val[i] = $(this).val();
        //     val.push({
        //       name: 'id',
        //       value: id
        //   });
        // });

        $.ajax({
                url: BASE_URL + '/admin/dashboard/update_kehadiran',
                type: 'POST',
                dataType: 'JSON',
                data: data_post,
            })
            .done(function(res) {
                toastr['success'](res.message);
                $('.btn_kehadiran').hide();   
                $('.closed').show();

            })
            .fail(function() {
                toastr['error']('Error update status');
            });
    });

    
 jQuery(document).ready(function(e) {

  $('body').on('hidden.bs.modal', '.modal', function () {
    $(this).removeData('bs.modal');
  });


    $('#myModal').on('show.bs.modal', function () {
        var button = $(e.relatedTarget);
        var modal = $(this);
        modal.find('.modal-content').load(button.data("remote"));
        modal.find('.modal-title').tex(button.data("title"));
        
    });

    // $('#modalDetail').on('show.bs.modal', function () {
    //     var button = $(e.relatedTarget);
    //     var modal = $(this);
    //     modal.find('.modal-detail').load(button.data("remote"));
    // });

    $(document).on('change', '#sesi_kuliah', function(e) {
      e.preventDefault();
      var data_sesi = $('select#sesi_kuliah').val();
      var id = $('[name=form_kehadiran_id]').val();
      var form_blog = $('#form');
      var data_post = form_blog.serializeArray();
      data_post.push({
            name: 'id',
            value: id
        });
      $('.loading').show();
      $.ajax({
          url: BASE_URL + '/admin/dashboard/update_kehadiran',
          type: 'POST',
          dataType: 'JSON',
          data: data_post,
      })
      .done(function(res) {
         $('.loading').hide();
         $('#myModal').modal('hide');
          toastr['success'](res.message);
          reload_ajax();
      })
      .fail(function() {
          toastr['error']('Error update status');
      });
      
      
    });
});

   });
</script>

<div class="modal fade" id="mymodal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <i class="fa fa-spinner fa-spin"></i>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="modalDetail" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-detail">
        <i class="fa fa-spinner fa-spin"></i>
        </div>
    </div>
</div> -->
