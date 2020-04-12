<?php 

class Model_vehicle extends CI_Model
{

public function __construct()
{
	parent::__construct();
}

public function getVehicleData() 
{
	$vehicle_data=$this->db->get('vehicle_details');
	return $vehicle_data->result();
}

public function create()
	{
		// $data = array(
		// 	'plate_number' 	=> $this->input->post('plate_number'), 
		// );
		// $result=$this->db->insert('vehicle_details',$data);
		// return $result;

		$this->db->trans_start();
		$vehicle_category = array(
			'name'=>'Employee'
		);
		$this->db->insert('vehicle_category', $vehicle_category); 
		$category_id = $this->db->insert_id(); 
	
		$category_detail = array(
			'category' => 2,
			'plate_number' 	=> $this->input->post('plate_number'),
		);
		$this->db->insert('vehicle_details', $category_detail);
	
		$this->db->trans_complete(); 
	
		return $this->db->insert_id(); 
	}

public function edit()
	{
		$vehicle_id=$this->input->post('vehicle_id');
		$plate_number=$this->input->post('plate_number');

		$this->db->set('plate_number', $plate_number);
		$this->db->where('id', $vehicle_id);
		$result=$this->db->update('vehicle_details');
		return $result;
	}

public function delete()
	{
		$vehicle_id=$this->input->post('vehicle_id');
		$this->db->where('id', $vehicle_id);
		$result=$this->db->delete('vehicle_details');
		return $result;
	}
}