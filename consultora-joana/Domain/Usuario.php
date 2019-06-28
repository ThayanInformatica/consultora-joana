<?php
	class Usuario {

		private $id_usuario;
		private $login;
		private $nome;
        private $senha;
        private $repeteSenha;
        private $cpf;
        private $email;

		public function getId_usuario(){
			return $this->id_programa;
		}

		public function setId_usuario($id_usuario){
			settype($id_usuario, "int");
			$this->id_usuario = $id_usuario;
		}

		public function getNome(){
		    return $this->nome;
        }

        public function setNome($nome){
		    settype($nome,"string");
		    $this->nome = $nome;
        }
//		public function getLogin(){
//			return $this->login;
//		}

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

        public function getRepeteSenha(){
            return $this->repeteSenha;
        }
        public  function setRepeteSenha($repeteSenha){
		    settype($repeteSenha,"string");
            $this ->repeteSenha = $repeteSenha;

        }
        public function getCpf(){
            return $this->cpf;
        }

        public  function setCpf($cpf){
            settype($cpf,"string");
            $this-> cpf = $cpf;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            settype($email,"string");
            $this->email = $email;
        }

        public function getCep(){
            return $this->cep;
        }

        public function setCep($cep){
            settype($cep, "string");
            $this->cep = $cep;
        }
	}
?>