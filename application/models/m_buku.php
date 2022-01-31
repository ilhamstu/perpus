<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model{


	public function buku(){
		$this->db->select('*')->from('buku');
		return $this->db->get();
	}

	public function get_total() 
	{
		return $this->db->count_all('buku');
	}

	public function pengunjung(){
		$this->db->select('*')->from('pengunjung');
		return $this->db->get();
	}
	public function search_by($id,$data){
		// $jdl = $this->input->post('inlineRadioOptions');
		// $q = $this->input->post('cari');
		// $this->db->select('*');
		// $this->db->from('buku');
		// $this->db->join('kategori','kategori.kdKategori= buku.kdKategori');
		// if($jdl == 1){
		// $this->db->where('jdlBuku', $q);	
		// }else if($jdl == 2){
		// $this->db->where('nmKategori', $q );
		// }
		// $query = $this->db->get();
		// return $query;

		$this->db->like($id,$data);
		$this->db->join('kategori','kategori.kdkategori=buku.kdKategori');
		return $this->db->get('buku');
	}

	public function search($data){
		$this->db->or_like('jdlBuku',$data);
		$this->db->or_like('nmKategori',$data);
		$this->db->join('kategori','kategori.kdkategori=buku.kdKategori');
		return $this->db->get('buku');
	}
	public function tampil_data(){
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori','kategori.kdKategori= buku.kdKategori');
		$this->db->order_by('jdlBuku', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function tampil_data_limit($limit, $offset){
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori','kategori.kdKategori= buku.kdKategori');
		$this->db->order_by('jdlBuku', 'ASC');
		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query;
	}

	public function tampil_pinjam(){
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->join('buku','peminjaman.kdBuku=buku.kdBuku');
		$this->db->join('pengunjung','peminjaman.kdPengunjung=pengunjung.kdPengunjung');
		$query = $this->db->get();
		return $query;
	}

	public function tampil_ktgr(){
		$this->db->select('*')->from('kategori');
		return $this->db->get();
	}

	public function tambah_data(){
		$data = array(
			'kdBuku' => "",
			'jdlBuku' => $this->input->post('jdl'),
			'stok' => $this->input->post('stok'),
			'kdKategori' => $this->input->post('kategori'),
			'rak' => $this->input->post('rak')
			);
		$this->db->insert('buku',$data);
		redirect('admin/item');
	}	
	
	public function tambah_ktgr(){
		$data = array(
			'kdKategori'	=> "",
			'nmKategori'	=> $this->input->post('ktgr')
		);
		$this->db->insert('kategori',$data);
		redirect('admin/item');
	}

	public function tambah_pgjg(){
		$data = array(
			'kdPengunjung'	=> "",
			'nmPengunjung'	=> $this->input->post('nama'),
			'kontak'		=> $this->input->post('kontak'),
			'email'			=> $this->input->post('email')
		);
		$this->db->insert('pengunjung',$data);
	}
	
	public function tambah_pinjam(){
		$pinjam = array(
				'kdPeminjaman' => '',
				'kdPengunjung' => $this->input->post('nama'),
				'kdBuku' => $this->input->post('buku'),
				'tgl_pinjam' => $this->input->post('T_pinj'),
				'tgl_kembali' => $this->input->post('T_kem')
			);
		$this->db->insert('peminjaman', $pinjam);
		redirect('admin/peminjaman');
	}
	public function hapus_buku($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_pgjg($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_pinjam($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_buku($where, $table){
		return $this->db->get_where($table, $where);
	}
	public function update_buku($where, $data, $table){
	return $this->db->where($where)->update($table,$data);
	}
	public function edit_pgjg($where, $table){
		return $this->db->get_where($table,$where);
	}
	public function update_pgjg($where,$data,$table){
		return $this->db->where($where)->update($table,$data);
	}
}