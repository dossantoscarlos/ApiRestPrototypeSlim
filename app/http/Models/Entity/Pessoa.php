<?php
namespace App\Http\Models\Entity;

use Doctrine\ORM\Annotation;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Collections\ArrayCollection;
use App\Http\Models\IJsonSerializable;

/**
 * @Entity(repositoryClass="App\Http\Models\Repository\PessoaRepository") @Table(name="clientes")
 **/
class Pessoa  extends EntityManager implements IJsonSerializable
{
	/** @Id @Column(type="integer") @var int @GeneratedValue **/
	private $id;
	/** @Column(type="string") @var string **/
	protected $nome;
	
	/** @Column(type="string") @var string **/
	protected $sobrenome;
	
	/** @Column(type="integer") @var int  **/
	protected $cpf;
	
	public function getId()
	{
		return $this->id;
	}

	public function getNome() : String {
		return $this->nome;
	}

	public function getSobrenome() : String {
		return $this->sobrenome;
	}

	public function getCPF() : int {
		return $this->cpf;
	}

	public function setCPF($cpf){
		$this->cpf = $cpf;
	}

	public function setSobrenome($sobrenome){
		$this->sobrenome = $sobrenome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function jsonSerialize() : array
	{
		return [
			'id' => $this->getId(),
			'nome' => $this->getNome(),
			'sobrenome' => $this->getSobrenome(),
			'cpf' => $this->getCPF()
		];
	}
}