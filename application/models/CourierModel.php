<?php 
class CourierModel extends CI_Model{
	public function get_request(){
		$condition = "rstatus = 'Waiting' and courierID = 0";
		return $this->db->get_where('request',$condition)->result();
	}
	public function my_request($id){
		$condition = "courierID = '".$id."'";
		return $this->db->get_where('request',$condition)->result();
	}
	public function request_detail($id){
		$condition = "requestID = '".$id."'";
		$this->db->select('*');
        $this->db->from('request');
        $this->db->join('order', 'order.orderID = request.orderID');
		$this->db->where($condition);
		$query = $this->db->get();
		return $query->result();
	}
	public function take($courierid,$requestID){
		$condition = "requestID = '".$requestID."'";
		$this->db->where($condition);
		$this->db->update('request',$courierid);
	}
	public function update_order_price($orderID,$data){
		$condition = "orderID = '".$orderID."'";
		$this->db->where($condition);
		$this->db->update('order',$data);
	}
	public function update_request_status($requestID,$data){
		$condition = "requestID = '".$requestID."'";
		$this->db->where($condition);
		$this->db->update('request',$data);
	}
}
?>