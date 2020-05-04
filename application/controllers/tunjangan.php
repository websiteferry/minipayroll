<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tunjangan extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');


        /*if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
        */
        
    }


 function tunjangan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/tunjangan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
        $data['link'] = "tunjangan/hapus";

        $datatunjangan = $this->model_app->datatunjangan();
	    $data['datatunjangan'] = $datatunjangan;
        

        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('KdTunjangan', $id);
 	$this->db->delete('tunjangan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_tunjangan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));
		$sql_jabatan = "select * from jabatan";
		$data['jabatan'] = $this->db->query($sql_jabatan);
		$sql_pendidikan = "select * from pendidikan";
		$data['pendidikan'] = $this->db->query($sql_pendidikan);
		$sql_golongan = "select * from golongan";
		$data['golongan'] = $this->db->query($sql_golongan);
        
	    $data['url'] = "tunjangan/save";
		$data['flag'] = 'add';	
		$data['kd_tunjangan'] = "";		
		$data['kd_jabatan'] = "";
		$data['kd_pendidikan'] = "";
        $data['kd_golongan'] = "";
		$data['total_tunjangan'] = "";
        $this->load->view('template', $data);

 }

 function save()
 {

 	$total_tunjangan = strtoupper(trim($this->input->post('total_tunjangan')));
	$kd_jabatan = strtoupper(trim($this->input->post('kd_jabatan')));
	$kd_golongan = strtoupper(trim($this->input->post('kd_golongan')));
	$kd_pendidikan = strtoupper(trim($this->input->post('kd_pendidikan')));
	$get_kode_tunjangan = $this->model_app->getKodeTunjangan();
	$data['KdTunjangan']= $get_kode_tunjangan;
 	$data['TotalTunjangan'] = $total_tunjangan;
	$data['KdJabatan'] = $kd_jabatan;
	$data['KdGolongan'] = $kd_golongan;
	$data['KdPendidikan'] = $kd_pendidikan;	
	
 	$this->db->trans_start();

 	$this->db->insert('tunjangan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('tunjangan/tunjangan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('tunjangan/tunjangan_list');	
			}
		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_tunjangan";

        $id = trim($this->session->userdata('id_user'));
		$KdTunjangan = $this->uri->segment(3);
        //notification 

        $sql = "Select A.KdTunjangan,B.KdJabatan,B.NmJabatan,C.KdPendidikan,C.NmPendidikan,D.KdGolongan,D.NmGolongan
				,A.TotalTunjangan
				from tunjangan A
				LEFT JOIN jabatan B ON B.KdJabatan = A.KdJabatan
				LEFT JOIN pendidikan C on C.KdPendidikan = A.KdPendidikan
				LEFT JOIN golongan D on D.KdGolongan = A.KdGolongan 
				where A.KdTunjangan = '$KdTunjangan'";
		$row = $this->db->query($sql)->row();
		$sql_jabatan = "select * from jabatan";
		$data['jabatan'] = $this->db->query($sql_jabatan);
		$sql_pendidikan = "select * from pendidikan";
		$data['pendidikan'] = $this->db->query($sql_pendidikan);
		$sql_golongan = "select * from golongan";
		$data['golongan'] = $this->db->query($sql_golongan);
		$data['url'] = "tunjangan/update";
		$data['flag'] = 'edit';
		$data['kd_tunjangan'] = $row->KdTunjangan;		
		$data['kd_jabatan'] = $row->KdJabatan;		
		$data['nm_jabatan'] = $row->NmJabatan;		
		$data['kd_pendidikan'] = $row->KdPendidikan;		
		$data['nm_pendidikan'] = $row->NmPendidikan;		
		$data['kd_golongan'] = $row->KdGolongan;
		$data['nm_golongan'] = $row->NmGolongan;		
		$data['total_tunjangan'] = $row->TotalTunjangan;		
		
		$this->load->view('template', $data);

 }

 function update()
 {

 	$kd_tunjangan = strtoupper(trim($this->input->post('kd_tunjangan')));
 	$kd_jabatan = strtoupper(trim($this->input->post('kd_jabatan')));
	$kd_pendidikan = strtoupper(trim($this->input->post('kd_pendidikan')));
	$kd_golongan = strtoupper(trim($this->input->post('kd_golongan')));
	$total_tunjangan= strtoupper(trim($this->input->post('total_tunjangan')));

 	$data['KdJabatan'] = $kd_jabatan;
	$data['KdGolongan'] = $kd_golongan;
	$data['KdPendidikan'] = $kd_pendidikan;
	$data['TotalTunjangan'] = $total_tunjangan;
 	$this->db->trans_start();

 	$this->db->where('KdTunjangan', $kd_tunjangan);
	$this->db->update('tunjangan', $data);
	
 	$this->db->trans_complete();
	//echo $total_tunjangan;
 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('tunjangan/tunjangan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data Behasil DiUpdate.
			    </div>");
				redirect('tunjangan/tunjangan_list');	
			}

 }



    
}
