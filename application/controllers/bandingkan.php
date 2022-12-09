<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class bandingkan extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		public function index($id_hp_1 = null, $id_hp_2 = null){
      $data['title'] 	 = 'Comphone - Bandingkan';
			$data['hp']		 	 = $this->db->get('tabel_hp')->result();
			$data['id_hp_1'] = $id_hp_1;
			$data['id_hp_2'] = $id_hp_2;

			$this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
      $this->db->where('tabel_hp.id_hp', $id_hp_1);
			$data['hp_1'] = $this->db->get('tabel_hp')->row_array();

			$this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
      $this->db->where('tabel_hp.id_hp', $id_hp_2);
			$data['hp_2'] = $this->db->get('tabel_hp')->row_array();

			$this->load->view('template/v_head', $data);
			$this->load->view('template/v_navbar', $data);
			$this->load->view('v_bandingkan', $data);

			if(($id_hp_1 == null) AND ($id_hp_2 == null)){
				$this->load->view('template/v_sticky_footer_2');
			}
			else{
				$this->load->view('template/v_footer');
			}

			$this->load->view('template/v_foot');
		}

		public function buka(){
			$id_hp_1 = $this->input->post('id_hp_1');
			$id_hp_2 = $this->input->post('id_hp_2');

			if(!$id_hp_1 OR !$id_hp_2){
				$this->session->set_flashdata('gagal', 'Silahkan pilih 2 gadget untuk dibandingkan.');
				redirect('bandingkan');
			}
			else{
				redirect('bandingkan/'.$id_hp_1.'/'.$id_hp_2);
			}
		}
	}
