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