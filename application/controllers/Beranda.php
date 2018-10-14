<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model(array('Jollygood'));
		// if($this->session->userdata('status') != "login"){
  //           echo '<script>alert("Maaf, anda harus login terlebih dahulu");window.location = "'.base_url().'";</script>';
  //       }else{
  //           $userNama = $this->session->userdata('userNama');
  //           $where=array('userNama'=>$userNama);
  //           $cek=$this->Museraplikasi->cek_login($where)->num_rows(); 
  //           if($cek == 0){
  //               echo '<script>alert("User tidak ditemukan di database");window.location = "'.base_url().'";</script>';
  //           }
  //       }   
	}


	public function index()
	{
		 $data=array(
            'page' => 'beranda',
            'link' => 'beranda',
            'script'=>'',
        );
        $this->load->view('templatefront/header',$data);
        $this->load->view('templatefront/content');
        $this->load->view('templatefront/footer');
	}

	public function daftarsiswa()
	{
		 $data=array(
            'page' => 'daftarsiswa',
            'link' => 'daftarsiswa',
            'script'=>'',
        );
        $this->load->view('templatefront/header',$data);
        $this->load->view('templatefront/content');
        $this->load->view('templatefront/footer');
	}

	public function prosessimpansiswa(){
        $data=array(
            'kodesiswa'=>$this->Jollygood->kodesiswa(),
            'namasiswa'=>$this->input->post('namasiswa',true),
            'tgllahir'=>date_format(date_create($this->input->post('tgllahir',true)),'Y-m-d'),
            'username'=>$this->input->post('username',true),
            'password'=>date_format(date_create($this->input->post('tgllahir',true)),'Y-m-d'),
            'statusdaftar'=>'0',
            'statusaktif'=>'0',
        );
        $simpan=$this->Jollygood->simpan_data($data,'01_siswa');
        if($simpan){
            echo '<script>alert("Data Berhasil Disimpan !! Silahkan Tunggu Verifikasi Admin 1x24 jam");window.location = "'.base_url().'beranda/daftarsiswa";</script>';
        }else{
            echo '<script>alert("Data Gagal Disimpan");window.location = "'.base_url().'beranda/daftarsiswa";</script>';
        }

    }

    public function formlogin()
	{
		 $data=array(
            'page' => 'formlogin',
            'link' => 'formlogin',
            'script'=>'',
        );
        $this->load->view('templatefront/header',$data);
        $this->load->view('templatefront/content');
        $this->load->view('templatefront/footer');
	}

	public function berandasiswa(){

	}

	public function proseslogin(){
		$username=$this->input->post('username',true);
    $password=$this->input->post('password',true);
    $where=array(
          'username'=>$username,
          'password'=>$password,
          'statusdaftar'=>'1',
    );
    $cek=$this->Jollygood->cek_login($where)->num_rows(); 
    if($cek!=0){
      $data_session = array(
          'username' => $username,
          'hakakses'=>'Siswa',
          'kodesiswa'=>$this->Jollygood->cek_login($where)->row()->kodesiswa,
          'status' => "login",
      );

      $this->session->set_userdata($data_session);
      echo '<script>alert("user ditemukan!");window.location = "'.base_url().'buatsiswa";</script>';
      
    }
    else{
      echo '<script>alert("Maaf, username atau password salah!");window.location = "'.base_url().'beranda/formlogin";</script>';
      
    }   
	}
}
