<?php

// Validation Rules

$config = array(
			'register' => array(
							array(
								'field'=>'name',
								'label'=>'Name',
								'rules'=>'trim|required'
							),
							array(
								'field'=>'email_reg',
								'label'=>'Email',
								'rules'=>'trim|required|valid_email|is_unique[users.email]'
// Use below line for testing so no need to enter unique email each time
//								'rules'=>'trim|required|valid_email'
							),
							array(
								'field'=>'password_reg',
								'label'=>'Password',
								'rules'=>'trim|required|matches[passconf]|min_length[8]'
							),
							array(
								'field'=>'passconf',
								'label'=>'Password Confirmation',
								'rules'=>'trim|required'
							),
							array(
								'field'=>'birthday',
								'label'=>'Date of Birth',
								'rules'=>'trim|required'
							)
					  ),			
			'login' => array(
							array(
								'field'=>'email_login',
								'label'=>'Email',
								'rules'=>'trim|required|callback_login_check'
							),
							array(
								'field'=>'password_login',
								'label'=>'Password',
								'rules'=>'trim|required'
							)
					  )					  						  	
	      );

?>