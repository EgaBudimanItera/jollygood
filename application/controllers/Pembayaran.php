<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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
        $where='';
        $data = array(
            'page' => 'pembayaran/data',
            'link' => 'pembayaran',
            'script'=>'',
            // 'siswa'=>$this->Jollygood->listsiswabsdaftar(),
            // 'kelas'=>$this->Jollygood->list_data_all('02_kelas'),
            'pembayaran'=>$this->Jollygood->listpembayaran3()->result(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Pembayaran Kursus' => base_url() . 'pembayaran'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function caripembayaran(){
        $kodesiswa=$this->input->post('kodesiswa',true);
        $kodekelas=$this->input->post('kodekelas',true);
        $bulan=$this->input->post('bulan',true);
        $tahun=$this->input->post('tahun',true);
        $where=array(
            '03_pendaftaran.kodekelas'=>$kodekelas,
            '04_pembayaran.kodesiswa'=>$kodesiswa,
            'bulan'=>$bulan,
            'tahun'=>$tahun,
        );
        $data=array(
            'page' => 'pembayaran/statusbayar',
            'link' => 'pembayaran',
            'script'=>'',
            'listatas'=>$this->Jollygood->listpembayaran2($where)->row(),
            'list'=>$this->Jollygood->listpembayaran2($where)->result(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Status Pembayaran Kursus' => base_url() . 'pembayaran/caripembayaran'),   
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function proseshapus($kodebayar){
        $hapus=$this->Jollygood->hapus('kodebayar',$kodebayar,'04_pembayaran');
        if($hapus){
            echo '<script>alert("Data Berhasil Dihapus");window.location = "'.base_url().'pembayaran";</script>';
        }else{
            echo '<script>alert("Data Gagal Dihapus");window.location = "'.base_url().'pembayaran";</script>';
        }
    }

    function download($filename = NULL) {
      // load download helder
      $this->load->helper('download');
      // read file contents
      $data = file_get_contents(base_url('/file_upload/'.$filename));
      force_download($filename, $data);
    }

    public function prosesverifikasi($kodebayar,$kodesiswa,$jumlah){
        $data=array('status'=>'1','tglbayar'=>date('Y-m-d'));
        $ubah=$this->Jollygood->update('kodebayar',$kodebayar,$data,'04_pembayaran');
        $data2=array(
            'tanggal'=>date('Y-m-d'),
            'keterangan'=>'1',
            'noref'=>$kodebayar,
            'kodesiswa'=>$kodesiswa,
            'jumlah'=>$jumlah
        );
        $simpanpendapatan=$this->Jollygood->simpan_data($data2,'05_pendapatan');
        if($simpanpendapatan){
             echo '<script>alert("Data Berhasil Diverifikasi");window.location = "'.base_url().'pembayaran";</script>';
        }else{
            echo '<script>alert("Data Gagal Diverifikasi");window.location = "'.base_url().'pembayaran";</script>';
        }
    }
}