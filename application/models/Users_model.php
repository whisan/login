<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllUsers(){
			$query = $this->db
			->select("*")
			->from('tbl_users u')
			->join('user_details ud','u.user_id=ud.user_id','left')
			#->where('')
			->get();
			return $query->result();
		}

		public function insertuser($user){
			$this->db->insert('tbl_users', $user);
			return $this->db->insert_id();
		}

		public function insertuser_details($user){
			return $this->db->insert('user_details', $user);

		}

		public function getUser($id){

			$query = $this->db
						->select('*')
						->from('tbl_users u')
						->join('user_details ud','u.user_id=ud.user_id','left')
						->where(array('u.user_id'=>$id))
						->get();
			
			return $query->first_row();
		}

		public function getUserView($id){
			/*$this->db->where('user_id', $id);*/
			$query = $this->db
						->select('*')
						->from('tbl_users u')
						->join('user_details ud','u.user_id=ud.user_id','left')
						->where(array('u.user_id'=>$id))
						->get();
			return $query->first_row();
		}

		public function updateuser($user, $id){
			$this->db->where('tbl_users.user_id', $id);
			return $this->db->update('tbl_users',$user);
		}

		public function updateuser_details($user,$id){
			$this->db->where('user_details.user_id', $id);
			return $this->db->update('user_details',$user);
		}

		public function deleteuser($id){
			$this->db->where('user_id', $id);
			$delete_user = $this->db->update('tbl_users', ['status' => 0]);

			if($this->db->affected_rows() > 0) return true;
		}

		public function getLogs(){
			$query = $this->db
			->select("*")
			->from('logs')
			#->where('')
			->get();
			return $query->result();

		}

	}
