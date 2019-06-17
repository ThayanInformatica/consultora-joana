<?php
	class PdoCon{
		private $user = 'root';
		private $pass = '';
		private $sqlCon = 'mysql:host=localhost;dbname=consultorajoana';
		private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
		
		public function getInstance(){
			return $this->conexao();
		}
		
		protected function conexao(){
			try{
				$con = new PDO($this->sqlCon, $this->user, $this->pass, $this->options);
				$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $con;
			}catch(PDOException $e){
				print "Erro Class PdoCon!:".$e->getMessage()."<br/>";
				die();
			}
		}
	}
?>