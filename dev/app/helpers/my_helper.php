<?php 

function cmb_dinamis($name,$table,$field,$pk,$selected, $type = false){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control $type' style='width:100%'>";
    $cmb .= "<option></option>";
    $data = $ci->db->get($table)->result();

   
    foreach ($data as $d){

        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function get_group($name)
{
    $ci = get_instance();
    $group = $ci->session->userdata('group');
    $ci->db->where('group_id', $group);
    $data = $ci->db->get('si_group')->result();
    foreach ($data as $row) {
        return $row->$name;
    }
}

function get_name_dosen($id)
{
    $ci = get_instance();
    $ci->db->where('id', $id);
    $data = $ci->db->get('ci_dosen')->result();
    foreach ($data as $row) {
        return $row->nama_dosen;
    }
}

function get_count($table, $value, $where)
{
  $ci =& get_instance();
  $ci->db->where($where);
  $data = $ci->db->get($table)->result();
  foreach ($data as $row) {
    return $row->$value;
  }
  
}


function get_data($table, $where)
{
  $ci =& get_instance();
  $ci->db->where($where);
  $data = $ci->db->get($table)->result();
  foreach ($data as $row) {
    return $row;
  }
  
}


function hari_ini($hari)

{

    $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");

    //$hari     = date("w");

    return $hari_ini = $seminggu[$hari]; // konversi menjadi hari bahasa indonesia



    $tgl_sekarang = date("Ymd");

    $thn_sekarang = date("Y");

    $jam_sekarang = date("H:i:s");



}







// format penanggalan di database MySQL

$tanggal=date("Y-m-d"); 



// fungsi untuk mengubah tanggal menjadi format bahasa indonesia, contoh: 14 Maret 2014 

function tgl_indo($tgl){

    $tanggal = substr($tgl,8,2);

    $bulan   = ambilbulan(substr($tgl,5,2)); // konversi menjadi nama bulan bahasa indonesia

    $tahun   = substr($tgl,0,4);

    return $tanggal.' '.$bulan.' '.$tahun;       

}   



// fungsi untuk mengubah angka bulan menjadi nama bulan

function ambilbulan($bln){

  if ($bln=="01") return "Januari";

  elseif ($bln=="02") return "Februari";

  elseif ($bln=="03") return "Maret";

  elseif ($bln=="04") return "April";

  elseif ($bln=="05") return "Mei";

  elseif ($bln=="06") return "Juni";

  elseif ($bln=="07") return "Juli";

  elseif ($bln=="08") return "Agustus";

  elseif ($bln=="09") return "September";

  elseif ($bln=="10") return "Oktober";

  elseif ($bln=="11") return "November";

  elseif ($bln=="12") return "Desember";

} 



// fungsi untuk mengubah susunan format tanggal

function ubah_tgl($tanggal) { 

   $pisah   = explode('/',$tanggal);

   $larik   = array($pisah[2],$pisah[1],$pisah[0]);

   $satukan = implode('-',$larik);

   return $satukan;

}



function ubah_tgl2($tanggal) { 

   $pisah   = explode('-',$tanggal);

   $larik   = array($pisah[2],$pisah[1],$pisah[0]);

   $satukan = implode('/',$larik);

   return $satukan;

}