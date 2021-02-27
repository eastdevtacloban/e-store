<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Products extends CI_Model {

		private $table = 'products';


		public function __getAllDiscoverItems()
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('prodStockQty !=', ' ');
			$this->db->join('productcategories', 'products.catId = productcategories.cid');

			$query = $this->db->get();

			return $query->result_array();
		}
		public function __getSpecificItems($itemId)
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('id', $itemId);
			$this->db->where('prodStockQty !=', ' ');
			$this->db->join('productcategories', 'products.catId = productcategories.cid');

			$query = $this->db->get();

			return $query->row_array();
		}
		public function __setUploadProducts($prod_data = array())
		{
			$response = $this->db->insert($this->table, $prod_data);

			if( $response ){return 'success';}
			else{return 'error';}	
		}
		public function _getMyInventory()
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('userId =', $this->session->userdata('userId'));
			$this->db->join('productcategories', 'products.catId = productcategories.cid');

			$query = $this->db->get();

			return $query->result_array();
		}
		public function __getDeleteStocks($id)
		{
			$this->db->where('id =', $id);
			$delete = $this->db->delete($this->table);

			if ($delete) {
				return 'success';
			}else{
				return 'error';
			}
		}
	}
?>