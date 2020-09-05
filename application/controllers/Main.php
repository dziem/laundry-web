<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Main extends CI_Controller {	
	function __construct(){
		parent::__construct();
		$this->load->model('MainModel','mm',true);
	}
	
	public function index(){
		$this->load->view('login');
	}
	
	public function register(){
		$this->load->view('register');
	}
	
	function register_action(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'type' => 'customer'
		);
		$result = $this->mm->regist_insert($data);
		if ($result == TRUE) {
			$username = $this->input->post('username');
			$results = $this->mm->read_user_information($username);
			if ($results != false) {
				$session_data = $results[0]->userID;
				$this->session->set_userdata('logged_in', $session_data);
				redirect(site_url('MainCustomer/index'));
			}
		} else {
			$data['message_display'] = 'Username already exist!';
			$this->load->view('register', $data);
		}
	}
	
	function login_action(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->mm->login($data);
		if ($result == TRUE) {
			$username = $this->input->post('username');
			$result = $this->mm->read_user_information($username);
			if ($result != false) {
				$session_data = $result[0]->userID;
				$this->session->set_userdata('logged_in', $session_data);
				if($result[0]->type == 'customer'){
					redirect(site_url('MainCustomer/index'));
				}else if($result[0]->type == 'courier'){
					redirect(site_url('MainCourier/index'));
				}
			}
		} else {
			$data['message_display'] =  'Invalid Username or Password';
			$this->load->view('login.php', $data);
		}
	}
}