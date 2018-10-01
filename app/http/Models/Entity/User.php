<?php 
namespace App\Http\Models\Entity;

use Doctrine\ORM\Annotation;
use Doctrine\Common\Collections\ArrayCollection;

/** @Entity @Table(name="users") **/
class User {

	private $id;

	protected $user;

	protected $passw;

	protected $permision;

	protected $funcionarios;

	public function getId() : int 
	{
		return $this->id;
	}

	public function setUser($user)
	{
		$this->user = $user; 
	}

	public function getUser() : String 
	{
		return $this->user;
	}

	public function getPassw() : String 
	{
		return $this->passw;
	}

	public function setPassw($passw) 
	{
		$this->passw = $passw;
	}

	public function setPermission($permision) 
	{
		$this->permision = $permision; 
	}

	public function getPermission () : String {
		return $this->permission;
	}

}