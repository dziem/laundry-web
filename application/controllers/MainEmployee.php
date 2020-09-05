<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MainEmployee extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->model('EmployeeModel','em',true);
	}
	public function index(){
		$data['order'] = $this->em->get_all();
		$this->load->view('employee/home',$data);
	}
	public function update(){
		$status = $this->input->post('status');
		$orderID = $this->input->post('orderID');
		$data = array('status' => $status);
		$this->em->update($orderID,$data);
		redirect(site_url('MainEmployee'));
	}
}