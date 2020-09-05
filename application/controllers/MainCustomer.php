<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MainCustomer extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->model('CustomerModel','cm',true);
	}
	public function index(){
		$userID = ($this->session->userdata['logged_in']);
		$data['myorder'] = $this->cm->get_my_order($userID);
		$this->load->view('customer/home',$data);
	}
	public function order(){
		$this->load->view('customer/order');
	}
	public function schedule_delivery($id){
		$data['orderID'] = $id;
		$this->load->view('customer/schedule_delivery',$data);
	}
	public function order_detail($id){
		$data['detail'] = $this->cm->get_order($id);
		$this->load->view('customer/order_detail',$data);
	}
	public function order_action(){
		$orderData = $this->input->post('order');
		$orderData['status'] = 'Order Placed';
		$orderData['payment'] = 'Not Paid';
		$orderID = $this->cm->order($orderData);
		$pikcupData = array(
			'orderID' => $orderID,
			'type' => 'pickup',
			'address' => $this->input->post('address'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'note' => $this->input->post('note'),
			'rstatus' => 'Waiting'
		);
		$this->cm->requestPickup($pikcupData);
		redirect(site_url('MainCustomer/index'));
	}
	public function schedule_action(){
		$orderID = $this->input->post('orderID');
		$orderData['status'] = 'Delivery Request Placed';
		$this->cm->update($orderID,$orderData);
		$pikcupData = array(
			'orderID' => $orderID,
			'type' => 'delivery',
			'address' => $this->input->post('address'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'note' => $this->input->post('note'),
			'rstatus' => 'Waiting'
		);
		$this->cm->requestPickup($pikcupData);
		redirect(site_url('MainCustomer/index'));
	}
}