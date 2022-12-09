<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class daftar_hp extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		public function index(){
			$data['title'] = 'Comphone - Daftar HP';

			$this->db->order_by('rand()');
			$data['brand'] = $this->db->get('tabel_brand')->result();

			$this->load->view('template/v_head', $data);
			$this->load->view('template/v_navbar', $data);
			$this->load->view('v_daftar_hp', $data);
			$this->load->view('template/v_footer');
			$this->load->view('template/v_foot');
		}
	}
