<?php
/**
 * Metodo model pra home
 */


class HomeModel extends Modelo {
	private $email;
	private $senha;
	
	/**
	 * Busca o login ativo do cadastrado.
	 * @return objeto prepare PDO.
	 */
	public function getLogin() {
		$stmt = "SELECT * 
				   FROM wbs_membros AS membros
				  WHERE membros.situacao = 1
				    AND membros.status_membro_id = 1
				    AND membros.email = '{email}'
				    AND membros.pass = md5('{senha}');";

		return $this->sql($stmt);
	}	
}