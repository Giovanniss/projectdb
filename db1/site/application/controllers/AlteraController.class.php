<?php

class AlteraController extends Controlador {

	/**
	 * Descricao
	 * Chama a página inicial do site, carregando a tag head, consultas no banco de dados e o rodapé.
	 */
	public function index() {
		$clientes = new AlterarModel();

		$dados['clientes'] = $clientes->getClientes();
		$this->tela('altera-cliente', $dados);
	}	

	public function cliente() {

		$this->tela('altera');
	}	

	/**
	* Metodo responsável pela alteração
	*/
	public function alterarcliente() {
		$formCliente = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		$cadCliente = new AlterarModel();

		$cadCliente->buscaDados($formCliente);
	}

	/**
	* Metodo responsável pela alteração
	*/
	public function updatecliente() {
		$formCliente = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		$cadCliente = new AlterarModel();

		$cadCliente->buscaDados($formCliente);
	}

}