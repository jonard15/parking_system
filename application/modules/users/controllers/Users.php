<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
		
		$this->load->model('model_users');
		$this->load->model('model_groups');
	}

	public function index()
	{

		if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$this->render_template('users/index', $this->data);
	}

	public function user_data(){
		
		$data=$this->model_users->getUserData();
		echo json_encode($data);
	}

	public function create()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_users->create();
		echo json_encode($data);
		
	}

	public function edit()
	{
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_users->edit();
		echo json_encode($data);
	}

	public function delete()
	{

		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_users->delete();
		echo json_encode($data);
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function profile()
	{
		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        	);

		        	$update = $this->model_users->editprofile($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/profile/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/profile/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        	);

			        	$update = $this->model_users->editprofile($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/profile/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/profile/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/profile', $this->data);	
	        }	
		}
	}

}