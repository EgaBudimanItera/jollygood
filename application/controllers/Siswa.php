<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Jollygood'));
        if($this->session->userdata('status') != "login"){
             echo '<script>alert("Maaf, anda harus login terlebih dahulu");window.location = "'.base_url().'admin";</script>';
        }else{
            $username = $this->session->userdata('username');
            $where=array('username'=>$username);
            $cek=$this->Jollygood->cek_login($where)->num_rows(); 
            if($cek == 0){
                echo '<script>alert("User tidak ditemukan di database");window.location = "'.base_url().'admin";</script>';
            }
        }    
	}
   
    public function index(){
        $data = array(
            'page' => 'siswa/data',
            'link' => 'siswa',
            'script'=>'',
            'list'=>$this->Jollygood->list_data_all('01_siswa'),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Siswa' => base_url() . 'siswa'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function formtambah(){
        $data = array(
            'page' => 'siswa/formtambah',
            'link' => 'siswa',
            'script'=>'',
            'kodesiswa'=>$this->Jollygood->kodesiswa(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Siswa' => base_url() . 'siswa',
                'Tambah Data Siswa'=>base_url() . 'siswa/formtambah'
            ),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function formubah($kodesiswa){
        $data=array(
            'page' => 'siswa/formubah',
            'link' => 'siswa',
            'script'=>'',
            'list'=>$this->Jollygood->list_data_where('kodesiswa',$kodesiswa,'01_siswa')->row(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Siswa' => base_url() . 'siswa',
                'Ubah Data Siswa'=>base_url() . 'siswa/formubah'.$kodesiswa
            ),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function daftarsiswa(){
        $data=array(
            'page' => 'siswa/daftarsiswa',
            'link' => 'siswa',
            'script'=>'',
        );
        $this->load->view('templatefront/header',$data);
        $this->load->view('templatefront/content');
        $this->load->view('templatefront/footer');
       
    }

    public function prosessimpanadmin(){
        $data=array(
            'kodesiswa'=>$this->Jollygood->kodesiswa(),
            'namasiswa'=>$this->input->post('namasiswa',true),
            'jk'=>$this->input->post('jk',true),
            'tmplahir'=>$this->input->post('tmplahir',true),
            'alamat'=>$this->input->post('alamat',true),
            'tgllahir'=>date_format(date_create($this->input->post('tgllahir',true)),'Y-m-d'),
            'nohp'=>$this->input->post('nohp',true),
            'username'=>$this->input->post('username',true),
            'password'=>date_format(date_create($this->input->post('tgllahir',true)),'Y-m-d'),
            'statusdaftar'=>'1',
            'statusaktif'=>'1',
        );
        $simpan=$this->Jollygood->simpan_data($data,'01_siswa');
        if($simpan){
            echo '<script>alert("Data Berhasil Disimpan");window.location = "'.base_url().'siswa";</script>';
        }else{
            echo '<script>alert("Data Gagal Disimpan");window.location = "'.base_url().'siswa/formtambah";</script>';
        }

    }

    

    public function prosesubahadmin(){
        $kodesiswa=$this->input->post('kodesiswa',true);
        $data=array(
            'namasiswa'=>$this->input->post('namasiswa',true),
            'jk'=>$this->input->post('jk',true),
            'tmplahir'=>$this->input->post('tmplahir',true),
            'alamat'=>$this->input->post('alamat',true),
            'tgllahir'=>date_format(date_create($this->input->post('tgllahir',true)),'Y-m-d'),
            'nohp'=>$this->input->post('nohp',true),
            'statusdaftar'=>$this->input->post('statusdaftar',true),
            'statusaktif'=>$this->input->post('statusaktif',true),
        );
        $ubah=$this->Jollygood->update('kodesiswa',$kodesiswa,$data,'01_siswa');
        if($ubah){
            echo '<script>alert("Data Berhasil Diubah");window.location = "'.base_url().'siswa";</script>';
        }else{
            echo '<script>alert("Data Gagal Diubah");window.location = "'.base_url().'siswa/formubah'.$kodesiswa.'";</script>';
        }

    }
}