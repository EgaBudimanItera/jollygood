<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Buatsiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Jollygood'));
        if($this->session->userdata('status') != "login"){
             echo '<script>alert("Maaf, anda harus login terlebih dahulu");window.location = "'.base_url().'";</script>';
        }else{
            $username = $this->session->userdata('username');
            $where=array('username'=>$username);
            $cek=$this->Jollygood->cek_login($where)->num_rows(); 
            if($cek == 0){
                echo '<script>alert("User tidak ditemukan di database");window.location = "'.base_url().'";</script>';
            }
        }   
	}
   
    public function index(){
        $kodesiswa = $this->session->userdata('kodesiswa');
        $data = array(
            'page' => 'buatsiswa/profilsiswa',
            'link' => 'profil',
            'script'=>'',
            'list'=>$this->Jollygood->list_data_where('kodesiswa',$kodesiswa,'01_siswa')->row(),
            'breadcrumb' => array(
                'Profil' => base_url() . 'buatsiswa',
            ),
        );
        $this->load->view('templatebuatsiswa/header',$data);
        $this->load->view('templatebuatsiswa/sidebarsiswa');
        $this->load->view('templatebuatsiswa/content');
        $this->load->view('templatebuatsiswa/footer');
    }

    public function formpembayaran(){
        $kodesiswa = $this->session->userdata('kodesiswa');
        $where=array(
            '04_pembayaran.kodesiswa'=>$kodesiswa,
        );
        $data = array(
            'page' => 'buatsiswa/datapembayaran',
            'link' => 'pembayaran',
            'script'=>'',
            'list'=>$this->Jollygood->listpembayaran2($where)->result(),
            'breadcrumb' => array(
                'Pembayaran Biaya Kursus' => base_url() . 'formpembayaran',
            ),
        );
        $this->load->view('templatebuatsiswa/header',$data);
        $this->load->view('templatebuatsiswa/sidebarsiswa');
        $this->load->view('templatebuatsiswa/content');
        $this->load->view('templatebuatsiswa/footer');  
    }

    public function formupload($kodebayar){
        $kodesiswa = $this->session->userdata('kodesiswa');
        $data = array(
            'page' => 'buatsiswa/formupload',
            'link' => 'pembayaran',
            'script'=>'',
            'kodebayar'=>$kodebayar,
            'breadcrumb' => array(
                'Upload Bukti Bayar' => base_url() . 'formupload',
            ),
        );
        $this->load->view('templatebuatsiswa/header',$data);
        $this->load->view('templatebuatsiswa/sidebarsiswa');
        $this->load->view('templatebuatsiswa/content');
        $this->load->view('templatebuatsiswa/footer');  
    }

    public function prosesupload(){
      $kodebayar=$this->input->post('kodebayar',true);   //foto1
      $config ['upload_path'] = './file_upload/';
      $config ['allowed_types'] = 'jpg|png|jpeg';
      $config ['max_size'] = '3000000';
      $config ['file_name'] = 'BB'.$kodebayar.'.jpg';
      $this->load->library('upload', $config);  //File Uploading library
      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('file')){
        $error = $this->upload->display_errors();
                // var_dump($error);
                // die();

        echo '<script>alert("Error Simpan"'.$error.');window.location = "'.base_url().'buatsiswa/formpembayaran";</script>'; 
      }else{
          $foto1=$this->upload->data();   //variable which store the path
          $data=array(
            'file'=>$foto1['file_name'],
          );

          $ubah=$this->Jollygood->update('kodebayar',$kodebayar,$data,'04_pembayaran');
          if($ubah){
            echo '<script>alert("Sukses Simpan !!Bukti Pembayaran ");window.location = "'.base_url().'buatsiswa/formpembayaran";</script>'; 
          }else{
            echo '<script>alert("Gagal Simpan !!Bukti Pembayaran ");window.location = "'.base_url().'/buatsiswa/formupload";</script>'; 
          }
      }
      
      
    }

    public function prosesubah(){
        $kodesiswa=$this->input->post('kodesiswa',true);
        $data=array(
            'namasiswa'=>$this->input->post('namasiswa',true),
            'jk'=>$this->input->post('jk',true),
            'tmplahir'=>$this->input->post('tmplahir',true),
            'alamat'=>$this->input->post('alamat',true),
            'tgllahir'=>date_format(date_create($this->input->post('tgllahir',true)),'Y-m-d'),
            'nohp'=>$this->input->post('nohp',true),
            
        );
        $ubah=$this->Jollygood->update('kodesiswa',$kodesiswa,$data,'01_siswa');
        if($ubah){
            echo '<script>alert("Data Berhasil Diubah");window.location = "'.base_url().'buatsiswa";</script>';
        }else{
            echo '<script>alert("Data Gagal Diubah");window.location = "'.base_url().'buatsiswa/'.$kodesiswa.'";</script>';
        }

    }

    public function logoutsiswa(){
        $this->session->sess_destroy();
        echo '<script>alert("Terima Kasih!");window.location = "'.base_url().'";</script>';
    }

    function download($filename = NULL) {
      // load download helder
      $this->load->helper('download');
      // read file contents
      $data = file_get_contents(base_url('/file_upload/'.$filename));
      force_download($filename, $data);
    }
}