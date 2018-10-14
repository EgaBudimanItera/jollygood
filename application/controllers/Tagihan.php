<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

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
            'page' => 'tagihan/data',
            'link' => 'tagihan',
            'script'=>'',
            'list'=>$this->Jollygood->listtagihan(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Tagihan Bulanan' => base_url() . 'tagihan'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function formtambah(){
        $data = array(
            'page' => 'tagihan/formtambah',
            'link' => 'tagihan',
            'script'=>'script/tagihan',
            'kodebayar'=>$this->Jollygood->kodebayar(),
            'siswa'=>$this->Jollygood->listsiswabsdaftar(),
            'kelas'=>$this->Jollygood->listkelasaktif(),
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Data Tagihan Bulanan' => base_url() . 'tagihan'),
                'Tambah Data Tagihan'=>base_url() . 'tagihan/formtambah'
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function getpendaftaran(){
        $kodesiswa=$this->input->post('kodesiswa',true);
        $tglskr=date('Y-m-d');
        $where=array('03_pendaftaran.kodesiswa'=>$kodesiswa,'tglbuka<='=>$tglskr,'tgltutup>='=>$tglskr);
        $pendaftaran=$this->Jollygood->listpendaftaran2($where)->result();
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih

        $lists = "<option value=''>Pilih</option>";
        
        foreach($pendaftaran as $data){
            $lists .= "<option value='".$data->kodependaftaran."'>".$data->namakelas."</option>"; // Tambahkan tag option ke variabel $lists
        }
        
        $callback = array('list_pendaftaran'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    function getbiaya(){
        $kodependaftaran=$this->input->post('kodependaftaran',true);
        $where=array('kodependaftaran'=>$kodependaftaran);
        $pendaftaran=$this->Jollygood->listpendaftaran2($where)->row();
        echo json_encode($pendaftaran);
    }
    function getbiaya2(){
        $kodekelas=$this->input->post('kodekelas',true);
        
        $kelas=$this->Jollygood->list_data_where('kodekelas',$kodekelas,'02_kelas')->row();
        echo json_encode($kelas);
    }

    public function prosessimpanindividu(){
        $data=array(
            'kodebayar'=>$this->Jollygood->kodebayar(),
            'bulan'=>$this->input->post('bulan',true),
            'tahun'=>$this->input->post('tahun',true),
            'kodependaftaran'=>$this->input->post('kodependaftaran',true),
            'tgltagih'=>date_format(date_create($this->input->post('tgltagih',true)),'Y-m-d'),
            'jumlah'=>$this->input->post('jumlah',true),
            'kodesiswa'=>$this->input->post('kodesiswa',true),
        );
        $simpantagihan=$this->Jollygood->simpan_data($data,'04_pembayaran');
        if($simpantagihan){
            echo '<script>alert("Data Berhasil Disimpan");window.location = "'.base_url().'tagihan";</script>';
        }else{
            echo '<script>alert("Data Gagal Disimpan");window.location = "'.base_url().'tagihan/formtambah";</script>';
        }
    }

    public function prosessimpankelas(){
        $kodekelas=$this->input->post('kodekelas2',true);
        $where=array('03_pendaftaran.kodekelas'=>$kodekelas);
        $daftar=$this->Jollygood->listpendaftaran2($where)->result();
        
        if(!empty($daftar)) {
            $arrinsert = array();
            $i = 0;
            $res = '';
            foreach($daftar as $d){
                $arrinsert['kodebayar']=$this->Jollygood->kodebayar();
                $arrinsert['bulan']=$this->input->post('bulan2',true);
                $arrinsert['tahun']=$this->input->post('tahun2',true);
                $arrinsert['tgltagih']=date_format(date_create($this->input->post('tgltagih2',true)),'Y-m-d');
                $arrinsert['kodependaftaran']=$d->kodependaftaran;
                $arrinsert['jumlah']=$d->biayabulanan;
                $arrinsert['kodesiswa']=$d->kodesiswa;
                $res=$this->Jollygood->simpan_data($arrinsert,'04_pembayaran');
                $i++;
            }
            if($res){
                echo '<script>alert("Data Berhasil Disimpan");window.location = "'.base_url().'tagihan";</script>';
            }else{
                echo '<script>alert("Data Gagal Disimpan");window.location = "'.base_url().'tagihan/formtambah";</script>'; 
            }
        }else{
            echo '<script>alert("Tidak Ada Siswa pada Kelas Tersebut");window.location = "'.base_url().'tagihan/formtambah";</script>';
        }
    }

    public function proseshapus($kodebayar){
        $hapus=$this->Jollygood->hapus('kodebayar',$kodebayar,'04_pembayaran');
        if($hapus){
            echo '<script>alert("Data Berhasil dihapus");window.location = "'.base_url().'tagihan";</script>';
        }else{
            echo '<script>alert("Data Gagal dihapus");window.location = "'.base_url().'tagihan";</script>';
        }
    }
}