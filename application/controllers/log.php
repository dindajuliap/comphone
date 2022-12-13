<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class log extends CI_Controller{
		public function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

    public function masuk(){
			$data['title'] = 'Admin Panel - Masuk';

			$this->form_validation->set_rules('email_akun', 'Email', 'required|trim|valid_email');
			$this->form_validation->set_rules('kata_sandi', 'Kata sandi', 'required|trim');

			if($this->form_validation->run() == FALSE){
				$this->load->view('template/v_head', $data);
				$this->load->view('admin/v_masuk');
				$this->load->view('template/v_foot');
			}
			else{
				$email_akun = strtolower($this->input->post('email_akun'));
				$kata_sandi = $this->input->post('kata_sandi');

				if($email_akun == 'comphone.id@gmail.com'){
					if($kata_sandi == '*AdminComphone*'){
						$data = [ 'status_masuk' => TRUE ];
						$this->session->set_userdata($data);
						$this->session->set_flashdata('sukses','Selamat datang, Admin!');
						redirect('admin/brand');
					}
					else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show alert-dismissible fade show" role="alert">Kata sandi salah.</div>');
            redirect('admin/masuk');
					}
				}
				else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show alert-dismissible fade show" role="alert">Email atau kata sandi salah.</div>');
					redirect('admin/masuk');
				}
			}
		}

    public function keluar(){
      $this->session->unset_userdata('status_masuk');
      $this->session->set_flashdata('sukses', 'Anda telah keluar!');
      redirect('admin/masuk');
		}
  }
