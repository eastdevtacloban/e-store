<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data = [
			'title' => 'E-Store',
			'discoveries' => $this->Products->__getAllDiscoverItems(),
			'carts' => $this->Parcels->__getMyCartsItems()
		];
		// dd($data['discoveries']);
		$this->load->view('homepage/layouts/hpheader', $data);
		$this->load->view('homepage/homepagedashboard',  $data);
		$this->load->view('homepage/layouts/hpfooter');
	}
	public function logout()
	{
		session_destroy();		
		
		redirect('welcome/login');
	}
	public function signup()
	{
		$data = [
			'title' => 'E-Store'
		];

		$this->load->view('homepage/layouts/hpheader', $data);
		$this->load->view('homepage/auth/buyersignup', $data);
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
					'user_type' => 3,
					'is_active' => 1,
				);

		$adduser = $this->User->_setInsertUser($data);
				
				if ($adduser = 'success') {
					$this->session->set_flashdata('successmessage', 'Registration Successful!');
					redirect('buyer');
				}
				elseif($adduser = 'error'){
					$this->session->set_flashdata('errormessage', 'Unable to save the data.');
				}

	}
	public function login()
	{


		if (isset($_POST['login']))
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$canlogin = $this->User->canlogin($email, $password);
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
									'is_active' => $data['is_active']
								);	
							}

							$this->session->set_userdata($session_data);

							// $this->session->set_flashdata('successmessage', 'Welcome '.$this->session->userdata('first_name').' '.$this->session->userdata('last_name') );

								if ($this->session->userdata('user_type') == 3){
									redirect('welcome');
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
		$this->load->view('homepage/auth/buyerlogin',  $data);
		$this->load->view('homepage/layouts/hpfooter');
	}
	public function e_commerce()
	{
		$itemId  = $this->input->get('itemId');

		$data = [
			'title' => 'E-Store',
			'discovered' => $this->Products->__getSpecificItems($itemId),
			'carts' => $this->Parcels->__getMyCartsItems()
		];
		// dd($data['carts']);
		$this->load->view('homepage/layouts/hpheader', $data);
		$this->load->view('homepage/e-commerce/commerceview',  $data);
		$this->load->view('homepage/layouts/hpfooter');
	}
}
