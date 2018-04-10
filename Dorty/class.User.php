<?php

class TypeUser{
	const SUPERUSER = 'SUPERUSER';
	const USER = 'USER';
}

class User{
	private $id;
	private $name;
	private $email;
	private $type;

	public function __construct($id, $name, $email, $type){
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->type = $type;
	}

	public function getName(){
		return $this->name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getType(){
		return $this->type;
	}

	public function getId(){
		return $this->id;
	}
}


?>