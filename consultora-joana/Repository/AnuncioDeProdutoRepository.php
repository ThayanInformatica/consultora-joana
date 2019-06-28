<?php
	require_once __DIR__ .'/../pdoConnection/PdoCon.php';

	class AnuncioDeProdutoRepository{
		private $pdoCon;
		private $conexao;
		public function CadastrarProduto($anuncioDeProduto){
			try{
				$sql = 'INSERT INTO tb_produto (nome_produto, desc_produto, preco, promocao, id_sub_categoria) VALUES (:nome_produto, :desc_produto, :preco, :promocao, :id_sub_categoria)';
				$this->pdoCon = new PdoCon();
				$this->conexao = $this->pdoCon->getInstance();
				$stm = $this->conexao->prepare($sql);

                $stm->bindValue(':nome_produto', $anuncioDeProduto->getNomeProduto(), PDO::PARAM_STR);
				$stm->bindValue(':desc_produto', $anuncioDeProduto->getDescProduto(), PDO::PARAM_STR);
                $stm->bindValue(':id_sub_categoria', $anuncioDeProduto->getIdSubCategoria(), PDO::PARAM_INT);
                $stm->bindValue(':id_sub_categoria', $anuncioDeProduto->getIdSubCategoria(), PDO::PARAM_INT);
                $stm->bindValue(':preco', $anuncioDeProduto->getPreco(), PDO::PARAM_INT);
                $stm->bindValue(':promocao', $anuncioDeProduto->getPromocao(), PDO::PARAM_INT);


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