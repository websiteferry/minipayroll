<?php

class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    //  ================= AUTOMATIC CODE ==================
    
    public function getkodepegawai()
    {
        $query = $this->db->query("select max(id_pegawai) as max_code FROM pegawai");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_nik = $max_fix + 1;

        $nik = "P".sprintf("%04s", $max_nik);
        return $nik;
    }
	
	public function getKodeJabatan()
    {
        $query = $this->db->query("select max(KdJabatan) as max_code FROM jabatan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_jabatan = $max_fix + 1;

        $id_jabatan = "J".sprintf("%04s", $max_jabatan);
        return $id_jabatan;
    }
	
	public function getKodeKaryawan()
    {
        $query = $this->db->query("select max(KdKaryawan) as max_code FROM karyawan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_karyawan = $max_fix + 1;

        $id_karyawan = "K".sprintf("%04s", $max_karyawan);
        return $id_karyawan;
    }
	
	public function getKodeTunjangan()
    {
        $query = $this->db->query("select max(KdTunjangan) as max_code FROM tunjangan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_tunjangan = $max_fix + 1;

        $id_tunjangan = "T".sprintf("%04s", $max_tunjangan);
        return $id_tunjangan;
    }
	
	public function getKodePendidikan()
    {
        $query = $this->db->query("select max(KdPendidikan) as max_code FROM pendidikan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_pendidikan = $max_fix + 1;

        $id_pendidikan = "P".sprintf("%04s", $max_pendidikan);
        return $id_pendidikan;
    }
	
	public function getKodeGolongan()
    {
        $query = $this->db->query("select max(KdGolongan) as max_code FROM golongan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_golongan = $max_fix + 1;

        $id_golongan = "P".sprintf("%04s", $max_golongan);
        return $id_golongan;
    }
	
	public function getKodePotongan()
    {
        $query = $this->db->query("select max(KdPotongan) as max_code FROM potongan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_potongan = $max_fix + 1;

        $id_potongan = "T".sprintf("%04s", $max_potongan);
        return $id_potongan;
    }
    

    public function getkodeakun()
    {
        $query = $this->db->query("select max(id_akun) as max_code FROM akun");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_akun = $max_fix + 1;

        $id_akun = "A".sprintf("%04s", $max_id_akun);
        return $id_akun;
    }
    
    public function datajabatan()
    {
		$query = $this->db->query('SELECT * FROM jabatan');
		return $query->result();
    }
	
	public function data_akun()
    {
		$id=$this->session->userdata('id_user');
		$query = $this->db->query("SELECT * FROM user where username = '$id'");
		return $query->result();
    }
	
	public function datakaryawan()
    {
        $query = $this->db->query('Select A.*,B.NmJabatan,C.NmPendidikan,D.NmGolongan,E.KdTunjangan,E.TotalTunjangan
								from karyawan A
								left join jabatan B on B.KdJabatan=A.KdJabatan
								left join pendidikan C on C.KdPendidikan=A.KdPendidikan
								Left Join golongan D on D.KdGolongan = A.KdGolongan
								Left join tunjangan E on E.KdTunjangan = A.KdTunjangan
								ORDER BY A.KdKaryawan');
        return $query->result();
    }

	public function datatunjangan()
    {
        $query = $this->db->query('Select A.KdTunjangan,B.KdJabatan,B.NmJabatan,C.KdPendidikan,C.NmPendidikan,D.KdGolongan,D.NmGolongan
						,A.TotalTunjangan
						from tunjangan A
						LEFT JOIN jabatan B ON B.KdJabatan = A.KdJabatan
						LEFT JOIN pendidikan C on C.KdPendidikan = A.KdPendidikan
						LEFT JOIN golongan D on D.KdGolongan = A.KdGolongan');
        return $query->result();
    }
	
	
	public function datapendidikan()
    {
		$query = $this->db->query('SELECT * FROM pendidikan');
		return $query->result();
    }
	
	public function datapotongan()
    {
		$query = $this->db->query('SELECT * FROM potongan');
		return $query->result();
    }
	
	public function datagolongan()
    {
		$query = $this->db->query('SELECT * FROM golongan');
		return $query->result();
    }

    public function datapegawai()
    {
		$query = $this->db->query('SELECT A.KdKaryawan, A.NmKaryawan, A.alamat, A.JenisKelamin, B.NmJabatan
                               FROM karyawan A LEFT JOIN jabatan B ON B.KdJabatan = A.KdJabatan');
		return $query->result();
    }


    public function datainformasi()
    {

        $query = $this->db->query("SELECT A.tanggal, A.subject, A.pesan, C.nama_pegawai, A.id_informasi
                                   FROM informasi A 
                                   LEFT JOIN pegawai C ON C.id_pegawai =  A.id_pegawai
                                   WHERE A.aktif = 1");
        return $query->result();

    }

  
    public function dataakun()
    {
         $query = $this->db->query('SELECT A.username, A.level, A.id_akun, B.id_pegawai, B.nama_pegawai, A.password
            FROM akun A LEFT JOIN pegawai B ON B.id_pegawai = A.username');

         return $query->result();
    }

    public function datakategori()
    {
        $query = $this->db->query('SELECT * FROM kategori');
        return $query->result();
    }

    public function dropdown_kategori()
    {
        $sql = "SELECT * FROM kategori ORDER BY nama_kategori";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_kategori] = $row->nama_kategori;
        }
        return $value;
    }

    public function dropdown_pegawai()
    {
        $sql = "SELECT A.nama_pegawai, A.id_pegawai FROM pegawai A 
                ORDER BY nama_pegawai";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_pegawai] = $row->nama_pegawai;
        }
        return $value;
    }

    public function dropdown_jabatan()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_jabatan] = $row->nama_jabatan;
        }
        return $value;
    }

    public function dropdown_jk()
    {
        $value[''] = '--PILIH--';            
        $value['LAKI-LAKI'] = 'LAKI-LAKI';
        $value['PEREMPUAN'] = 'PEREMPUAN';           
            
        return $value;
    }

    public function dropdown_aktif()
    {
        $value[''] = '--PILIH--';            
        $value[1] = 'YA';
        $value[0] = 'TIDAK';           
            
        return $value;
    }

    public function dropdown_level()
    {
        $value[''] = '--PILIH--';            
        $value['ADMIN'] = 'ADMIN';
        $value['USER'] = 'USER';           
            
        return $value;
    }

}