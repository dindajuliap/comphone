<?php
	function check_not_login(){
		$ci =& get_instance();
		$user_session = $ci->session->userdata('status_masuk');

		if(!$user_session){
			$ci->session->set_flashdata('error','Kamu tidak memiliki akses ke halaman ini.');
			redirect(base_url());
		}
	}
