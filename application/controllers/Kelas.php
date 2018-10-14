<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Jollygood'));
        if($this->session->userdata('status') != "login"){
             echo '<script>alert("Maaf, anda harus login terlebih dahulu");window.location = "'.base_url().'admin";</script>';
        }else{
            $username = $this->session->userdata('username');
            $where=array('username'=>$username);
            $cek=$this->Jollygood->cek_loginadmin($where)->num_rows(); 
            if($cek == 0){
                echo '<script>alert("User tidak ditemukan di database");window.location = "'.base_url().'admin";</script>';
            }
        }   
	}
   
    public function index(){
        $data = array(
            'page' => 'kelas/data',
            'link' => 'kelas',
            'script'=>'',
            'list'=>$this->Jollygood->list_data_all('02_kelas'),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Kelas' => base_url() . 'kelas'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function formtambah(){
        $data = array(
            'page' => 'kelas/formtambah',
            'link' => 'kelas',
            'script'=>'',
            'kodekelas'=>$this->Jollygood->kodekelas(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Kelas' => base_url() . 'kelas',
                'Tambah Data Kelas'=>base_url() . 'kelas/formtambah'
            ),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function formubah($kodekelas){
        $data = array(
            'page' => 'kelas/formubah',
            'link' => 'kelas',
            'script'=>'',
            'list'=>$this->Jollygood->list_data_where('kodekelas',$kodekelas,'02_kelas')->row(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Kelas' => base_url() . 'kelas',
                'Ubah Data Kelas' => base_url() . 'kelas/formubah/'.$kodekelas)
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');    
    }

    public function prosessimpan(){
        $data=array(
            'kodekelas'=>$this->Jollygood->kodekelas(),
            'namakelas'=>$this->input->post('namakelas',true),
            'tglbuka'=>date_format(date_create($this->input->post('tglbuka',true)),'Y-m-d'),
            'tgltutup'=>date_format(date_create($this->input->post('tgltutup',true)),'Y-m-d'),
            'biayadaftar'=>$this->input->post('biayadaftar',true),
            'biayabulanan'=>$this->input->post('biayabulanan',true),
        );
        $simpan=$this->Jollygood->simpan_data($data,'02_kelas');
        if($simpan){
            echo '<script>alert("Data Berhasil Disimpan");window.location = "'.base_url().'kelas";</script>';
        }else{
            echo '<script>alert("Data Gagal Disimpan");window.location = "'.base_url().'kelas/formtambah";</script>';
        }
    }

    public function prosesubah(){
        $data=array(
            'namakelas'=>$this->input->post('namakelas',true),
            'tglbuka'=>date_format(date_create($this->input->post('tglbuka',true)),'Y-m-d'),
            'tgltutup'=>date_format(date_create($this->input->post('tgltutup',true)),'Y-m-d'),
            'biayadaftar'=>$this->input->post('biayadaftar',true),
            'biayabulanan'=>$this->input->post('biayabulanan',true),
        );
        $kodekelas=$this->input->post('kodekelas',true);
        $ubah=$this->Jollygood->update('kodekelas',$kodekelas,$data,'02_kelas');
        if($ubah){
            echo '<script>alert("Data Berhasil Diubah");window.location = "'.base_url().'kelas";</script>';
        }else{
            echo '<script>alert("Data Gagal Diubah");window.location = "'.base_url().'kelas/formubah'.$kodekelas.'";</script>';
        }
    }

    public function proseshapus($kodekelas){
        $hapus=$this->Jollygood->hapus('kodekelas',$kodekelas,'02_kelas');
        if($hapus){
            echo '<script>alert("Data Berhasil Dihapus");window.location = "'.base_url().'kelas";</script>';
        }else{
            echo '<script>alert("Data Gagal Dihapus");window.location = "'.base_url().'kelas";</script>';
        }
    }
}