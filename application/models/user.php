<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {  

	function add_user($user){
		$query="INSERT INTO users (name, email, password, birthday, created_at) VALUES (?,?,?,?, NOW())";
		$values=array($user['name'],$user['email'],$user['password'],$user['birthday']);
		$this->db->query($query,$values);
	}

	function get_user_by_id($user_id){
		return $this->db->query("SELECT * FROM users WHERE id='{$user_id}';")->row_array();
	}

	function get_last_insert_id(){
		return $this->db->query("SELECT LAST_INSERT_ID();")->row_array();
	}

	function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users WHERE email=?;",array($email))->row_array();
	}
}
?>