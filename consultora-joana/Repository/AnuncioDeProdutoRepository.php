<?php
	require_once __DIR__ .'/../pdoConnection/PdoCon.php';

	class AnuncioDeProdutoRepository{
		private $pdoCon;
		private $conexao;
		public function CadastrarProduto($anuncioDeProduto){
			try{
				$sql = 'INSERT INTO tb_produto (nome_produto, desc_produto) VALUES (:nome_produto, :desc_produto)';
				$this->pdoCon = new PdoCon();
				$this->conexao = $this->pdoCon->getInstance();
				$stm = $this->conexao->prepare($sql);

                $stm->bindValue(':nome_produto', $anuncioDeProduto->getNomeProduto(), PDO::PARAM_STR);
				$stm->bindValue(':desc_produto', $anuncioDeProduto->getDescProduto(), PDO::PARAM_STR);

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
	}
?>