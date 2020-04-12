<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Vehicle';
		$this->load->model('model_vehicle');	
	}

	public function index()
	{
		if(!in_array("createUser", $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('vehicle/index', $this->data);
	}
	function vehicle_data(){
		
		$data=$this->model_vehicle->getVehicleData();
		echo json_encode($data);
	}


	public function create()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$data=$this->model_vehicle->create();
		echo json_encode($data);
		
	}

	public function edit()
	{
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_vehicle->edit();
		echo json_encode($data);
	}

	public function delete()
	{
		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_vehicle->delete();
		echo json_encode($data);
	}
}