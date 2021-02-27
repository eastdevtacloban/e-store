<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Categories extends CI_Model {

		private $table = 'productcategories';

		public function __getAllCategories()
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$query = $this->db->get();

			return $query->result_array();
		}
	}
?>