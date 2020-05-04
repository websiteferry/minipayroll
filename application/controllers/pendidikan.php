<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

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


 function pendidikan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/pendidikan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
        $data['link'] = "pendidikan/hapus";

        $datapendidikan = $this->model_app->datapendidikan();
	    $data['datapendidikan'] = $datapendidikan;
        

        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('KdPendidikan', $id);
 	$this->db->delete('pendidikan');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_pendidikan";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
	    $data['url'] = "pendidikan/save";
		$data['flag'] = 'add';	
		$data['kd_pendidikan'] = "";		
		$data['nm_pendidikan'] = "";
        

        $this->load->view('template', $data);

 }

 function save()
 {

 	$nama_pendidikan = strtoupper(trim($this->input->post('nm_pendidikan')));
	$get_kode_pendidikan = $this->model_app->getKodePendidikan();
	$data['KdPendidikan']= $get_kode_pendidikan;
 	$data['NmPendidikan'] = $nama_pendidikan;

 	$this->db->trans_start();

 	$this->db->insert('pendidikan', $data);

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
				redirect('pendidikan/pendidikan_list');	
			}
		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_pendidikan";

        $id = trim($this->session->userdata('id_user'));
		$KdPendidikan = $this->uri->segment(3);
        //notification 

        $sql = "SELECT * FROM pendidikan WHERE KdPendidikan = '$KdPendidikan'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "pendidikan/update";
		$data['flag'] = 'edit';
		$data['kd_pendidikan'] = $row->KdPendidikan;		
		$data['nm_pendidikan'] = $row->NmPendidikan;
 

        $this->load->view('template', $data);

 }

 function update()
 {

 	$kd_pendidikan = strtoupper(trim($this->input->post('kd_pendidikan')));
 	$nm_pendidikan = strtoupper(trim($this->input->post('nm_pendidikan')));

 	$data['NmPendidikan'] = $nm_pendidikan;

 	$this->db->trans_start();

 	$this->db->where('KdPendidikan', $kd_pendidikan);
 	$this->db->update('pendidikan', $data);

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
				redirect('pendidikan/pendidikan_list');	
			}

 }



    
}
