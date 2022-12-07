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
			$this->db->limit(5);
			$data['brand'] = $this->db->get('tabel_brand')->result();

			$this->load->view('template/v_head', $data);
			$this->load->view('template/v_navbar', $data);
			$this->load->view('v_beranda');
			$this->load->view('template/v_footer');
			$this->load->view('template/v_foot');
		}
	}
