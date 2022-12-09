<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class cari extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		public function index(){
      $cari    			 = $this->input->get('key');
			$data['title'] = 'Comphone - '.$cari;

			$this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
			$this->db->join('tabel_brand', 'tabel_brand.id_brand = tabel_hp.id_brand');
			$this->db->like('nama_brand', $cari);
			$this->db->or_like('nama_hp', $cari);
			$data['hp'] = $this->db->get('tabel_hp')->result();

			$this->load->view('template/v_head', $data);
			$this->load->view('template/v_navbar', $data);
			$this->load->view('v_cari', $data);

			if(count($data['hp']) < 3){
				$this->load->view('template/v_sticky_footer_2');
			}
			elseif(count($data['hp']) > 4){
				$this->load->view('template/v_footer');
			}
			else{
				$this->load->view('template/v_sticky_footer_1');
			}

			$this->load->view('template/v_foot');
		}

    public function hp(){
			$cari = $this->input->post('cari');

      if($cari){
        $this->db->join('tabel_brand', 'tabel_brand.id_brand = tabel_hp.id_brand');
        $this->db->like('nama_brand', $cari);
        $this->db->or_like('nama_hp', $cari);
        $hp = $this->db->get('tabel_hp')->result();

        foreach($hp as $key){
          $this->db->limit(1);
          $this->db->order_by('id_pencarian', 'DESC');
          $pencarian = $this->db->get('tabel_pencarian')->row_array();

          if($pencarian){
            $id_pencarian = $pencarian['id_pencarian'] + 1;
          }
          else{
            $id_pencarian = 1;
          }

          $data = [
            'id_pencarian' => $id_pencarian,
            'id_hp'        => $key->id_hp,
            'id_brand'     => $key->id_brand
          ];
          $this->db->insert('tabel_pencarian', $data);
        }

        redirect('hasil-pencarian?key='.$cari);
      }
      else{
        $this->session->set_flashdata('gagal', 'Tidak ada kata kunci yang dicari.');
        redirect($_SERVER['HTTP_REFERER']);
      }
		}
	}
