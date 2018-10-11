<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berandaadmin extends CI_Controller {

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
		  'page'=>'berandaadmin',
		  'link'=>'beranda',
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebaradmin');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
}
