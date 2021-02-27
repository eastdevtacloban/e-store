<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retailer extends CI_Controller {

	public function __construct()
	{
		Parent::__construct();
		if (!$this->session->userdata('userId') or  $this->session->userdata('user_type') == 1 or $this->session->userdata('user_type') == 3)  
			{
				redirect('seller/login');
			}
	}

	public function index()
	{
		$data = [
			'requestItems' => $this->Parcels->__getAllOfMyRequestsItems()
		];
		// dd($data['requestItems']);
		$this->load->view('sellermodule/layouts/sheader',  $data);
		$this->load->view('sellermodule/sellerdashboard', $data);
		$this->load->view('sellermodule/layouts/sfooter');
	}
	public function insert_stocks()
	{
		$data = [
			'categories' => $this->Categories->__getAllCategories()
		];
		// var_dump($data);
		$this->load->view('sellermodule/layouts/sheader');
		$this->load->view('sellermodule/layouts/insertingstocksform', $data);
		$this->load->view('sellermodule/layouts/sfooter');
	}
	public function myStoks()
	{
		$this->load->view('sellermodule/layouts/sheader');
		$this->load->view('sellermodule/layouts/mystocks');
		$this->load->view('sellermodule/layouts/sfooter');
	}
	public function sales()
	{
		$this->load->view('sellermodule/layouts/sheader');
		$this->load->view('sellermodule/layouts/sales');
		$this->load->view('sellermodule/layouts/sfooter');
	}
	public function savestock()
	{
		$config['upload_path']      = 'assets/productimage/';
		$config['allowed_types']    = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		$this->upload->do_upload('prodImage');

		$path =  'assets/productimage';
		$file_path = $path.'/'.$this->upload->data('file_name');

		$prod_data = array(
					'prodImage' => $file_path,
					'userId' => $this->session->userdata('userId'),
					'productName' => $this->input->post('productName'),
					'productDescription' => $this->input->post('productDescription'),
					'catID' => $this->input->post('catID'),
					'prodPrice' => $this->input->post('prodPrice'),
					'shippingFee' => $this->input->post('shippingFee'),
					'prodCondiion' => $this->input->post('prodCondiion'),
					'prodColor' => serialize($this->input->post('prodColor')),
					'prodSize' => serialize($this->input->post('prodSize')),
					'prodStockQty' => $this->input->post('prodStockQty')
				);

		$is_ok = $this->Products->__setUploadProducts($prod_data);


		if ($is_ok =='success') {
			$this->session->set_flashdata('successmessage', 'Save Products Successful!');
		}elseif ($is_ok =='error') {
			$this->session->set_flashdata('errormessage', 'Error Occured!');
		}
		redirect('retailer/insert_stocks');
	}
	public function mystore()
	{
		$data = [
			'inventory' => $this->Products->_getMyInventory(),
			'categories' => $this->Categories->__getAllCategories()
		];
		// dd($data['inventory']);

		$this->load->view('sellermodule/layouts/sheader');
		$this->load->view('sellermodule/layouts/mystore', $data);
		$this->load->view('sellermodule/layouts/sfooter');
	}
	public function remove_item()
	{
		$id =  $this->input->get('id');

		$is_ok = $this->Products->__getDeleteStocks($id);

		if ($is_ok =='success') {
			$this->session->set_flashdata('successmessage', 'Deleted !');
		}elseif ($is_ok =='error') {
			$this->session->set_flashdata('errormessage', 'Error Occured!');
		}
		redirect('retailer/mystore');
	}
	public function approved_requestitems()
	{
		$id =  $this->input->get('id');

		$is_ok = $this->Parcels->__setUpdateToApprovedItems($id);

		if ($is_ok =='success') {
			$this->session->set_flashdata('successmessage', 'OK !');
		}elseif ($is_ok =='error') {
			$this->session->set_flashdata('errormessage', 'Error Occured!');
		}
		redirect('retailer');
	}
}