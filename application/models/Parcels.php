<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Parcels extends CI_Model {

		private $table = 'parcel';

		public function _getAll()
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('buyerId =', $this->session->userdata('userId'));
			$this->db->where('parcelStatus !=', 3);
			$this->db->join('products', 'parcel.prodId = products.id');
			$query = $this->db->get();

			return $query->result_array();
		}
		public function __setAddToCart($data_parcel = array())
		{
			$response = $this->db->insert($this->table, $data_parcel);

			if( $response ){return 'success';}
			else{return 'error';}
		}
		public function __getMyCartsItems()
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('buyerId =', $this->session->userdata('userId'));
			$this->db->where('parcelStatus =', ' ');
			$this->db->join('products', 'parcel.prodId = products.id');
			$query = $this->db->get();

			return $query->result_array();
		}
		public function __getRemovedFromCart($id)
		{
			$this->db->where('parcelId =', $id);
			$delete = $this->db->delete($this->table);

			if ($delete) {
				return 'success';
			}else{
				return 'error';
			}
		}
		public function _setUpdateParcelToCheckout($pId, $data_array =array())
		{
			$this->db->where('parcelId =', $pId);
			$k = $this->db->update($this->table, $data_array);
			
			if ($k) {
				return 'success';
			}else{
				return 'error';
			}
		}
		public function __getMyIncommingOrder()
		{
			$this->db->select(
								'orderID', 
								'buyerId', 
								'parcelStatus'
							);
			$this->db->from($this->table);
			$this->db->where('buyerId =', $this->session->userdata('userId'));
			$this->db->distinct('orderID');
			$query = $this->db->get();

			return $query->result_array();
		}
		public function __getAllOfMyRequestsItems()
		{
			$this->db->select('*', 'products.productName', 'products.prodPrice',  'products.shippingFee');
			$this->db->from($this->table);
			$this->db->where('sellerId =', $this->session->userdata('userId'));
			$this->db->where('parcelStatus =', '1');
			$this->db->join('products', 'parcel.prodId = products.id');
			$query = $this->db->get();

			return $query->result_array();
		}
		public function __setUpdateToApprovedItems($id)
		{
			$parcelStatus = array(
				'parcelStatus' => '2'	
			);

			$this->db->where('parcelId =', $id);
			$k = $this->db->update($this->table, $parcelStatus);
			
			if ($k) {
				return 'success';
			}else{
				return 'error';
			}
		}
		public function _setUpdateParcelToReceived($parcelId, $data_array = array())
		{
			$this->db->where('parcelId =', $parcelId);
			$k = $this->db->update($this->table, $data_array);
			
			if ($k) {
				return 'success';
			}else{
				return 'error';
			}
		}
	}
?>