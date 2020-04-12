<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Dashboard';
		$this->load->model('parking/model_parking');
		$this->load->model('events/model_events');
		$this->load->model('vehicle/model_vehicle');
			
	}

	public function index()
	{
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->data['total_parking'] = $this->model_parking->countTotalParking();
		$this->data['events'] = $this->model_events->getActiveEventData();
		$this->data['vehicles'] = $this->model_events->getVehicleDataAll();
		$this->render_template('dashboard', $this->data);
	}

	public function parking_data()
	{
	
		$data=$this->model_parking->getParkingData();
		echo json_encode($data);
	}

	public function create()
	{
		$vehicle_detail = array(
			'plate_number' 	=> $this->input->post('plate_number'),
			'category' => 1,
		);
		$data=$this->model_parking->create($vehicle_detail);
		echo json_encode($data);
	}

	public function edit()
	{
		$data=$this->model_parking->edit();
		echo json_encode($data);
		
	}
}