<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class spesifikasi extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		public function index($id_hp){
      $this->db->join('tabel_brand', 'tabel_brand.id_brand = tabel_hp.id_brand');
      $this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
      $this->db->where('tabel_hp.id_hp', $id_hp);
      $data['hp'] 	 = $this->db->get('tabel_hp')->row_array();
			$data['title'] = 'Comphone - '.$data['hp']['nama_hp'];

			if($data['hp']){
				$this->load->view('template/v_head', $data);
				$this->load->view('template/v_navbar', $data);
				$this->load->view('v_spesifikasi', $data);
				$this->load->view('template/v_footer');
				$this->load->view('template/v_foot');
			}
			else{
				$this->session->set_flashdata('gagal', 'Halaman tidak valid.');
        redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
