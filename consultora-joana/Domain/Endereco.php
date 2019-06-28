<?php
	class Endereco {

		private $id_endereco;
	    private $id_usuario;
	    private $cep;
		private $rua;
		private $bairro;
        private $numero;
        private $complementacao;
        private $cidade;
        private $uf;

		public function getId_usuario(){
			return $this->id_usuario;
		}

		public function setId_usuario($id_usuario){
			settype($id_usuario, "int");
			$this->id_usuario = $id_usuario;
		}

        public function getid_endereco(){
            return $this->id_endereco;
        }

        public function setid_edereco($id_endereco){
            settype($id_endereco, "int");
            $this->$id_endereco = $id_endereco;
        }

        public function getrua(){
		    return $this->rua;
        }

        public function setrua($rua){
		    settype($rua,"string");
		    $this->rua = $rua;
        }
		public function getbairro(){
			return $this->bairro;
		}

		public function setbairro($bairro){
			settype($bairro, "string");
			$this->bairro = $bairro;
		}

		public function getnumero(){
			return $this->numero;
		}
		public function setnumero($numero)
        {
            settype($numero, "string");
            $this->numero = $numero;
        }

        public function getcomplementacao(){
            return $this->complementacao;
        }
        public  function setcomplementacao($complementacao){
		    settype($complementacao,"string");
            $this ->complementacao = $complementacao;

        }
        public function getcidade(){
            return $this->cidade;
        }

        public  function setcidade($cidade){
            settype($cidade,"string");
            $this->cidade = $cidade;
        }

        public function getuf(){
            return $this->uf;
        }

        public function setuf($uf){
            settype($uf,"string");
            $this->uf = $uf;
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