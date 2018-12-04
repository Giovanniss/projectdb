<?php

class CadastroController extends Controlador {

	/**
	 * Descricao
	 * Chama a página inicial do site, carregando a tag head, consultas no banco de dados e o rodapé.
	 */
	public function index() {
		$this->tela('cadastro-cliente');
	}	

	/**
	 * Metodo responsável por enviar o formulário de cadastro.
	 */
	public function enviarcadastro() {
		$formCadastro = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if ($formCadastro['email'] != "" && $formCadastro['cpf'] != "") {

			$log = new CadastroModel();
			$log->cadastro($formCadastro);
			unset($formCadastro);

		} else {
			echo "erro";
		}
	}
}