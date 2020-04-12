<?php 

class Model_parking extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getParkingData()
	{
		$sql = "SELECT 
					a.id,TIME_FORMAT(a.date_created, '%H:%i %p') AS time_in,
					TIME_FORMAT(a.time_out, '%H:%i %p') AS time_out,
					TIME_FORMAT(a.date_updated, '%H:%i %p') AS time_updated,
					a.event_id,a.vehicle_id,a.total_amount,a.paid_status,b.plate_number,c.name 
		FROM parking_details a 
		INNER JOIN vehicle_details b on a.vehicle_id = b.id 
		INNER JOIN events c on a.event_id = c.id 
		ORDER BY a.id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getParkingDataAll($id)
	{
		$sql = "SELECT * FROM parking_details WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	public function create()
	{
		$this->db->trans_start();
		date_default_timezone_set('Asia/Manila');
		// $my_date_time = date("Y-m-d h:i:s", strtotime("+1 hours"));
		$dateNow = strtotime('now');
		// $my_date_time = date("Y-m-d h:i:s",$dateNow);
		$vehicle_detail = array(
			'plate_number' 	=> $this->input->post('plate_number'),
			'category' => 1,
		);
		$this->db->insert('vehicle_details', $vehicle_detail); 
		$vd_id = $this->db->insert_id();

		// $datas = $this->getParkingDataAll();
		// 	foreach ($datas as $data) {
		// 		$check_in_time = strtotime($data['date_created']);
		// 		$checkout_time = strtotime($my_date_time);
	
		// 		// calculates the time by hourly
		// 		$total_time = ceil((abs($checkout_time - $check_in_time) / 60) / 60);
		// 		$earned_amount = 10;
		// 		if($total_time > 1){
		// 			$earned_amount = 100;
		// 		}
		// }
		
		$parking_details = array(
			'event_id' 	=> $this->input->post('event_id'),
			'vehicle_id' => $vd_id,
			'paid_status' => 0,
			'total_amount' => 10,
		);
		$this->db->insert('parking_details',$parking_details);
		$this->db->trans_complete(); 
	
		return $this->db->insert_id(); 
	}

	public function edit()
	{
		$parking_id=$this->input->post('parking_id');
		// $date_updated=$this->input->post('date_updated');
		$data = $this->getParkingDataAll($parking_id);
				$check_in_time = strtotime($data['date_created']);
				$time_out = $data['date_updated'];
				$checkout_time = strtotime($time_out);
	
				// calculates the time by hourly
				$total_time = ceil((abs($checkout_time - $check_in_time) / 60) / 60);
				$earned_amount = 10;
				if($total_time < 1){
					$earned_amount = 100;
				}
		$this->db->set('time_out', $time_out);
		$this->db->set('total_amount', $earned_amount);
		$this->db->where('id', $parking_id);
		$result=$this->db->update('parking_details');
		return $result;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('parking_details');
		return ($delete == true) ? true : false;
	}	


	/*
	 update the payment information for the parking
	 gets the parking data from the id and 
	 caculate the difference time 
	 checks if the rate is based on the hourly or fixed rate
	*/
	public function updatePayment($id, $payment_status) 
	{
		if($id && $payment_status) {
			if($payment_status == 1) {
				// get the data of parking data
				$data = $this->getParkingData($id);
				
				// $check_in_time = $data['date_created'];


				$checkout_time = strtotime('now');

				// calculates the time by hourly
				// $total_time = ceil((abs($checkout_time - $check_in_time) / 60) / 60);


					$earned_amount = 10;

				$update_data = array(
					'time_out' => $checkout_time,
					'paid_status' => 1,
					// 'total_time' => $total_time,
					'total_amount' => $earned_amount
				);

				$this->db->where('id', $id);
				$update_ops = $this->db->update('parking_details', $update_data);


				return ($update_ops == true) ? true : false;

			} // /elseif
			else {
				$update_data = array(
					'time_out' => '',
					'paid_status' => 0,
					// 'earned_amount' => 0				
				);

				$this->db->where('id', $id);
				$update_data = $this->db->update('parking_details', $update_data);
				return ($update_data == true) ? true: false; 
				
			}
		} // /if
		return false;
	}

	public function countTotalParking()
	{
		$sql = "SELECT * FROM parking_details WHERE paid_status = 0";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	

	
}