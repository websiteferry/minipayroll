<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        
    }

    
function index()
    {
        $data = "";

        $this->load->view('login', $data);
    }


  function login_akses()
  {

  	$username = trim($this->input->post('username'));
  	$password = trim($this->input->post('password'));
  	
	$akses = $this->db->query("select * from user A
	 WHERE A.username = '$username' AND A.password = '$password'");

    if($akses->num_rows() == 1)
	{
	
	foreach($akses->result_array() as $data)
	{

	$session['id_user'] = $data['username'];
	$session['nama'] = $data['nama'];
	//$session['level'] = $data['level'];
	//$session['id_jabatan'] = $data['id_jabatan'];
	
	$this->session->set_userdata($session);
    redirect('home');
	}
	
	}
	else
	{
		$this->session->set_flashdata('msg', '<div class="alert bg-danger" role="alert"><b><font color="red"> Username dan Password Salah!</b></font </div>');
					redirect('login');

	// $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
	// 		    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	// 		    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> username / Password salah.
	// 		    </div>");
	// redirect('login');
	}

	
  }


  public function logout() {

  $this->session->sess_destroy();

  redirect('login');
    


}


    
}
