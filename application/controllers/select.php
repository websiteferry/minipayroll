<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        
    }


 function select_bagian_departemen()
 {

 	   $id_departemen = $this->input->post('id_departemen');
		
		if(trim($id_departemen) == ""){
			$data['dd_bagian_departemen'] = $this->model_app->dropdown_bagian_departemen('ea');
			$data['id_bagian_departemen'] = "";
		}else{
			$data['dd_bagian_departemen'] = $this->model_app->dropdown_bagian_departemen($id_departemen);
			$data['id_bagian_departemen'] = "";
		}
		
		$this->load->view('combo/select_bagian_departemen',$data);	

 }

function select_tunjangan()
 {

 	   $id_jabatan = $this->input->post('id_jabatan');
	   $id_pendidikan = $this->input->post('id_pendidikan');
	   $id_golongan = $this->input->post('id_golongan');
	   	
	   $cek = "select * from tunjangan where KdJabatan = '$id_jabatan'
	   			and KdPendidikan = '$id_pendidikan' and KdGolongan = '$id_golongan'";
				//echo $cek;
	   $q_cek = $this->db->query($cek);
	   if($q_cek->num_rows() > 0)
	   {
		   $row = $q_cek->row();
		   $total_tunjangan = $row->TotalTunjangan;
		    $kd_tunjangan = $row->KdTunjangan;
	   }
	   else
	   {
		   $total_tunjangan = '';
		   $kd_tunjangan = '';
	   }
		
	   ?>
       	<div id="div-order">
			<label>Total Tunjangan</label>
            <input type="text" class="form-control" name="total_tunjangan" readonly="readonly" value="<?php echo $total_tunjangan;?>">
            <input type="hidden" class="form-control" name="kd_tunjangan" value="<?php echo $kd_tunjangan;?>">
        </div>
       <?php
 }

function select_jenis()
 {
	 $cek = "select * from karyawan";
	 $q_cek = $this->db->query($cek);
	 $no=0;
	 foreach($q_cek->result() as $db)
	 {
	 	$jenis = $this->input->post('jenis_<?php echo $no;?>');
	 	if($jenis == 'sakit')
		{
			?>
            	<div id="div-order_<?php echo $no;?>">
                    <label>Total Tunjangan</label>
                    
                </div>
            <?php
		}
		$no++;
	 }
	   
 }


 function select_view_job()
 {

 	   $id_teknisi = $this->input->post('id_teknisi');
		

	    $sql = "SELECT A.progress, A.status, A.id_ticket, D.nama, A.tanggal, B.nama_sub_kategori, C.nama_kategori
                                   FROM ticket A 
                                   LEFT JOIN sub_kategori B ON B.id_sub_kategori = A.id_sub_kategori
                                   LEFT JOIN kategori C ON C.id_kategori = B.id_kategori
                                   LEFT JOIN karyawan D ON D.nik = A.reported
                                    WHERE A.id_teknisi = '$id_teknisi'";
	     $data['dataassigment'] = $this->db->query($sql);
		
		$this->load->view('combo/select_view_job',$data);	

 }

  function select_sub_kategori()
 {

 	   $id_kategori = $this->input->post('id_kategori');
		
		if(trim($id_kategori) == ""){
			$data['dd_sub_kategori'] = $this->model_app->dropdown_sub_kategori('ea');
			$data['id_sub_kategori'] = "";
		}else{
			$data['dd_sub_kategori'] = $this->model_app->dropdown_sub_kategori($id_kategori);
			$data['id_sub_kategori'] = "";
		}
		
		$this->load->view('combo/select_sub_kategori',$data);	

 }



    
}
