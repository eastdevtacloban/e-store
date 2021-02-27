<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Model {

		private $table = 'users';

		public function canlogin($email, $password)
		{
			$hash_password = sha1($password);
	
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('email', $email);
			$this->db->where('password', $hash_password);
			$this->db->where('is_active', 1);
			$query = $this->db->get();

			return $query->result_array();
		}
		public function cansellerlogin($contactNo, $password)
		{
			$hash_password = sha1($password);
	
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('contactNo', $contactNo);
			$this->db->where('password', $hash_password);
			$this->db->where('is_active', 1);
			$query = $this->db->get();

			return $query->result_array();
		}
		public function _setInsertUser($data = array())
		{
			$response = $this->db->insert('users', $data);

			if( $response )
				{
					return 'success';
				}
			else
				{
					return 'error';
				}	
		}
		public function __getMyInformations()
		{
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('userId =', $this->session->userdata('userId'));
			$query = $this->db->get();

			return $query->row_array();
		}
		public function _setUpdaeMyInfo($data = array())
		{
			$this->db->where('userId =', $this->session->userdata('userId'));
			$k = $this->db->update($this->table, $data);
			
			if ($k) {
				return 'success';
			}else{
				return 'error';
			}
		}
	}
?>