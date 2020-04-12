<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Parking';
		$this->load->model('model_parking');
		$this->load->model('events/model_events');
		$this->load->model('vehicle/model_vehicle');
	}

	public function index()
	{

		if(!in_array('viewParking', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$parking_data = $this->model_parking->getParkingData();
	
		$result = array();
		foreach ($parking_data as $k => $v) {
			$result[$k]['parking'] = $v;
			$event_data = $this->model_events->getEventsData($v['event_id']);
			$result[$k]['events'] = $event_data;
		}

		$this->data['parking_data'] = $result;
		$this->render_template('parking/index', $this->data);
	}
	
	public function create()
	{
		if(!in_array('createParking', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->form_validation->set_rules('event_id', 'Events', 'required');
		// $this->form_validation->set_rules('vehicle_id', 'Vehicle', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
        	$data = array(
				'event_id' => $this->input->post('event_id'),
				'vehicle_id' => $this->input->post('vehicle_id'),
        		'paid_status' => 0
        	);

        	$create = $this->model_parking->create($data);
				if($create == true) {
						$this->session->set_flashdata('success', 'Successfully created');
						redirect('parking/', 'refresh');	
				}
				else {
					$this->session->set_flashdata('errors', 'Error occurred!!');
					redirect('parking/create', 'refresh');
				}
        }
        else {
        	$events = $this->model_events->getActiveEventData();
			$this->data['events'] = $events;
			$vehicle = $this->model_vehicle->getVehicleData();
        	$this->data['vehicle'] = $vehicle;

			$this->render_template('parking/create', $this->data);
		}
	}

	public function edit($id = null)
	{
		if(!in_array('updateParking', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->form_validation->set_rules('plate_number', 'Plate Number', 'required');
			$this->form_validation->set_rules('hourly_rate', 'Hourly Rate', 'required');

			if ($this->form_validation->run() == TRUE) {
	        	$data = array(
					'paid_status' => 1
	        	);

	        	$update_parking_data = $this->model_parking->edit($data, $id);
	        	if($update_parking_data == true) {
	        			$this->session->set_flashdata('success', 'Successfully created');
			    		redirect('parking/', 'refresh');	
	        		
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('parking/create', 'refresh');
	        	}
	        }
			else {

	        	$save_parking_data = $this->model_parking->getParkingData($id);
	        	$this->data['save_parking_data'] = $save_parking_data;
	        	
				$this->render_template('parking/edit', $this->data);	
			}				
		}
		
	}

	public function delete($id = null)
	{
		if(!in_array('deleteParking', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {

				$delete = $this->model_parking->delete($id);
				if($delete == true) {
	        		$this->session->set_flashdata('success', 'Successfully removed');
	        		redirect('parking/', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('error', 'Error occurred!!');
	        		redirect('parking/delete/'.$id, 'refresh');
	        	}	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('parking/delete', $this->data);	
			}				
		}	
	}

	public function updatepayment() 
	{
		if(!in_array('updateParking', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$id = $this->input->post('parking_id');
		if($id) {
			// getting the parking data 
			$updatePayment = $this->model_parking->updatePayment($id, $this->input->post('payment_status'));
			if($updatePayment == true) {
    			$this->session->set_flashdata('success', 'Successfully updated');
	    		redirect('parking/', 'refresh');	
    		}
    		else {
    			$this->session->set_flashdata('payment_error', 'Error occurred!!');
        		redirect('parking/edit/'.$id, 'refresh');
    		}
		}
	}
}