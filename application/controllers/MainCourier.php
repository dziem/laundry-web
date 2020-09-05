<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MainCourier extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->model('CourierModel','cm',true);
	}
	public function index(){
		$userID = ($this->session->userdata['logged_in']);
		$data['request'] = $this->cm->get_request();
		$data['myRequest'] = $this->cm->my_request($userID);
		$this->load->view('courier/home',$data);
	}
	public function pickup_detail($id){
		$data['detail'] = $this->cm->request_detail($id);
		$this->load->view('courier/pickup_detail',$data);
	}
	public function pickup_detail_take($courierid,$requestID){
		$data = array('courierID' => $courierid);
		$this->cm->take($data,$requestID);
		redirect(site_url('MainCourier/pickup_detail/'.$requestID));
	}
	public function pickup_done(){
		$paid = $this->input->post('paid');
		$orderID = $this->input->post('orderID');
		$requestID = $this->input->post('requestID');
		if($paid == 1){
			$paid = 'Paid';
		}else{
			$paid = 'Not Paid';
		}
		$data = array(
			'weight' => $this->input->post('weight'),
			'price' => $this->input->post('total'),
			'status' => 'Picked Up',
			'payment' => $paid
		);
		$this->cm->update_order_price($orderID,$data);
		$data2 = array('rstatus' => 'Done');
		$this->cm->update_request_status($requestID,$data2);
		redirect(site_url('MainCourier'));
	}
	public function delivery_detail($id){
		$data['detail'] = $this->cm->request_detail($id);
		$this->load->view('courier/delivery_detail',$data);
	}
	public function delivery_detail_take($courierid,$requestID){
		$data = array('courierID' => $courierid);
		$this->cm->take($data,$requestID);
		redirect(site_url('MainCourier/delivery_detail/'.$requestID));
	}
	public function delivery_done($orderID,$requestID){
		$data = array(
			'status' => 'Delivered',
			'payment' => 'Paid'
		);
		$this->cm->update_order_price($orderID,$data);
		$data2 = array('rstatus' => 'Done');
		$this->cm->update_request_status($requestID,$data2);
		redirect(site_url('MainCourier'));
	}
}