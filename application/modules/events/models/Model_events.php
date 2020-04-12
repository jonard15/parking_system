<?php 

class Model_events extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getEventsData() 
	{
		$event_data=$this->db->get('events');
		return $event_data->result();
	}

	public function getActiveEventData() 
	{
		$sql = "SELECT * FROM events WHERE status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		
	}

	public function getVehicleDataAll() 
	{
		$sql = "SELECT * FROM vehicle_details WHERE status = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
		
	}

	public function create()
	{
		$data = array(
			'name' 	=> $this->input->post('event_name'),
			'status' => $this->input->post('event_status'), 
		);
		$result=$this->db->insert('events',$data);
		return $result;
	}

	public function edit()
	{
		$event_id=$this->input->post('event_id');
		$event_name=$this->input->post('event_name');
		$event_status=$this->input->post('event_status');

		$this->db->set('name', $event_name);
		$this->db->set('status', $event_status);
		$this->db->where('id', $event_id);
		$result=$this->db->update('events');
		return $result;	
	}

	public function delete()
	{
		$event_id=$this->input->post('event_id');
		$this->db->where('id', $event_id);
		$result=$this->db->delete('events');
		return $result;
	}
}