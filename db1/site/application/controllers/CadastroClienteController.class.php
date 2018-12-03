<?php

class CadastroCliente extends Controlador {

	/**
	 * Descricao
	 * Chama a página inicial do site, carregando a tag head, consultas no banco de dados e o rodapé.
	 */
	public function index() {

		$this->tela('cadastro-cliente');
	}	
}