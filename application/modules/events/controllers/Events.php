<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Events';
		$this->load->model('model_events');	
	}

	public function index()
	{
		if(!in_array("viewEvent", $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->render_template('events/index', $this->data);
	}

	public function event_data(){
		
		$data=$this->model_events->getEventsData();
		echo json_encode($data);
	}

	public function create()
	{
		if(!in_array('createEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_events->create();
		echo json_encode($data);
		
	}

	public function edit($id = null)
	{
		if(!in_array('updateEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_events->edit();
		echo json_encode($data);
		
	}

	public function delete()
	{
		if(!in_array('deleteEvent', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$data=$this->model_events->delete();
		echo json_encode($data);	
	}
}