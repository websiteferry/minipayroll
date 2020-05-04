<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

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


 function jabatan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/jabatan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
        $data['link'] = "jabatan/hapus";

        $datajabatan = $this->model_app->datajabatan();
	    $data['datajabatan'] = $datajabatan;
        

        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('KdJabatan', $id);
 	$this->db->delete('jabatan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_jabatan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
	    $data['url'] = "jabatan/save";
		$data['flag'] = 'add';	
		$data['kd_jabatan'] = "";		
		$data['nm_jabatan'] = "";
        

        $this->load->view('template', $data);

 }

 function save()
 {

 	$nama_jabatan = strtoupper(trim($this->input->post('nm_jabatan')));
	$get_kode_jabatan = $this->model_app->getKodeJabatan();
	$data['KdJabatan']= $get_kode_jabatan;
 	$data['NmJabatan'] = $nama_jabatan;

 	$this->db->trans_start();

 	$this->db->insert('jabatan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('jabatan/jabatan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('jabatan/jabatan_list');	
			}
		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_jabatan";

        $id = trim($this->session->userdata('id_user'));
		$KdJabatan = $this->uri->segment(3);
        //notification 

        $sql = "SELECT * FROM jabatan WHERE KdJabatan = '$KdJabatan'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "jabatan/update";
		$data['flag'] = 'edit';
		$data['kd_jabatan'] = $row->KdJabatan;		
		$data['nm_jabatan'] = $row->NmJabatan;
 

        $this->load->view('template', $data);

 }

 function update()
 {

 	$id_jabatan = strtoupper(trim($this->input->post('kd_jabatan')));
 	$nama_jabatan = strtoupper(trim($this->input->post('nm_jabatan')));

 	$data['NmJabatan'] = $nama_jabatan;

 	$this->db->trans_start();

 	$this->db->where('KdJabatan', $id_jabatan);
 	$this->db->update('jabatan', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('jabatan/jabatan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data Behasil DiUpdate.
			    </div>");
				redirect('jabatan/jabatan_list');	
			}

 }



    
}
