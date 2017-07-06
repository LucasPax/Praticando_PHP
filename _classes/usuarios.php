<?php

require_once 'crud.php';

class Usuarios extends crud{

	protected $table = 'usuarios';
	public $id;
	public $email;
	public $senha;



	public function find($id){
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function findAll(){
		$sql = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id){
		$sql = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function insert(){

		$sql = "INSERT INTO $this->table (email, senha) VALUES (:email, :senha)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		return $stmt->execute();

	}


	public function update($id){

		$sql = "UPDATE $this->table SET email = :email, senha = :senha WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam('email', $this->email);
		$stmt->bindParam('senha', $this->senha);
		$stmt->bindParam('id', $this->id);
		return $stmt->execute();
	}

}