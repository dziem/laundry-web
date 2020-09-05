<?php 
class CustomerModel extends CI_Model{
	public function get_my_order($id){
		$condition = "userID = '".$id."'";
		return $this->db->get_where('order',$condition)->result();
	}
	public function get_order($id){
		$condition = "orderID = '".$id."'";
		return $this->db->get_where('order',$condition)->result();
	}
	public function order($data){
		$this->db->insert('order',$data);
		return $this->db->insert_id();
	}
	public function update($orderID,$data){
		$condition = "orderID = '".$orderID."'";
		$this->db->where($condition);
		$this->db->update('order',$data);
	}
	public function requestPickup($data){
		$this->db->insert('request',$data);
	}
}
?>