<?php

	class UsersController
	{
		public function index()
		{
			$loader = new \Twig\Loader\FilesystemLoader('App/View');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('users.php');

			$users = new Users();
			$objUsers = $users->getAll();

            $parameters = array();
            $parameters['users'] = $objUsers;

			$conteudo = $template->render($parameters);
			echo $conteudo;
		}

        public function update($paramId)
        {
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            if ($paramId) {
                $template = $twig->load('update.php');
            } else {
                $template = $twig->load('create.php');
            }

			$post = Users::selecionaPorId($paramId);
            $users = new Users();
            $objUsers = $users->selecionaPorId($paramId);

            $parametros = array();
            $parametros['id'] = "";
            $parametros['name'] = "";
            $parametros['email'] = "";
            if ($objUsers) {
                $parametros['id'] = $objUsers->id;
                $parametros['name'] = $objUsers->name;
                $parametros['email'] = $objUsers->email;
            }

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }

        public function gravar()
        {

            $id = !empty($_POST['id']) ? $_POST['id'] : "";

            try {
                $user = new Users();
                if ($id) {
                    $retorno = $user->update($_POST);
                } else {
                    $retorno = $user->insert($_POST);
                }

                echo '<script>alert("Dados alterados com sucesso!");</script>';
                $this->index();
            } catch (Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                $this->update($id);
            }
        }

		public function delete($paramId)
		{
			try {
                $user = new Users();
				$retorno = $user->delete($paramId);

				echo '<script>alert("Publicação deletada com sucesso!");</script>';
                $this->index();
			} catch (Exception $e) {
				echo '<script>alert("'.$e->getMessage().'");</script>';
                $this->index($id);
			}
			
		}
	}
