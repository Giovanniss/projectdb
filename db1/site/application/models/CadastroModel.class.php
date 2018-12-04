<?php

class CadastroModel extends Modelo {
	
	private $idPais;
    private $idEstado;
    private $idCidade;
    
	private $idPessoa;
    
	private $verifica;




	/**
	 *  Insere no banco de dados, as informações enviadas através do formulário de contato
	 */
	public function cadastro($form) {

        $this->cadastraEstado($form);
        $this->cadastraCidade($form);  

        $pessoa = array (
			'nome'			   => "{$form['nome']}",
			'datanasc'		   => "{$form['datanasc']}",
			'cpf'   		   => "{$form['cpf']}",
			'sexo'  	  	   => "{$form['sexo']}",
        );

        $this->insert($pessoa, "pessoa");  

        $this->cadastraEndereco($form);  

    } 
    /**
	 *  Insere no banco de dados, as informações: Estado, Cidade, Endereço e Contato
	 */
	public function cadastraEstado($form) {
        $this->idPais   = $this->searchPais($form['pais']);

        //insere primeiro o estado, dado que pais ja esta populado
        $estado = array (
            'nome'      	   => "{$form['estado']}",            
            'uf'			   => "{$form['uf']}",
            'id_pais'   	   => "{$this->idPais[0]['id']}"
        );       
        $this->insert($estado, "estado");    
    }

	public function cadastraCidade($form) {   
        $this->idEstado = $this->searchEstado($form['uf']);  
        //apos cadastrado estado, vamos inserir a cidade.
        $cidade = array (
            'nome   '     => "{$form['cidade']}",
			'id_estado'   => "{$this->idEstado[0]['id']}"
        );
        $this->insert($cidade, "cidade");   
    }

    //por fim cadastra-se o endereco
	public function cadastraEndereco($form) {  
        $this->idCidade = $this->searchCidade($form['cidade']); 
        $this->idPessoa = $this->searchPessoa($form['cpf']); 
        
        //apos cadastrado estado e cidade vamos cadastrar o endereço
        $endereco = array (
			'numero'		   => "{$form['numero']}",
			'rua'	    	   => "{$form['rua']}",
			'bairro'		   => "{$form['bairro']}",
			'id_cidade'		   => "{$this->idCidade[0]['id']}",
            'id_pessoa'		   => "{$this->idPessoa[0]['id']}"
        );  
        $this->insert($endereco, "endereco");   
    }

    public function cadastraContato($form) {   
        //apos cadastrado estado, vamos inserir a cidade.
        $contato = array (
            'telefone' 	       => "{$form['telefone']}",
			'email'			   => "{$form['email']}",
            'id_pessoa'		   => "{$this->idPessoa[0]['id']}" 
        );
        $this->insert($contato, "contato");   
    }    


	/**
	 * 4 Funções que buscam por ID's: pais, estado, cidade e pessoa
	 */
	public function searchPais($sigla) {
		$sql = "SELECT id
				  FROM pais
				 WHERE sigla = '{$sigla}'
                 LIMIT 1;";
        // var_dump($sql);
        return $this->sql($sql);        
    }

    public function searchEstado($uf) {
		$sql = "SELECT id
				  FROM estado
				 WHERE UF = '{$uf}'
                 LIMIT 1;";
        // var_dump($sql);
        return $this->sql($sql);        
    }

	public function searchCidade($cidade) {
		$sql = "SELECT id
				  FROM cidade
				 WHERE nome = '{$cidade}'
                 LIMIT 1;";
        return $this->sql($sql);        
    }   

	public function searchPessoa($cpf) {
		$sql = "SELECT id
				  FROM pessoa
				 WHERE cpf = '{$cpf}'
                 LIMIT 1;";
        return $this->sql($sql);        
    }
}