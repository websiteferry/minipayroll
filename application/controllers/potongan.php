<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller {

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


 function potongan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/potongan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
        $data['link'] = "potongan/hapus";

        $datapotongan = $this->model_app->datapotongan();
	    $data['datapotongan'] = $datapotongan;
        

        $this->load->view('template', $data);

 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('KdPotongan', $id);
 	$this->db->delete('potongan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_potongan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
	    $data['url'] = "potongan/save";
		$data['flag'] = 'add';	
		$data['kd_potongan'] = "";		
		$data['jenis_potongan'] = "";
        $data['total_potongan'] = "";
        
        $this->load->view('template', $data);

 }

 function save()
 {

 	$jenis_potongan = strtoupper(trim($this->input->post('jenis_potongan')));
	$total_potongan = strtoupper(trim($this->input->post('total_potongan')));
	$get_kode_potongan = $this->model_app->getKodePotongan();
	$data['KdPotongan']= $get_kode_potongan;
 	$data['JenisPotongan'] = $jenis_potongan;
	$data['TotalPotongan'] = $total_potongan;

	$sql = "Select JenisPotongan From Potongan where JenisPotongan =  '$jenis_potongan'";
	$row = $this->db->query($sql)->row();
	// print_r($row);

	if ($row->JenisPotongan ==  $jenis_potongan)
	{
		$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
	    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Jenis Potongan sudah terdaftar.
	    </div>");
		redirect('potongan/potongan_list');
	}
	else
	{
		$this->db->trans_start();

 		$this->db->insert('potongan', $data);

 		$this->db->trans_complete();

	 	if ($this->db->trans_status() === FALSE)
		{
			$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
		    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
		    </div>");
			redirect('potongan/potongan_list');	
		} 
		else 
		{
			$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
		    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
		    </div>");
			redirect('potongan/potongan_list');	
		}	
	}
	
 	
		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_potongan";

        $id = trim($this->session->userdata('id_user'));
		$KdPotongan = $this->uri->segment(3);
        //notification 

        $sql = "SELECT * FROM Potongan WHERE KdPotongan = '$KdPotongan'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "potongan/update";
		$data['flag'] = 'edit';
		$data['kd_potongan'] = $row->KdPotongan;		
		$data['jenis_potongan'] = $row->JenisPotongan;
		$data['total_potongan'] = $row->TotalPotongan;
 

        $this->load->view('template', $data);

 }

 function update()
 {

 	$kd_potongan = strtoupper(trim($this->input->post('kd_potongan')));
 	$jenis_potongan = strtoupper(trim($this->input->post('jenis_potongan')));
 	$total_potongan = strtoupper(trim($this->input->post('total_potongan')));

 	$data['JenisPotongan'] = $jenis_potongan;
	$data['TotalPotongan'] = $total_potongan;

 	$this->db->trans_start();

 	$this->db->where('KdPotongan', $kd_potongan);
 	$this->db->update('potongan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('potongan/potongan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data Behasil DiUpdate.
			    </div>");
				redirect('potongan/potongan_list');	
			}

 }



    
}
