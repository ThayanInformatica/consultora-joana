<?php
	class Usuario{
		private $id_usuario;
		private $login;
        private $senha;


		public function getId_usuario(){
			return $this->id_programa;
		}

		public function setId_usuario($id_usuario){
			settype($id_usuario, "int");
			$this->id_usuario = $id_usuario;
		}

		public function getLogin(){
			return $this->login;
		}

		public function setLogin($login){
			settype($login, "string");
			$this->login = $login;
		}

		public function getSenha(){
			return $this->senha;
		}


		public function setSenha($senha)
        {
            settype($senha, "string");
            $this->senha = $senha;
        }
	}
?>