<?php

require_once 'DB.php';

abstract class crud extends DB{


	public $id;
	public $email;
	public $senha;


	public function setEmail($email){
		$this->email = $email;
		
	}

	public function getEmail($email){
		$this->email = $email;
		
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha($senha){
		$this->senha = $senha;
	}

	public function setId($id){
		$this->id = $id;
	}



}
?>