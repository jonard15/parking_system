<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$user_data=$this->db->get('users');
		return $user_data->result();
	}

	public function getUserGroup($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ?";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}
	}

	public function editprofile($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($group_id) {
			// user group
			$update_user_group = array('group_id' => $group_id);
			$this->db->where('user_id', $id);
			$user_group = $this->db->update('user_group', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function create()
	{
		$password = $this->password_hash($this->input->post('user_password'));
		$data = array(
			'username' 	=> $this->input->post('user_name'),
			'email' => $this->input->post('user_email'),
			'password' => $password,
			'firstname' => $this->input->post('user_firstName'),
			'lastname' => $this->input->post('user_lastName'),
			'phone' => $this->input->post('user_phone'), 
		);
		$result=$this->db->insert('users',$data);
		return $result;
	}

	public function edit()
	{
		$user_id=$this->input->post('user_id');
		$user_name=$this->input->post('user_name');
		$user_email=$this->input->post('user_email');
		$user_firstname=$this->input->post('user_firstname');
		$user_lastname=$this->input->post('user_lastname');
		$user_phone=$this->input->post('user_phone');
		$password = $this->password_hash($this->input->post('user_password'));

		$this->db->set('username', $user_name);
		$this->db->set('email', $user_email);
		$this->db->set('firstname', $user_firstname);
		$this->db->set('lastname', $user_lastname);
		$this->db->set('phone', $user_phone);
		$this->db->set('password', $password);
		$this->db->where('id', $user_id);
		$result=$this->db->update('users');
		return $result;
	}

	public function delete()
	{
		$user_id=$this->input->post('user_id');
		$this->db->where('id', $user_id);
		$result=$this->db->delete('users');
		return $result;
	}
}