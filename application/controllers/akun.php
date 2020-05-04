<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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

function login()
    {
        $data = "";

        $this->load->view('login', $data);
    }






 function akun_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/akun_list";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));
		//echo $id;
        
        $data['link'] = "akun/hapus";

        $dataakun= $this->model_app->data_akun();
	    $data['dataakun'] = $dataakun;
        

        $this->load->view('template', $data);

 }

  function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('Id', $id);
 	$this->db->delete('user');

 	$this->db->trans_complete();
	
 }

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_akun1";

        $id_dept = trim($this->session->userdata('id_dept'));
        $id = trim($this->session->userdata('id_user'));

        
	    $data['url'] = "akun/save";
		$data['flag'] = 'add';
		$data['id'] = "";	
		$data['username'] = "";		
		$data['password'] = "";
        $data['nama'] = "";
		
        

        $this->load->view('template', $data);

 }

 function save()
 {
   
 	$username = strtoupper(trim($this->input->post('username')));
	$password = strtoupper(trim($this->input->post('password')));
	$nama = strtoupper(trim($this->input->post('nama')));
	$data['username']= $username;
 	$data['password'] = $password;
	$data['nama'] = $nama;
	$cek = "select * from user where username = '$username'";
	$q_cek = $this->db->query($cek);
 	$this->db->trans_start();
	if($q_cek->num_rows() > 0)
	{
 		?>
        	<script>
				alert('USERNAME SUDAH ADA');
				document.location = '<?php echo base_url();?>akun/add';
			</script>
        <?php
	}
	else
	{
		$this->db->insert('user', $data);
	}
 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('akun/akun_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('akun/akun_list');	
			}
		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_akun1";

        $id = trim($this->session->userdata('id_user'));
		$id = $this->uri->segment(3);
        //notification 

        $sql = "SELECT * FROM user WHERE Id = '$id'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "akun/update";
		$data['flag'] = 'edit';
		$data['username'] = $row->username;
		$data['nama'] = $row->nama;		
		$data['password'] = $row->password;
 		$data['id'] = $id;

        $this->load->view('template', $data);

			

 }


 function update()
 {

 	$id= strtoupper(trim($this->input->post('id')));
 	$nama= $this->input->post('nama');
	$username= $this->input->post('username');
	$password= $this->input->post('password');

 	$data['nama'] = $nama;
	$data['username'] = $username;
	$data['password'] = $password;

 	$this->db->trans_start();

 	$this->db->where('Id', $id);
 	$this->db->update('user', $data);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'>
			    <use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('akun/akun_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
					<center>Data berhasil di update silahkan login kembali.</center>
					<a href='login' class='btn btn-primary'><login>Klik tombol login ini!</a>

			    </div>");
				redirect('akun/akun_list');	
			}

 }
			


    
}
