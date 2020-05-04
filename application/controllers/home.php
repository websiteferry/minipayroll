<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('model_app');

        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
        


        
        
    }

    
function index()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/dashboard";

		$tgl = date('Y-m-d');
		$karyawan = "SELECT COUNT(KdKaryawan) AS jml_karyawan FROM karyawan ";
        $row_karyawan = $this->db->query($karyawan)->row();
		
        $karyawan_hadir = "SELECT COUNT(KdKaryawan) AS jml_karyawan_hadir FROM detail_absensi where Hadir != '' and TglAbsen = '$tgl'";
        $row_karyawan_hadir = $this->db->query($karyawan_hadir)->row();

        $karyawan_sakit = "SELECT COUNT(KdKaryawan) AS jml_karyawan_sakit FROM detail_absensi where Sakit != '' and TglAbsen = '$tgl'";
        $row_karyawan_sakit = $this->db->query($karyawan_sakit)->row();
		
        $karyawan_libur = "SELECT COUNT(KdKaryawan) AS jml_karyawan_libur FROM detail_absensi where Alpa != '' and TglAbsen = '$tgl'";
        $row_karyawan_libur = $this->db->query($karyawan_libur)->row();
		
		$data['jml_karyawan'] = $row_karyawan->jml_karyawan;
        $data['jml_karyawan_hadir'] = $row_karyawan_hadir->jml_karyawan_hadir;
        $data['jml_karyawan_sakit'] = $row_karyawan_sakit->jml_karyawan_sakit;
        $data['jml_karyawan_libur'] = $row_karyawan_libur->jml_karyawan_libur;
       
       
        $this->load->view('template', $data);
    }

    
}
