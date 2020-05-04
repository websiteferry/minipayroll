<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_Absensi extends CI_Controller {

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


function lap_absensi_list()
 {
		$tgl_awal = date('Y-m-d',strtotime($this->input->post('tgl_awal')));
		$tgl_akhir = date('Y-m-d',strtotime($this->input->post('tgl_akhir')));
		
 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/lap_absensi_list";

        $sql = "select A.KdKaryawan,A.NmKaryawan,A.KdJabatan,B.NmJabatan,A.KdGolongan,A.KdPendidikan
				,C.TotalTunjangan,A.GajiPokok,D.Sakit,D.Hadir,D.Alpa,D.TglAbsen
				from karyawan A
				LEFT JOIN jabatan B on B.KdJabatan = A.KdJabatan
				left join tunjangan C on C.KdJabatan=A.KdJabatan and C.KdGolongan=A.KdGolongan
				and C.KdPendidikan=A.KdPendidikan
                left join detail_absensi D on D.KdKaryawan=A.KdKaryawan
				where TglAbsen between '$tgl_awal' and '$tgl_akhir' order by d.tglabsen";
        $data['detail_absensi'] = $this->db->query($sql);
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
        $potongan_sakit = "select COUNT(Sakit) as sakit from detail_absensi where TglAbsen between '$tgl_awal' and '$tgl_akhir' and Sakit <> ''";
		$row_sakit = $this->db->query($potongan_sakit)->row();
		$data['sakit'] = $row_sakit->sakit;
		
		$potongan_hadir = "select COUNT(Hadir) as hadir from detail_absensi where TglAbsen between '$tgl_awal' and '$tgl_akhir' and Hadir <> ''";
		//echo $potongan_hadir;
		$row_hadir = $this->db->query($potongan_hadir)->row();
		$data['hadir'] = $row_hadir->hadir;
		
		$potongan_alpaa = "select COUNT(Alpa) as alpaa from detail_absensi where TglAbsen between '$tgl_awal' and '$tgl_akhir' and Alpa <> ''";
		$row_alpaa = $this->db->query($potongan_alpaa)->row();
		$data['alpa'] = $row_alpaa->alpaa;
		
		
		
		$this->load->view('template', $data);

 }
 

 function periode_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/lap_absensi";

        $data['url'] = "lap_absensi/lap_absensi_list";
		$this->load->view('template', $data);

 }

 function save()
 {
	$kd_karyawan = $this->input->post('kd_karyawan');
	$tgl = $this->input->post('tgl_absensi');
	//echo $tgl;
	$no = 1;
	for($i=0; $i<count($kd_karyawan); $i++)
	{
		$jenis_absensi = $this->input->post('jenis_absensi_'.$no);
		if($jenis_absensi != '')
		{
			if($jenis_absensi == 'hadir')
			{
				$insert = "insert into detail_absensi(KdKaryawan,Hadir,TglAbsen)
							values('$kd_karyawan[$i]','1','$tgl')";
				$this->db->query($insert);
			}
			else if($jenis_absensi == 'sakit')
			{
				$insert = "insert into detail_absensi(KdKaryawan,Sakit,TglAbsen)
							values('$kd_karyawan[$i]','1','$tgl')";
				$this->db->query($insert);
			}
			else
			{
				$insert = "insert into detail_absensi(KdKaryawan,Alpa,TglAbsen)
							values('$kd_karyawan[$i]','1','$tgl')";
				$this->db->query($insert);
			}
			
		}
	   $no++;
	}
	redirect('absensi/periode_absensi');		
 }


 function edit()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_karyawan";

        $id = trim($this->session->userdata('id_user'));
		$KdKaryawan= $this->uri->segment(3);
        //notification 

        $sql = "Select A.*,B.NmJabatan,C.NmPendidikan,D.NmGolongan,E.KdTunjangan,E.TotalTunjangan
								from karyawan A
								left join jabatan B on B.KdJabatan=A.KdJabatan
								left join pendidikan C on C.KdPendidikan=A.KdPendidikan
								Left Join Golongan D on D.KdGolongan = A.KdGolongan
								Left join tunjangan E on E.KdTunjangan = A.KdTunjangan
				where A.KdKaryawan = '$KdKaryawan'";
		$row = $this->db->query($sql)->row();
		$sql_jabatan = "select * from jabatan";
		$data['jabatan'] = $this->db->query($sql_jabatan);
		$sql_pendidikan = "select * from pendidikan";
		$data['pendidikan'] = $this->db->query($sql_pendidikan);
		$sql_golongan = "select * from golongan";
		$data['golongan'] = $this->db->query($sql_golongan);
		$data['url'] = "karyawan/update";
		$data['flag'] = 'edit';
		$data['kd_tunjangan'] = $row->KdTunjangan;		
		$data['kd_jabatan'] = $row->KdJabatan;
		$data['kd_karyawan'] = $row->KdKaryawan;
		$data['total_tunjangan'] = $row->TotalTunjangan;
		$data['kd_pendidikan'] = $row->KdPendidikan;
        $data['kd_golongan'] =$row->KdGolongan;
		$data['nm_karyawan'] = $row->NmKaryawan;
		$data['no_hp'] = $row->NoHp;
		$data['tgl_lahir'] = $row->TglLahir;
		$data['alamat'] = $row->Alamat;
		$data['jenis_kelamin'] = $row->JenisKelamin;
		$data['status'] = $row->Status;
		$data['agama'] = $row->Agama;
		$data['gaji_pokok'] = $row->GajiPokok;	
		
		$this->load->view('template', $data);

 }

 function update()
 {

 	$kd_tunjangan = strtoupper(trim($this->input->post('kd_tunjangan')));
	$gaji_pokok = strtoupper(trim($this->input->post('gaji_pokok')));
	$alamat = strtoupper(trim($this->input->post('alamat')));
	$no_hp = strtoupper(trim($this->input->post('no_hp')));
	$jenis_kelamin = strtoupper(trim($this->input->post('jenis_kelamin')));
	$status = strtoupper(trim($this->input->post('status')));
	$agama = strtoupper(trim($this->input->post('agama')));
	$tgl_lahir = strtoupper(trim(date('Y-m-d',strtotime($this->input->post('tgl_lahir')))));
	$nm_karyawan = strtoupper(trim($this->input->post('nm_karyawan')));
	$kd_jabatan = strtoupper(trim($this->input->post('kd_jabatan')));
	$kd_golongan = strtoupper(trim($this->input->post('kd_golongan')));
	$kd_pendidikan = strtoupper(trim($this->input->post('kd_pendidikan')));
	$kd_karyawan = strtoupper(trim($this->input->post('kd_karyawan')));
	
	$data['KdKaryawan'] = $kd_karyawan;
	$data['NmKaryawan'] = $nm_karyawan;
	$data['Alamat'] = $alamat;
	$data['NoHp'] = $no_hp;
	$data['JenisKelamin'] = $jenis_kelamin;
	$data['TglLahir'] = $tgl_lahir;
	$data['Status'] = $status;
	$data['Agama'] = $agama;
	$data['GajiPokok'] = $gaji_pokok;
	$data['KdTunjangan'] = $kd_tunjangan;
	$data['KdJabatan'] = $kd_jabatan;
	$data['KdPendidikan'] = $kd_pendidikan;
	$data['KdGolongan'] = $kd_golongan;
 	$this->db->trans_start();

 	$this->db->where('KdKaryawan', $kd_karyawan);
	$this->db->update('karyawan', $data);
	
 	$this->db->trans_complete();
	//echo $total_tunjangan;
 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('karyawan/karyawan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data Behasil DiUpdate.
			    </div>");
				redirect('karyawan/karyawan_list');	
			}

 }



    
}
