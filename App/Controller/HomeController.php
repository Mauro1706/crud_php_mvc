<?php

	class HomeController
	{
		public function index()
		{
			try {

				$loader = new \Twig\Loader\FilesystemLoader('App/View');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.php');

                $parameters['url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

				$conteudo = $template->render($parameters);
				echo $conteudo;

			} catch (Exception $e) {
				echo $e->getMessage();
			}
			
		}
	}
