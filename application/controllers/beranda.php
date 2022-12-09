<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class beranda extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		public function index(){
			$data['title'] = 'Comphone';

			$this->db->order_by('rand()');
			$this->db->limit(2);
			$data['brand'] = $this->db->get('tabel_brand')->result();

			$this->db->select('(SELECT COUNT(tabel_pencarian.id_hp)) AS total_pencarian,
												 tabel_hp.id_hp, nama_hp, nama_brand, foto_hp, harga');
			$this->db->join('tabel_hp', 'tabel_hp.id_hp = tabel_pencarian.id_hp');
			$this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_pencarian.id_hp');
			$this->db->join('tabel_brand', 'tabel_brand.id_brand = tabel_pencarian.id_brand');
			$this->db->group_by('tabel_pencarian.id_hp');
			$this->db->order_by('total_pencarian', 'DESC');
			$this->db->limit(10);
			$data['populer'] = $this->db->get('tabel_pencarian')->result();

			$this->load->view('template/v_head', $data);
			$this->load->view('template/v_navbar', $data);
			$this->load->view('v_beranda', $data);
			$this->load->view('template/v_footer');
			$this->load->view('template/v_foot');
		}
	}
