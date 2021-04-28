<?php

	class ErroController
	{
		public function index()
		{
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('Template/erro_404.php');

            $parameters = array();
            $parameters['url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

            $conteudo = $template->render($parameters);
            echo $conteudo;
		}
	}
