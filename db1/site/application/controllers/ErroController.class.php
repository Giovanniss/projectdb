<?php

class ErroController extends Controlador {
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index() {
     	$seoModel = new SeoModel();
     	$rodape   = new RodapeModel();

		$dados['seo']    = $seoModel->getSeo();
		$dados['perfis'] = $rodape->getPerfis();
		
		$this->tela('404', $dados);
	}

}