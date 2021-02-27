<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	public function signup()
	{
		$data = [
			'title' => 'E-Store'
		];

		$this->load->view('homepage/layouts/hpheader',  $data);
		$this->load->view('homepage/auth/sellersignup');
		$this->load->view('homepage/layouts/hpfooter');
	}
	public function register()
	{
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'mid_name' => $this->input->post('mid_name'),
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'user_type' => 2,
					'is_active' => 1,
					'contactNo' => $this->input->post('contactNo'),
					'current_location' => $this->input->post('current_location'),
					'product_focus' => $this->input->post('product_focus')
				);

		$adduser = $this->User->_setInsertUser($data);
				
				if ($adduser = 'success') {
					$this->session->set_flashdata('successmessage', 'Registration Successful!');
					redirect('seller/login');
				}
				elseif($adduser = 'error'){
					$this->session->set_flashdata('errormessage', 'Unable to save the data.');
				}
	}
	public function login()
	{
		if (isset($_POST['sellerlogin']))
		{
			$contactNo = $this->input->post('contactNo');
			$password = $this->input->post('password');

			$canlogin = $this->User->cansellerlogin($contactNo, $password);
			// var_dump($canlogin);
						if ($canlogin)
						{
							foreach ($canlogin as $key => $data)
							{
								$session_data = array(
									'userId' => $data['userId'],
									'first_name' => $data['first_name'],
									'last_name' => $data['last_name'],
									'mid_name' => $data['mid_name'],
									'email' => $data['email'],
									'user_type' => $data['user_type'],
									'is_active' => $data['is_active'],
									'contactNo' => $data['contactNo'],
									'current_location' => $data['current_location'],
									'product_focus' => $data['product_focus']
								);	
							}

							$this->session->set_userdata($session_data);

							// $this->session->set_flashdata('successmessage', 'Welcome '.$this->session->userdata('first_name').' '.$this->session->userdata('last_name') );

								if ($this->session->userdata('user_type') == 1){
									redirect('admin');
								}
								elseif ($this->session->userdata('user_type') == 2){
									redirect('retailer');
								}
								elseif ($this->session->userdata('user_type') == 3){
									redirect('buyer');
								}
								else{
									$this->session->set_flashdata('errormessage', 'User Dont Exist');
								}

						}else
						{
							$this->session->set_flashdata('errormessage', 'Invalid Email or Password');
						}	
		}

		$data = [
			'title' => 'E-Store'
		];

		$this->load->view('homepage/layouts/hpheader', $data);
		$this->load->view('homepage/auth/sellerlogin');
		$this->load->view('homepage/layouts/hpfooter');
	}
	public function logout()
	{
		session_destroy();		
		
		redirect('seller/login');
	}
}