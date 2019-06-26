<?php
	require_once __DIR__ .'/../pdoConnection/PdoCon.php';
	
	class MarcasRepository{

        public function listarTodasAsMarcas(){
            try{
                $sql = 'SELECT * FROM tb_marca';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $this->conexao->beginTransaction();
                $stm->execute();
                $this->conexao->commit();
                return $stm->fetchAll(PDO::FETCH_ASSOC);

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


        public function RecuperarTodasCategoriasPorIDMarca($recuperarID){
            try{
                $sql = 'SELECT * FROM tb_categoria WHERE id_marca = :id_marca';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $stm->bindValue(':id_marca', $recuperarID, PDO::PARAM_INT);

                $this->conexao->beginTransaction();
                $stm->execute();
                $arrayJson = $stm->fetchAll();
                $this->conexao->commit();

                return $arrayJson;

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

        public function RecuperarTodasSubCatPorIdCat($recuperarIDCat){
            try{
                $sql = 'SELECT * FROM tb_sub_categoria WHERE id_categoria = :id_categoria';
                $this->pdoCon = new PdoCon();
                $this->conexao = $this->pdoCon->getInstance();
                $stm = $this->conexao->prepare($sql);

                $stm->bindValue(':id_categoria', $recuperarIDCat, PDO::PARAM_INT);

                $this->conexao->beginTransaction();
                $stm->execute();
                $arrayJson = $stm->fetchAll();
                $this->conexao->commit();

                return $arrayJson;

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