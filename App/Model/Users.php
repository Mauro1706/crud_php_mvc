<?php

	class Users
	{
		public function getAll()
		{
			$con = Connection::getConn();

			$sql = "SELECT * FROM laravel.users ORDER BY id DESC";
			$sql = $con->prepare($sql);
			$sql->execute();
			$resultado = array();

			while ($row = $sql->fetchObject()) {
				$resultado[] = $row;
			}

			if (!$resultado) {
				throw new Exception("Não foi encontrado nenhum registro no banco");		
			}

			return $resultado;
		}

		public function selecionaPorId($idPost)
		{
			$con = Connection::getConn();

			$sql = "SELECT * FROM laravel.users WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
			$sql->execute();

			$resultado = $sql->fetchObject();

			return $resultado;
		}

        public function update($params)
        {
            $con = Connection::getConn();

            $sql = "UPDATE laravel.users SET name = :name, email = :email WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':name', $params['name']);
            $sql->bindValue(':email', $params['email']);
            $sql->bindValue(':id', $params['id']);
            $resultado = $sql->execute();

            if ($resultado == 0) {
                throw new Exception("Falha ao alterar usuário");

                return false;
            }

            return true;
        }

		public function insert($dadosPost)
		{
			if (empty($dadosPost['name']) OR empty($dadosPost['email'])) {
				throw new Exception("Preencha todos os campos");

				return false;
			}

			$con = Connection::getConn();

			$sql = $con->prepare('INSERT INTO laravel.users (name, email) VALUES (:name, :email)');
			$sql->bindValue(':name', $dadosPost['name']);
			$sql->bindValue(':email', $dadosPost['name']);
			$res = $sql->execute();

			if ($res == 0) {
				throw new Exception("Falha ao inserir publicação");

				return false;
			}

			return true;
		}

		public function delete($id)
		{
			$con = Connection::getConn();

			$sql = "DELETE FROM laravel.users WHERE id = :id";
			$sql = $con->prepare($sql);
			$sql->bindValue(':id', $id);
			$resultado = $sql->execute();

			if ($resultado == 0) {
				throw new Exception("Falha ao deletar usuário");

				return false;
			}

			return true;
		}

	}
