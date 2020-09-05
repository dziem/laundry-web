<?php 
class EmployeeModel extends CI_Model{
	public function get_all(){
		$condition = "status = 'Picked Up' or status = 'washing' or status = 'Drying' or status = 'Ironing'";
		return $this->db->get_where('order',$condition)->result();
	}
	public function update($orderID,$data){
		$condition = "orderID = '".$orderID."'";
		$this->db->where($condition);
		$this->db->update('order',$data);
	}
}
?>