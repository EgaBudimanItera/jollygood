<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

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
            'page' => 'pendaftaran/data',
            'link' => 'pendaftaran',
            'script'=>'',
            'list'=>$this->Jollygood->listpendaftaran(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Pendaftaran' => base_url() . 'pendaftaran'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function formtambah(){
        $data = array(
            'page' => 'pendaftaran/formtambah',
            'link' => 'pendaftaran',
            'script'=>'script/pendaftaran',
            'kodependaftaran'=>$this->Jollygood->kodependaftaran(),
            'siswa'=>$this->Jollygood->listsiswabsdaftar(),
            'kelas'=>$this->Jollygood->listkelasaktif(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Tambah Pendaftaran' => base_url() . 'pendaftaran/formtambah'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function getkelas(){
        $kodekelas=$this->input->post('kodekelas',true);
        $list=$this->Jollygood->list_data_where('kodekelas',$kodekelas,'02_kelas')->row();
        echo json_encode($list);
    }

    public function prosessimpan(){
        $kodependaftaran=$this->Jollygood->kodependaftaran();
        $data=array(
            'kodependaftaran'=>$kodependaftaran,
            'tanggal'=>date_format(date_create($this->input->post('tanggal',true)),'Y-m-d'),
            'kodesiswa'=>$this->input->post('kodesiswa',true),
            'kodekelas'=>$this->input->post('kodekelas',true),
            'keterangan'=>$this->input->post('keterangan',true),
            'uangdaftar'=>$this->input->post('biayadaftar',true),
        );
        $datakelas=array(
            'jumlahsiswa'=>$this->Jollygood->list_data_where('kodekelas',$this->input->post('kodekelas',true),'02_kelas')->row()->jumlahsiswa +1,
        );
        $datapendapatan=array(
            'tanggal'=>date_format(date_create($this->input->post('tanggal',true)),'Y-m-d'),
            'keterangan'=>'0',
            'noref'=>$kodependaftaran,
            'kodesiswa'=>$this->input->post('kodesiswa',true),
            'jumlah'=>$this->input->post('biayadaftar',true),
        );
        $simpanpendaftaran=$this->Jollygood->simpan_data($data,'03_pendaftaran');
        $ubahkelas=$this->Jollygood->update('kodekelas',$this->input->post('kodekelas',true),$datakelas,'02_kelas');
        $simpanpendapatan=$this->Jollygood->simpan_data($datapendapatan,'05_pendapatan');
        if($simpanpendaftaran &&$ubahkelas&&$simpanpendapatan){
            echo '<script>alert("Data Berhasil Disimpan");window.location = "'.base_url().'pendaftaran";</script>';
        }else{
            echo '<script>alert("Data Gagal Disimpan");window.location = "'.base_url().'pendaftaran";</script>';
        }
    }
    public function proseshapus($kodependaftaran){
        $where=array(
            'kodependaftaran'=>$kodependaftaran,
        );
        $listpendaftaran=$this->Jollygood->listpendaftaran2($where)->row();
        $kodekelas=$listpendaftaran->kodekelas;
        $kodesiswa=$listpendaftaran->kodesiswa;
        $jumlahsiswa=$listpendaftaran->jumlahsiswa;
        $uangdaftar=$listpendaftaran->uangdaftar;

        $datakelas=array(
            'jumlahsiswa'=>$jumlahsiswa-1,
        );

        $datapendapatan=array(
            'tanggal'=>date('Y-m-d'),
            'keterangan'=>'0',
            'noref'=>$kodependaftaran,
            'kodesiswa'=>$kodesiswa,
            'jumlah'=>$uangdaftar*-1,
        );
        $ubahkelas=$this->Jollygood->update('kodekelas',$kodekelas,$datakelas,'02_kelas');
        $simpanpendapatan=$this->Jollygood->simpan_data($datapendapatan,'05_pendapatan');
        $hapuspendaftaran=$this->Jollygood->hapus('kodekelas',$kodekelas,'03_pendaftaran');

        if($simpanpendapatan &&$ubahkelas&&$hapuspendaftaran){
            echo '<script>alert("Data Berhasil dihapus");window.location = "'.base_url().'pendaftaran";</script>';
        }else{
            echo '<script>alert("Data Gagal dihapus");window.location = "'.base_url().'pendaftaran";</script>';
        }
    }
}