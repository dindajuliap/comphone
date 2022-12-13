<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
			check_not_login();
		}

		public function brand(){
			$data['title'] = 'Admin Panel - Data Brand';

			$this->db->order_by('nama_brand', 'ASC');
			$data['daftar'] = $this->db->get('tabel_brand')->result();

      $this->load->view('admin/template/v_head', $data);
      $this->load->view('admin/template/v_navbar', $data);
			$this->load->view('admin/template/v_sidebar');
			$this->load->view('admin/v_brand', $data);

			if($data['daftar'] AND COUNT($data['daftar']) > 5){
				$this->load->view('admin/template/v_footer');
			}
			else{
				$this->load->view('admin/template/v_sticky_footer');
			}

			$this->load->view('admin/template/v_foot');
		}

		public function tambah_brand(){
			$nama_brand = $this->input->post('nama_brand');
			$cek_brand	= $this->db->get_where('tabel_brand', ['nama_brand' => $nama_brand])->row_array();

			if($cek_brand){
				$this->session->set_flashdata('gagal','Brand sudah terdata.');
			}
			else{
				$this->db->limit(1);
				$this->db->order_by('id_brand', 'DESC');
				$brand = $this->db->get('tabel_brand')->row_array();

				if($brand){
					$id_brand = $brand['id_brand'] + 1;
				}
				else{
					$id_brand = 1;
				}

				$data = [
					'id_brand' => $id_brand,
					'nama_brand' => $nama_brand
				];
				$this->db->insert('tabel_brand', $data);
				$this->session->set_flashdata('sukses','Brand telah ditambahkan.');
			}
			redirect('admin/brand');
		}

		public function ubah_brand(){
			$id_brand 	= $this->input->post('id_brand');
			$nama_brand = $this->input->post('nama_brand');

			$this->db->where_not_in('id_brand', $id_brand);
			$this->db->where('nama_brand', $nama_brand);
			$cek_brand	= $this->db->get('tabel_brand')->row_array();

			if($cek_brand){
				$this->session->set_flashdata('gagal','Brand sudah terdata.');
			}
			else{
				$this->db->set('nama_brand', $nama_brand);
				$this->db->where('id_brand', $id_brand);
				$this->db->update('tabel_brand');
				$this->session->set_flashdata('sukses','Brand telah diubah.');
			}
			redirect('admin/brand');
		}

		public function hapus_brand($id_brand){
			$this->db->where('id_brand', $id_brand);
			$this->db->delete('tabel_brand');

			$this->session->set_flashdata('sukses','Brand telah dihapus.');
			redirect('admin/brand');
		}

		public function gadget(){
			$data['title'] = 'Admin Panel - Data Gadget';
			$data['brand'] = $this->db->get('tabel_brand')->result();

			$this->db->join('tabel_brand', 'tabel_brand.id_brand = tabel_hp.id_brand');
			$this->db->join('tabel_spek', 'tabel_spek.id_hp = tabel_hp.id_hp');
			$this->db->order_by('nama_brand', 'ASC');
			$data['daftar'] = $this->db->get('tabel_hp')->result();

      $this->load->view('admin/template/v_head', $data);
      $this->load->view('admin/template/v_navbar', $data);
			$this->load->view('admin/template/v_sidebar');
			$this->load->view('admin/v_gadget', $data);

			if($data['daftar'] AND COUNT($data['daftar']) > 5){
				$this->load->view('admin/template/v_footer');
			}
			else{
				$this->load->view('admin/template/v_sticky_footer');
			}

			$this->load->view('admin/template/v_foot');
		}

		public function tambah_gadget(){
			$id_brand 			= $this->input->post('id_brand');
			$nama_hp  			= $this->input->post('nama_hp');
			$tgl_rilis  		= $this->input->post('tgl_rilis');
			$sistem_operasi = $this->input->post('sistem_operasi');
			$chipset  			= $this->input->post('chipset');
			$memori  				= $this->input->post('memori');
			$ukuran_layar  	= $this->input->post('ukuran_layar');
			$daya_baterai  	= $this->input->post('daya_baterai');
			$kamera  				= $this->input->post('kamera');
			$jaringan  			= strtoupper($this->input->post('jaringan'));
			$harga  				= $this->input->post('harga');
			$warna  				= $this->input->post('warna');
			$cek_hp					= $this->db->get_where('tabel_hp', ['nama_hp' => $nama_hp, 'id_brand' => $id_brand])->row_array();

			if($cek_hp){
				$this->session->set_flashdata('gagal','Gadget sudah terdata.');
			}
			else{
				$this->db->limit(1);
				$this->db->order_by('id_hp', 'DESC');
				$hp = $this->db->get('tabel_hp')->row_array();

				if($hp){
					$id_hp = $hp['id_hp'] + 1;
				}
				else{
					$id_hp = 1;
				}

				$data_hp = [
					'id_hp' 	 => $id_hp,
					'id_brand' => $id_brand,
					'nama_hp'  => $nama_hp
				];

				$data_spek = [
					'id_hp' 				 => $id_hp,
					'id_brand' 			 => $id_brand,
					'tgl_rilis' 		 => $tgl_rilis,
					'sistem_operasi' => $sistem_operasi,
					'chipset' 			 => $chipset,
					'memori' 				 => $memori,
					'ukuran_layar' 	 => $ukuran_layar,
					'daya_baterai' 	 => $daya_baterai,
					'kamera'				 => $kamera,
					'jaringan'			 => $jaringan,
					'harga'					 => $harga,
					'warna'					 => $warna
				];
				$this->db->insert('tabel_hp', $data_hp);
				$this->db->insert('tabel_spek', $data_spek);
				$this->session->set_flashdata('sukses','Gagdet telah ditambahkan.');
			}
			redirect('admin/gadget');
		}

		public function ubah_gadget(){
			$id_hp 					= $this->input->post('id_hp');
			$id_brand 			= $this->input->post('id_brand');
			$nama_hp  			= $this->input->post('nama_hp');
			$tgl_rilis  		= $this->input->post('tgl_rilis');
			$sistem_operasi = $this->input->post('sistem_operasi');
			$chipset  			= $this->input->post('chipset');
			$memori  				= $this->input->post('memori');
			$ukuran_layar  	= $this->input->post('ukuran_layar');
			$daya_baterai  	= $this->input->post('daya_baterai');
			$kamera  				= $this->input->post('kamera');
			$jaringan  			= strtoupper($this->input->post('jaringan'));
			$harga  				= $this->input->post('harga');
			$warna  				= $this->input->post('warna');

			$this->db->where_not_in('id_hp', $id_hp);
			$this->db->where('nama_hp', $nama_hp);
			$this->db->where('id_brand', $id_brand);
			$cek_hp	= $this->db->get('tabel_hp')->row_array();

			if($cek_hp){
				$this->session->set_flashdata('gagal','Gadget sudah terdata.');
			}
			else{
				$data_hp = [
					'id_brand' => $id_brand,
					'nama_hp'  => $nama_hp
				];
				$this->db->where('id_hp', $id_hp);
				$this->db->update('tabel_hp', $data_hp);

				$data_spek = [
					'id_brand' 			 => $id_brand,
					'tgl_rilis' 		 => $tgl_rilis,
					'sistem_operasi' => $sistem_operasi,
					'chipset' 			 => $chipset,
					'memori' 				 => $memori,
					'ukuran_layar' 	 => $ukuran_layar,
					'daya_baterai' 	 => $daya_baterai,
					'kamera'				 => $kamera,
					'jaringan'			 => $jaringan,
					'harga'					 => $harga,
					'warna'					 => $warna
				];
				$this->db->where('id_hp', $id_hp);
				$this->db->update('tabel_spek', $data_spek);

				$this->session->set_flashdata('sukses','Gagdet telah diubah.');
			}
			redirect('admin/gadget');
		}

		public function hapus_gadget($id_hp){
			$this->db->where('id_hp', $id_hp);
			$this->db->delete('tabel_hp');

			$this->session->set_flashdata('sukses','Gadget telah dihapus.');
			redirect('admin/gadget');
		}

		public function pencarian(){
			$data['title'] = 'Admin Panel - Data Pencarian';

			$this->db->select('(SELECT COUNT(tabel_pencarian.id_hp)) AS total_pencarian, nama_hp');
			$this->db->join('tabel_hp', 'tabel_hp.id_hp = tabel_pencarian.id_hp');
			$this->db->group_by('tabel_pencarian.id_hp');
			$this->db->order_by('total_pencarian', 'DESC');
			$data['daftar'] = $this->db->get('tabel_pencarian')->result();

      $this->load->view('admin/template/v_head', $data);
      $this->load->view('admin/template/v_navbar', $data);
			$this->load->view('admin/template/v_sidebar');
			$this->load->view('admin/v_pencarian', $data);

			if($data['daftar'] AND COUNT($data['daftar']) > 5){
				$this->load->view('admin/template/v_footer');
			}
			else{
				$this->load->view('admin/template/v_sticky_footer');
			}

			$this->load->view('admin/template/v_foot');
		}
	}
