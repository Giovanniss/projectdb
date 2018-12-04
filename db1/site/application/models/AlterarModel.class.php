<?php

class AlterarModel extends Modelo {
	private $pessoa;
	private $endereco;

	/**
	 * <b>Descrição:</b>
	 * Está função é responsável por buscar no banco de dados os valores
	 * @return objeto Retorna a consulta das tabelas 
	 */
	public function getClientes() {
		$sql = "SELECT 
                pessoa.id,
                pessoa.nome,
                contato.email 
                FROM pessoa, contato
                WHERE pessoa.id = contato.id_pessoa";
		return $this->sql($sql);
	}

	/**
	 * Insere no banco de dados, as alterações feitas pelo membro.
	 **/
	public function buscaDados ($form) {
		$sql = "SELECT DISTINCT 
			pessoa.nome,
			pessoa.CPF,			 
			pessoa.datanasc,
			contato.email,
			contato.telefone			
			FROM pessoa, contato 
		WHERE pessoa.id = '{$form['id']}' LIMIT 1;";

		$this->pessoa = $this->sql($sql);
		
		$sql2 = "SELECT DISTINCT
			endereco.rua, 
			endereco.numero, 
			endereco.bairro, 
			estado.nome as estado, 
			estado.uf,
			cidade.nome as cidade
			FROM pessoa, endereco, estado, cidade 
			WHERE pessoa.id = '{$form['id']}' LIMIT 1;";

		$this->endereco = $this->sql($sql2);

		$_SESSION['pessoa']   = $this->pessoa;
		$_SESSION['endereco'] = $this->endereco;		
	}

	/**
	 * Insere no banco de dados, as alterações feitas pelo membro.
	 **/
	public function updatecliente ($form) {
		var_dump($form);

		$dados = array (
			'nome'		=> "{$form['nome']}",
			'cidade'	=> "{$form['cidade']}",
			'bairro'	=> "{$form['bairro']}",
			'cel' 	        => "{$form['celular']}",
		); 
	
		// $this->update('wbs_membros', $dados, 'id = '.$this->id.' AND situacao = \'1\'');
					
		// $this->searchUser();

		// echo "ok";
	}
	

	/**
 	 * Procura os dados no bd e seta numa session
	 */
	private function searchUser() {
		$sql = "SELECT wbs_membros.id,
               			wbs_membros.nr_membro,
				wbs_membros.nome,	
				wbs_membros.cel,	
				wbs_membros.cidade,	
				wbs_membros.bairro
				  FROM wbs_membros
				 WHERE situacao = '1'
				   AND email = '{$this->email}'
				   AND pass =  '{$this->senha}'
				 LIMIT 1;";

		$this->dados = $this->sql($sql);

		$_SESSION['dados'] = $this->dados;
	}
	
}