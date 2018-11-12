<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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

	public function index()
	{
		
	}

	public function pospendaftaran(){
		$data=array(
		  'page'=>'laporan/pospendaftaran',
		  'link'=>'lappendapatandaftar',
		  'script'=>'',
          'list'=>'',
          'breadcrumb' => array(
            'Beranda' => base_url() . 'berandaadmin',
            'Data Pendapatan Pendaftaran' => base_url() . 'laporan/pospendaftaran'),
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebaradmin');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}

	public function posspp(){
		$data=array(
		  'page'=>'laporan/posspp',
		  'link'=>'lappendapatanspp',
		  'script'=>'',
          'list'=>'',
          'breadcrumb' => array(
            'Beranda' => base_url() . 'berandaadmin',
            'Data Pendapatan Biaya Per Bulan' => base_url() . 'laporan/posspp'),
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebaradmin');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}

	public function lapgrafik(){
		$data=array(
		  'page'=>'laporan/lapgrafik',
		  'link'=>'lapgrafik',
		  'script'=>'',
          'list'=>'',
          'breadcrumb' => array(
            'Beranda' => base_url() . 'berandaadmin',
            'Data Pendapatan' => base_url() . 'laporan/lapgrafik'),
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebaradmin');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}


	public function caripendapatandaftar(){
		$daritanggal=date_format(date_create($this->input->post('daritanggal',true)),'Y-m-d');
		$hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),'Y-m-d');
		$where=array('tanggal>='=>$daritanggal,'tanggal<='=>$hinggatanggal);
		$data=array(
			'list'=>$this->Jollygood->listpendaftaran2($where)->result(),
			'd'=>$daritanggal,
			'h'=>$hinggatanggal,
		);
		$this->load->view('laporan/pendapatanpendaftaran',$data);
	}

	public function caripendapatanspp(){
		$daritanggal=date_format(date_create($this->input->post('daritanggal',true)),'Y-m-d');
		$hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),'Y-m-d');
		$where=array('tglbayar>='=>$daritanggal,'tglbayar<='=>$hinggatanggal,'status'=>'1');
		$data=array(
			'list'=>$this->Jollygood->listpembayaran2($where)->result(),
			'd'=>$daritanggal,
			'h'=>$hinggatanggal,
		);
		$this->load->view('laporan/pendapatanspp',$data);
	}

	public function carigrafik(){
		$daritanggal=date_format(date_create($this->input->post('daritanggal',true)),'Y-m-d');
		$hinggatanggal=date_format(date_create($this->input->post('hinggatanggal',true)),'Y-m-d');
		$where=array('tglbayar>='=>$daritanggal,'tglbayar<='=>$hinggatanggal);
		$data=array(
			'list'=>$this->Jollygood->listpendapatan2($daritanggal,$hinggatanggal)->result(),
			'd'=>$daritanggal,
			'h'=>$hinggatanggal,
			'script'=>'script/grafik',
			'page'=>'laporan/grafik',
		  	'link'=>'lapgrafik',
          	'breadcrumb' => array(
            'Beranda' => base_url() . 'berandaadmin',
            'Data Pendapatan' => base_url() . 'laporan/lapgrafik'),
		);
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebaradmin');
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
}
