<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {

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


 function golongan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/golongan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
        $data['link'] = "golongan/hapus";

        $datagolongan = $this->model_app->datagolongan();
	    $data['datagolongan'] = $datagolongan;
        

        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('KdGolongan', $id);
 	$this->db->delete('golongan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_golongan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
	    $data['url'] = "golongan/save";
		$data['flag'] = 'add';	
		$data['kd_golongan'] = "";		
		$data['nm_golongan'] = "";
        
        $this->load->view('template', $data);

 }

 function save()
 {

 	$nm_golongan = strtoupper(trim($this->input->post('nm_golongan')));
	$get_kode_golongan = $this->model_app->getKodeGolongan();
	$data['KdGolongan']= $get_kode_golongan;
 	$data['NmGolongan'] = $nm_golongan;
	
 	$this->db->trans_start();

 	$this->db->insert('golongan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('golongan/golongan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('golongan/golongan_list');	
			}
		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_golongan";

        $id = trim($this->session->userdata('id_user'));
		$KdGolongan = $this->uri->segment(3);
        //notification 

        $sql = "SELECT * FROM golongan WHERE KdGolongan = '$KdGolongan'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "golongan/update";
		$data['flag'] = 'edit';
		$data['kd_golongan'] = $row->KdGolongan;		
		$data['nm_golongan'] = $row->NmGolongan;
		$this->load->view('template', $data);

 }

 function update()
 {

 	$kd_golongan = strtoupper(trim($this->input->post('kd_golongan')));
 	$nm_golongan= strtoupper(trim($this->input->post('nm_golongan')));

 	$data['NmGolongan'] = $nm_golongan;
 	$this->db->trans_start();

 	$this->db->where('KdGolongan', $kd_golongan);
 	$this->db->update('golongan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('golongan/golongan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data Behasil DiUpdate.
			    </div>");
				redirect('golongan/golongan_list');	
			}

 }



    
}
