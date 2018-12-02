<?php

class LinksTexto {

	public $string;

	/**
	 * Monta link interno da página.
	 */
	public function GerarLink($text) {
		$variavelLimpa = strtolower(ereg_replace("[^a-zA-Z0-9-]", "", strtr(utf8_decode(trim($text)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ "), "aaaaeeiooouuncAAAAEEIOOOUUNC-")));
		return $variavelLimpa;
	}


	/**
	 * Formata a descrição das imagens cadastradas no Gestor Web.
	 */
	public function addLegenda($string) {
		$texto = $string;
        return str_replace('src="', 'src="' . PATH_IMG_GW, $texto);
	}


	/**
	 * Definindo as tags permitidas na exibição do conteúdo para o usuário.
	 *
	 * @param string $str
	 * Parametro responsável por receber a string para formatação.
	 * @return string
	 * Retorna a string passada no parametro.
	 */
	public function formataStr($str, $limita = null) {
		$this->string = (string) $str;

		switch ($this->string) {
			case ($limita == null):
				return strip_tags($this->string, "<p><b><strong><br/><ul><li><a><ol>&nbsp;<table><tr><thead><tbody><tfoot><td><th><em><span>");
				break;
			case ($limita !== null):
				return strip_tags($this->LimitaCaracteres($this->string, $limita), "<p><b><strong><br/><ul><li><a><ol>&nbsp;<table><tr><thead><tbody><tfoot><td><th><em><span>");
				break;
		}
	}

	/**
	 * Remove a tag <img /> da string passada no parâmetro.
	 * Normalmente essa string é gerada nos cadastros do Gestor Web.
	 */
	public function RemoverImagem($string) {
		return strip_tags(preg_replace("/<img[^>]+\>/i", "", $string));
	}


	/**
	 * Limita a quantidade de caracteres exibidos para o usuário.
	 */
	function LimitaCaracteres($texto, $limite, $quebra = true) {
		$tamanho = strlen($texto);

		//Verifica se o tamanho do texto é menor ou igual ao limite
		if ($tamanho <= $limite) {
			$novoTexto = $texto;

			// Se o tamanho do texto for maior que o limite
		} else {

			// Verifica a opção de quebrar o texto
			if ($quebra == true) {
				$novoTexto = trim(substr($texto, 0, $limite)) . "...";

				// Se não, corta $texto na última palavra antes do limite
			} else {
				// Localiza o útlimo espaço antes de $limite
				$ultimoEspaco = strrpos(substr($texto, 0, $limite), " ");

				// Corta o $texto até a posição localizada
				$novoTexto = trim(substr($texto, 0, $ultimoEspaco)) . "...";
			}
		}

		return $novoTexto; // Retorna o valor formatado
	}
}