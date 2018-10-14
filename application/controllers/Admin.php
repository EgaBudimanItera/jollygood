<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Jollygood')); 
	}

	public function index()
	{
       $this->load->view('admin/login');
	}

	public function formubahpassword(){
		$data = array(
            'page' => 'admin/formubahpassword',
            'link' => '',
            'script'=>'',
            'list'=>'',
            'breadcrumb' => array(
                'Beranda' => base_url() . 'berandaadmin',
                'Ubah Password' => base_url() . 'admin/formubahpassword'),
        );
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebaradmin');
        $this->load->view('template/content');
        $this->load->view('template/footer');
	}

	public function ubahpassword(){
		$id=$this->input->post('id',true);
		$data=array(
			'password'=>$this->input->post('password',true),
		);
		$ubah=$this->Jollygood->update('id',$id,$data,'06_admin');
		if($ubah){
			 echo '<script>alert("Ubah Password Berhasil, Silahkan melakukan proses login kembali!");window.location = "'.base_url().'admin/logoutadmin";</script>';
		}else{
			 echo '<script>alert("Ubah Password Gagak, Silahkan melakukan proses login kembali!");window.location = "'.base_url().'admin/logoutadmin";</script>';
		}
	}

	public function proseslogin(){
		$username=$this->input->post('username',true);
	    $password=$this->input->post('password',true);
	    $where=array(
	          'username'=>$username,
	          'password'=>$password,
	    );
	    $cek=$this->Jollygood->cek_loginadmin($where)->num_rows(); 
	    if($cek!=0){
	      $data_session = array(
	          'username' => $username,
	          'hakakses'=>$this->Jollygood->cek_loginadmin($where)->row()->hakakses,
	          'id'=>$this->Jollygood->cek_loginadmin($where)->row()->id,
	          'status' => "login",
	      );

	      $this->session->set_userdata($data_session);
	      echo '<script>alert("user ditemukan!");window.location = "'.base_url().'berandaadmin";</script>';
	      
	    }
	    else{
	      echo '<script>alert("Maaf, username atau password salah!");window.location = "'.base_url().'admin";</script>';
	      
	    }   
	}

	public function logoutadmin(){
        $this->session->sess_destroy();
        echo '<script>alert("Terima Kasih!");window.location = "'.base_url().'admin";</script>';
    }
}
