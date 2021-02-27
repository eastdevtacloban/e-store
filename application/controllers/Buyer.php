<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer extends CI_Controller {

	public function __construct()
	{
		Parent::__construct();
		if (!$this->session->userdata('userId') or  $this->session->userdata('user_type') == 1 or $this->session->userdata('user_type') == 2)  
			{
				redirect('welcome/login');
			}
	}

	public function index()
	{
		$data = [
			'carts' => $this->Parcels->__getMyCartsItems()
		];

		$this->load->view('buyermodule/layouts/bheader', $data);
		$this->load->view('buyermodule/buyerdashboard',  $data);
		$this->load->view('buyermodule/layouts/bfooter');
	}
	public function myorder()
	{
		$data = [
			'carts' => $this->Parcels->__getMyCartsItems(),
			'myorder' => $this->Parcels->__getMyIncommingOrder(),
			'orders' => $this->Parcels->_getAll()
		];
		// dd($data['myorder']);
		$this->load->view('buyermodule/layouts/bheader', $data);
		$this->load->view('buyermodule/layouts/myorder',  $data);
		$this->load->view('buyermodule/layouts/bfooter');	
	}
	public function addcart()
	{
		$itemId = $this->input->get('itemId');
		
		$data_parcel = array(
			'prodId' =>  $itemId,
			'sellerId' => $this->input->post('sellerId'),
			'buyerId' =>  $this->session->userdata('userId'),
			'chooseColor' =>  $this->input->post('chooseColor'),
			'chooseSize' =>  $this->input->post('chooseSize'),
			'is_wantQty' =>  $this->input->post('is_wantQty')
 		);
		$is_ok = $this->Parcels->__setAddToCart($data_parcel);

		if ($is_ok =='success') {
			$this->session->set_flashdata('successmessage', 'Save Products Successful!');
		}elseif ($is_ok =='error') {
			$this->session->set_flashdata('errormessage', 'Error Occured!');
		}
		redirect('welcome/e_commerce?itemId='.$itemId);
	}
	public function mycart()
	{
		$data = [
			'carts' => $this->Parcels->__getMyCartsItems()
		];

		$this->load->view('buyermodule/layouts/bheader', $data);
		$this->load->view('buyermodule/layouts/mycart',  $data);
		$this->load->view('buyermodule/layouts/bfooter');	
	}
	public function checkout()
	{
		$prodId_array = serialize($this->input->post('parcelId'));
		
		if (!empty($this->input->post('parcelId'))) {
			$data = [
				'carts' => $this->Parcels->__getMyCartsItems(),
				'buyerInfo' => $this->User->__getMyInformations(),
				'unseritemsId' => $prodId_array 
			];

			$this->load->view('buyermodule/layouts/bheader', $data);
			$this->load->view('buyermodule/checkoutpage/checkoutindex',  $data);
			$this->load->view('buyermodule/layouts/bfooter');	
		}else{
			$this->session->set_flashdata('errormessage', 'Select Items!');
			redirect('buyer/mycart');
		}
	}
	public function settings()
	{
		if (isset($_POST['Ssavechanges']))
		{
			$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'mid_name' => $this->input->post('mid_name'),
					'userAddress' => $this->input->post('userAddress'),
					'contactNo' => $this->input->post('contactNo'),
					'email' => $this->input->post('email')
				);

				$adduser = $this->User->_setUpdaeMyInfo($data);
				
				if ($adduser = 'success') {
					$this->session->set_flashdata('successmessage', 'Registration Successful!');
				}
				elseif($adduser = 'error'){
					$this->session->set_flashdata('errormessage', 'Unable to save the data.');
				}
		}

		$data = [
			'carts' => $this->Parcels->__getMyCartsItems(),
			'buyerInfo' => $this->User->__getMyInformations()
		];
		// dd($data['buyerInfo']);
		$this->load->view('buyermodule/layouts/bheader', $data);
		$this->load->view('buyermodule/layouts/setting',  $data);
		$this->load->view('buyermodule/layouts/bfooter');	
	}
	public function removed_item_to_cart()
	{
		$id =  $this->input->get('id');
		// dd($id);
		$is_ok = $this->Parcels->__getRemovedFromCart($id);

		if ($is_ok =='success') {
			$this->session->set_flashdata('successmessage', 'Deleted !');
		}elseif ($is_ok =='error') {
			$this->session->set_flashdata('errormessage', 'Error Occured!');
		}
		redirect('buyer/mycart');
	}
	public function checkout_cart_item()
	{
		$parcelId =  unserialize($this->input->post('unseritemsId'));

		foreach ($parcelId as $pId) {
			$data_array =  array(
				'orderID' => 'ES-'.date('ydmi'),
				'parcelStatus' =>  '1'
			);
			$this->Parcels->_setUpdateParcelToCheckout($pId, $data_array);
		}
		redirect('buyer/myorder');
	}
	public function received_item()
	{
		$parcelId =  $this->input->get('id');

			$data_array =  array(
				'parcelStatus' =>  '3'
			);

		$this->Parcels->_setUpdateParcelToReceived($parcelId, $data_array);

		redirect('buyer/myorder');
	}
}