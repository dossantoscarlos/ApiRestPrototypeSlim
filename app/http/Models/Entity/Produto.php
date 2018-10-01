<?php

namespace App\Http\Models\Entity;

use Doctrine\ORM\Annotation;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity @Table(name="Produtos")
 **/
class Produto {

	private $id;

	protected $nome;

	protected $tipo;

	protected $code;

	protected $fornecedor;

	protected $kilo;

	protected $unidade;

	protected $valor;

	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome=$nome;
		return $this;
	}
	public function getNome():String{
		return $this->nome;
	}
	
	public function setTipo($tipo){
		$this->tipo = $tipo;
		return $this;
	}
	public function getTipo():String
		return $this->tipo;
	}
	
	public function setCode($code){
		$this->code = $code;
		return $this;
	}
	public function getCode():int {
		return $this->code;
	}
	
	public function setKilo($kilo){
		$this->kilo = $kilo;
		return $this;
	}	
	public function getKilo():float{
		return $this->kilo;
	}
	
	public function setUnidade($unidade){
		$this->unidade = $unidade;
		return $this;
	}
	public function getUnidade():int{
		return $this->unidade;		
	}

	public function setValor($valor){
		$this->valor = $valor;
		return $this;
	}
	public function getValor():double{
		return $this->valor; 
	}

} 