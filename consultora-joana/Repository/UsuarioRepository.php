<?php
	require_once __DIR__ .'/../pdoConnection/PdoCon.php';
	
	class UsuarioRepository{
		private $pdoCon;
		private $conexao;
		public function Logar($usuario){
			try{
				$sql = 'SELECT * FROM tb_usuario WHERE login = :login AND senha = :senha';
				$this->pdoCon = new PdoCon();
				$this->conexao = $this->pdoCon->getInstance();
				$stm = $this->conexao->prepare($sql);

                $stm->bindValue(':login', $usuario->getLogin(), PDO::PARAM_STR);
				$stm->bindValue(':senha', $usuario->getSenha(), PDO::PARAM_STR);

				$this->conexao->beginTransaction();
                $stm->execute();
                $result = $stm->fetchColumn();
                $this->conexao->commit();

                if ($result > 0) {
                    return true;
                } else {
                    return false;
                }

			}catch(PDOException $e){
				if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
					$this->conexao->commit();
					usleep(250000);
				}else{
					$this->conexao->rollBack();
					throw $e;
				}
			}

		}

        public function CadastrarUsuario($usuario){

            try {

                $sql = 'INSERT INTO tb_usuario (nome,senha,cpf,email) values (:nome,
 :senha, :cpf, :email);';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $stm->bindValue(':nome', $usuario->getNome(), PDO::PARAM_STR);
                $stm->bindValue(':senha', $usuario->getSenha(), PDO::PARAM_STR);
                $stm->bindValue(':cpf', $usuario->getCpf(), PDO::PARAM_STR);
                $stm->bindValue(':email', $usuario->getEmail(), PDO::PARAM_STR);

                $this->conexao->beginTransaction();
                $stm->execute();
                $this->conexao->commit();

                $pegarId = new UsuarioRepository();
              $obterId = $pegarId->PegarUltimoId();

                return $obterId['id_usuario'];

            }catch(PDOException $e){
                if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
                    $this->conexao->commit();
                    usleep(250000);
                }else{
                    $this->conexao->rollBack();
                    throw $e;
                }
            }
        }


        public function PegarUltimoId(){
            try{
                $sql = 'SELECT * FROM tb_usuario ORDER BY id_usuario DESC LIMIT 1';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $this->conexao->beginTransaction();
                $stm->execute();
                $result = $stm->fetch();
                $this->conexao->commit();

               return $result;

            }catch(PDOException $e){
                if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
                    $this->conexao->commit();
                    usleep(250000);
                }else{
                    $this->conexao->rollBack();
                    throw $e;
                }
            }

        }



        public function ValidarCpf($usuario){
            try{
                $sql = 'SELECT * FROM tb_usuario WHERE cpf = :cpf';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $stm->bindValue(':cpf', $usuario->getCpf(), PDO::PARAM_STR);


                $this->conexao->beginTransaction();
                $stm->execute();
                $result = $stm->fetchColumn();
                $this->conexao->commit();

                if ($result > 0) {
                    return false;
                } else {
                    return true;
                }

            }catch(PDOException $e){
                if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
                    $this->conexao->commit();
                    usleep(250000);
                }else{
                    $this->conexao->rollBack();
                    throw $e;
                }
            }

        }

        public  function  validaEmail($usuario){
            try{
                $sql = 'SELECT * FROM tb_usuario WHERE email = :email';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $stm->bindValue(':email', $usuario->getEmail(), PDO::PARAM_STR);


                $this->conexao->beginTransaction();
                $stm->execute();
                $result = $stm->fetchColumn();
                $this->conexao->commit();

                if ($result > 0) {
                    return false;
                } else {
                    return true;
                }

            }catch(PDOException $e){
                if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
                    $this->conexao->commit();
                    usleep(250000);
                }else{
                    $this->conexao->rollBack();
                    throw $e;
                }
            }
        }


        public function salvarEndereco($endereco){

            try {

                $sql = 'INSERT INTO tb_endereco (id_usuario,cep,rua,bairro,cidade,complementacao,numero,uf) values (:id_usuario,:cep,
 :rua,:bairro, :cidade, :complementacao , :numero , :uf);';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $stm->bindValue(':id_usuario', $endereco->getId_usuario(), PDO::PARAM_INT);
                $stm->bindValue(':cep', $endereco->getcep(), PDO::PARAM_STR);
                $stm->bindValue(':rua', $endereco->getrua(), PDO::PARAM_STR);
                $stm->bindValue(':bairro', $endereco->getbairro(), PDO::PARAM_STR);
                $stm->bindValue(':cidade', $endereco->getcidade(), PDO::PARAM_STR);
                $stm->bindValue(':complementacao', $endereco->getcomplementacao(), PDO::PARAM_STR);
                $stm->bindValue(':numero', $endereco->getnumero(), PDO::PARAM_STR);
                $stm->bindValue(':uf', $endereco->getuf(), PDO::PARAM_STR);


                $this->conexao->beginTransaction();
                $stm->execute();
                $this->conexao->commit();

                return $stm;

            }catch(PDOException $e){
                if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
                    $this->conexao->commit();
                    usleep(250000);
                }else{
                    $this->conexao->rollBack();
                    throw $e;
                }
            }



        }




//
//
//
//		public function AlterarPrograma($programa){
//			try{
//				$sql = 'UPDATE tb_programa SET titulo = :nome_programa, descricao = :descricao_programa, cod_retorno = :codRetornprograma, tipo_pgm = :tipo_pgm  WHERE id_programa = :id_programa';
//				$this->pdoCon = new PdoCon();
//				$this->conexao = $this->pdoCon->getInstance();
//				$stm = $this->conexao->prepare($sql);
//
//				$stm->bindValue(':nome_programa', $programa->getNomePrograma(), PDO::PARAM_STR);
//				$stm->bindValue(':descricao_programa', $programa->getDescricaoPrograma(), PDO::PARAM_STR);
//				$stm->bindValue(':cod_retorno_programa', $programa->getCodRetornPrograma(), PDO::PARAM_STR);
//				$stm->bindValue(':tipo_pgm', $programa->getTipoPGM(), PDO::PARAM_STR);
//				$stm->bindValue(':id_programa', $programa->getId_programa(), PDO::PARAM_INT);
//
//				$this->conexao->beginTransaction();
//				$stm->execute();
//				$this->conexao->commit();
//				return $stm;
//
//
//
//			}catch(PDOException $e){
//				if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
//					$this->conexao->commit();
//					usleep(250000);
//				}else{
//					$this->conexao->rollBack();
//					throw $e;
//				}
//			}
//		}
//
//		public function DeletarPrograma($programa){
//			try{
//				$sql = 'DELETE FROM tb_programa WHERE id_programa = :id_programa';
//				$this->pdoCon = new PdoCon();
//				$this->conexao = $this->pdoCon->getInstance();
//				$stm = $this->conexao->prepare($sql);
//
//				$stm->bindValue(':id_programa', $programa->getId_programa(), PDO::PARAM_INT);
//
//				$this->conexao->beginTransaction();
//				$stm->execute();
//				$this->conexao->commit();
//				return $stm;
//
//			}catch(PDOException $e){
//				if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
//					$this->conexao->commit();
//					usleep(250000);
//				}else{
//					$this->conexao->rollBack();
//					throw $e;
//				}
//			}
//		}
//
//		public function ProgramasPorID($programa){
//			try{
//				$sql = 'SELECT * FROM tb_programa WHERE id_programa = :id_programa';
//				$this->pdoCon = new PdoCon();
//				$this->conexao = $this->pdoCon->getInstance();
//				$stm = $this->conexao->prepare($sql);
//
//				$stm->bindValue(':id_programa', $programa, PDO::PARAM_INT);
//
//				$this->conexao->beginTransaction();
//				$stm->execute();
//				$this->conexao->commit();
//				return $stm;
//
//			}catch(PDOException $e){
//				if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
//					$this->conexao->commit();
//					usleep(250000);
//				}else{
//					$this->conexao->rollBack();
//					throw $e;
//				}
//			}
//		}
//
//
//		public function listarPessoas(){
//			try{
//				$sql = 'SELECT * FROM tb_pessoa';
//				$this->pdoCon = new PdoCon();
//				$this->conexao = $this->pdoCon->getInstance();
//				$stm = $this->conexao->prepare($sql);
//
//				$this->conexao->beginTransaction();
//				$stm->execute();
//				$this->conexao->commit();
//				return $stm->fetchAll(PDO::FETCH_ASSOC);
//
//			}catch(PDOException $e){
//				if(stripos($e->getMessage(), 'DATABASE IS LOCKED' !== false)){
//					$this->conexao->commit();
//					usleep(250000);
//				}else{
//					$this->conexao->rollBack();
//					throw $e;
//				}
//			}
//		}
	}
?>