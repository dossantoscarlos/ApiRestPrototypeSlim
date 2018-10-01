<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\IApiDAO;
use App\Http\Models\Entity\Pessoa;
use Respect\Validation\Validator as V;

class PessoasController extends Controller implements IApiDAO
{
	private $code =['201' => 'Criado com sucesso'];

	public function show($request,$response,$args)
	{ 
		$uriParam = $request->getUri()->getQuery();
		print_r($uriParam);

		if (!empty($uriParam	)) {
			$objeto = (object) $request->getParams();
			$error = $this->validator->validate($request,[
				'nome' => V::Alpha()->noWhitespace()->notEmpty()
			]);

			if($error == null ){
				$cliente = $this->orm->getRepository(Pessoa::class)->findNomeAndSobrenome($objeto);
				return $this->response->withStatus(200)->withJson($cliente);
			}else{
				$errors[] = (object) $error;
				return $this->response->withJson($errors);
			}
		}else{
			$cliente = $this->orm->getRepository(Pessoa::class)->findAllClientes();
			return $this->response->withStatus(200)->withJson($cliente);
		}

		
	}


	public function create($request,$response,$args)
	{ 			
		return $this->response->withStatus(201)->write($this->code);
	}

	public function update($request,$response,$args)
	{ 
		

	}

	public function drop($request,$response,$args)
	{ 
		if ($request->isXhr()) {
			return $this->response->withStatus(402);
		}else{
			return $this->response->withStatus(405)->write($this->codeError);
		}
	}
}
