<?php
namespace models;

use Ubiquity\attributes\items\Id;
use Ubiquity\attributes\items\Column;
use Ubiquity\attributes\items\Validator;
use Ubiquity\attributes\items\Table;
use Ubiquity\attributes\items\OneToMany;
use Ubiquity\attributes\items\ManyToMany;
use Ubiquity\attributes\items\JoinTable;

#[Table(name: "groupe")]
class Groupe{
	
	#[Id()]
	#[Column(name: "id",dbType: "int(11)")]
	#[Validator(type: "id",constraints: ["autoinc"=>true])]
	private $id;

	
	#[Column(name: "name",nullable: true,dbType: "varchar(50)")]
	#[Validator(type: "length",constraints: ["max"=>50])]
	private $name;

	
	#[OneToMany(mappedBy: "groupe",className: "models\\Vm")]
	private $vms;

	
	#[ManyToMany(targetEntity: "models\\User",inversedBy: "groupes")]
	#[JoinTable(name: "usergroups")]
	private $users;


	 public function __construct(){
		$this->vms = [];
		$this->users = [];
	}


	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id=$id;
	}


	public function getName(){
		return $this->name;
	}


	public function setName($name){
		$this->name=$name;
	}


	public function getVms(){
		return $this->vms;
	}


	public function setVms($vms){
		$this->vms=$vms;
	}


	 public function addToVms($vm){
		$this->vms[]=$vm;
		$vm->setGroupe($this);
	}


	public function getUsers(){
		return $this->users;
	}


	public function setUsers($users){
		$this->users=$users;
	}


	 public function addUser($user){
		$this->users[]=$user;
	}


	 public function __toString(){
		return $this->id.'';
	}

}