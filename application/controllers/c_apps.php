<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_apps extends CI_Controller{
	function __construct(){
		parent::__construct();

	}
	public function index(){
		$data['title'] = 'Dashboard';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('templates/footer');
	}
	public function data_buku(){
		$data['title'] = 'Data Buku';
		$data['buku'] = $this->m_buku->tampil_data()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('data_buku',$data);
		$this->load->view('templates/footer');
	}

	public function kolom_search(){
		$data['title'] = 'Hasil';
		$data['buku'] = $this->m_buku->search()->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('data_buku',$data);
		$this->load->view('templates/footer');
	}
	public function tambah_pgjg(){
		$this->m_buku->tambah_pgjg();
		redirect('c_apps/index');
	}

	public function aksi_login(){	
		$usr = $this->security->xss_clean($this->input->post('username'));
		$pwd = $this->security->xss_clean($this->input->post('password'));

		$cek = $this->db->query("SELECT * FROM admin WHERE username='".$usr."' AND password='".$pwd."'");
		$t_cek = $cek->num_rows();
		$k_cek = $cek->row();

		if ($t_cek > 0){
			$data_session = array('username' => $k_cek->username,
								'password' => $k_cek->password,
								'nama'	=> $k_cek->nama,
								 'validated' => true);

			$this->session->set_userdata($data_session);
			echo "anda telah login";
			redirect(base_url('admin'));
		}
		else {
			echo "Username dan Password yang anda masukkan salah!!!";
			redirect(base_url());
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}