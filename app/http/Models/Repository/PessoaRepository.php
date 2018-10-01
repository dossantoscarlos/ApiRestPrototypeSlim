<?php 
namespace App\Http\Models\Repository;

use Doctrine\ORM\EntityRepository;
use App\Http\Models\Entity\Pessoa;

class PessoaRepository extends EntityRepository 
{
	
	public function findAllClientes() : array {
		$pessoa = $this->findAll();
		return $this->convert($pessoa);
	} 

	public function findNomeAndSobrenome($param) : array {
		$sql = "SELECT p FROM App\Http\Models\Entity\Pessoa p WHERE p.nome like :nome ";
		$pessoa = $this->_em->createQuery($sql)->setParameters(array('nome' => $param->nome.'%'))->getResult();
		return $this->convert($pessoa);		
	}

	protected function convert($classe) : array {
		$result = null ; 
		if (!empty($classe)){
			foreach ($classe as $key => $value) {
				$result[] = $classe[$key]->jsonSerialize();
			}
			return $result;
		}else {
			return array('Message' => 'Busca nao retornou resultados');
		}
	}
}