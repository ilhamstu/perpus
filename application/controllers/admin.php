<?php
/**
 * 
 */
class Admin extends CI_Controller{
	
	function __construct()	{
		parent::__construct();
		if($this->session->userdata('validated') == FALSE){
			redirect(base_url());
		}
	}

	public function index(){
		$data['title'] = 'Dashboard';
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/a_dashboard',$data);
		$this->load->view('admin/templates/footer');
	}
	public function item(){
		$data['title'] = 'Item';
		$data['buku'] = $this->m_buku->tampil_data()->result();
		$data['ktgr'] = $this->m_buku->tampil_ktgr()->result();
		$data['nama'] = $this->session->userdata('nama');

		$limit_page = 6;
        $page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$data['page'] = $page;
        $total = $this->m_buku->get_total();
		$data['nomor'] = $total/$limit_page;


        if ($total > 0) 
        {
            // get current page records
            $data['buku'] = $this->m_buku->tampil_data_limit($limit_page, $page * $limit_page)->result();
             
            $config['base_url'] = base_url('admin/item');
            $config['total_rows'] = $total;
            $config['per_page'] = $limit_page;
            $config['uri_segment'] = 3;

            //paging configuration
            $config['num_links'] = 2;
            $config['use_page_numbers'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            
            //bootstrap pagination 
            $config['full_tag_open'] = '<nav aria-label="..."><ul class="pagination pagination-md justify-content-center">';
			$config['full_tag_close'] = '</ul></nav>'; 
			$config['first_link'] = '<i class="fa fa-backward"></i>';
			$config['first_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config['first_tag_close'] = '</div></li>';
			$config['last_link'] = '<i class="fa fa-fast-forward"></i>';
			$config['last_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config['last_tag_close'] = '</div></li>';
			$config['next_link'] = '<i class="fa fa-step-forward"></i>';
			$config['next_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config['next_tag_close'] = '</div></li>';
			$config['prev_link'] = '<i class="fa fa-step-backward"></i>';
			$config['prev_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config['prev_tag_close'] = '</div></li>';
			$config['cur_tag_open'] = '<li class="page-item disabled"><div class="page-link" href="#" tabindex="-1">';
			$config['cur_tag_close'] = '</div></li>';
			$config['num_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config['num_tag_close'] = '</div></li>';
             
            $this->pagination->initialize($config);
            // build paging links
            $data['links'] = $this->pagination->create_links();
        }

		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/item',$data);
		$this->load->view('admin/templates/footer');
	}
	public function tambah(){
		$this->m_buku->tambah_data();
		redirect('admin/item');
	}
	public function tambah_ktgr(){
		$this->m_buku->tambah_ktgr();
		redirect('admin/item');
	}
	public function tambah_pgjg(){
		$this->m_buku->tambah_pgjg();
		redirect('admin/pengunjung');
	}
	public function tambah_pinjam(){
		$this->m_buku->tambah_pinjam();
		redirect('admin/peminjaman');
	}
	public function hapus_buku($id){
		$where = array('kdBuku' => $id);
		$this->m_buku->hapus_buku($where,('buku'));
		redirect('admin/item');
	}
	public function hapus_pgjg($id){
		$where = array('kdPengunjung' => $id);
		$this->m_buku->hapus_pgjg($where,('pengunjung'));
		redirect('admin/pengunjung');
	}
	public function hapus_pinjam($id){
		$where = array('kdPeminjaman' => $id);
		$this->m_buku->hapus_pinjam($where,('peminjaman'));
		redirect('admin/peminjaman');
	}
	public function edit_buku($id){
		$where = array('kdBuku' => $id);
		$data['title'] = 'Edit';
		$data['buku'] = $this->m_buku->edit_buku($where, 'buku')->result();
		$data['ktgr'] = $this->m_buku->tampil_ktgr()->result();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/edit_buku',$data);
		$this->load->view('admin/templates/footer');
	}
	public function update_buku(){
		$id = $this->input->post('id');
		$jdl = $this->input->post('jdl');
		$ktgr = $this->input->post('kategori');
		$stok = $this->input->post('stok');
		$rak = $this->input->post('rak');

		$data = array(
			'jdlBuku' => $jdl,
			'kdKategori' => $ktgr,
			'stok' => $stok,
			'rak' => $rak
			);
		$where = array(
			'kdBuku' => $id
		);

		$this->m_buku->update_buku($where,$data,'buku');
		redirect('admin/item');
	}
	public function peminjaman(){
		$data['title'] = 'Peminjaman';
		$data['pinjam'] = $this->m_buku->tampil_pinjam()->result();
		$data['buku'] = $this->m_buku->buku()->result();
		$data['pgjg'] = $this->m_buku->pengunjung()->result();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/pinjam',$data);
		$this->load->view('admin/templates/footer');
	}

	public function pengunjung(){
		
		$data['title'] = 'Data Pengunjung';
		$data['pgjg'] = $this->m_buku->pengunjung()->result();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/pgjg',$data);
		$this->load->view('admin/templates/footer');
	}

	public function edit_pgjg($id){
		$where = array('kdPengunjung' => $id);
		$data['title'] = 'Edit';
		$data['pgjg'] = $this->m_buku->edit_pgjg($where,'pengunjung')->result();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/edit_pgjg',$data);
		$this->load->view('admin/templates/footer');
	}
	public function update_pgjg(){
		$id = $this->input->post('id');
		$data = array(
			'nmPengunjung' => $this->input->post('nama'),
			'kontak' => $this->input->post('kontak'),
			'email' => $this->input->post('email')
			);
		$where = array(
			'kdPengunjung' => $id
		);

		$this->m_buku->update_pgjg($where,$data,'pengunjung');
		redirect('admin/pengunjung');
	}
	public function cari(){
		$key = $this->input->post('inlineRadioOptions');
		$query = $this->input->post('cari');
		$data['title'] = 'Hasil Pencarian';

		if ($key == '1') {
			$data['buku'] = $this->m_buku->search_by('jdlBuku', $query)->result();
		}elseif ($key == '2') {
			$data['buku'] = $this->m_buku->search_by('nmKategori', $query)->result();
		}elseif ($key == null){
			$data['buku'] = $this->m_buku->search($query)->result();
		}
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('admin/templates/header',$data);
		$this->load->view('admin/templates/sidebar',$data);
		$this->load->view('admin/item',$data);
		$this->load->view('admin/templates/footer');
	}
}