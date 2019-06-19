<?php
// Incluindo arquivo de conexão
require_once __DIR__ . '/../pdoConnection/PdoCon.php';

// Funções de utilidade
require_once __DIR__ . '/../funcs/UtilImg.php';

class ImagemDeAnuncioRepository
{

    public function SalvarImagem($imagemDeAnuncio) {

        $sql = 'INSERT INTO tb_imagem_de_produto (nome, conteudo, tipo, tamanho) VALUES (:nome, :conteudo, :tipo, :tamanho)';
        $this->pdoCon = new PdoCon();
        $this->conexao = $this->pdoCon->getInstance();
        $stm = $this->conexao->prepare($sql);

// Definindo parâmetros

        $stm->bindValue(':nome', $imagemDeAnuncio->getNome(), PDO::PARAM_STR);
        $stm->bindValue(':conteudo', $imagemDeAnuncio->getConteudo(), PDO::PARAM_LOB);
        $stm->bindValue(':tipo', $imagemDeAnuncio->getTipo(), PDO::PARAM_STR);
        $stm->bindValue(':tamanho', $imagemDeAnuncio->getTamanho(), PDO::PARAM_INT);

        $this->conexao->beginTransaction();
        // Executando e exibindo resultado
        echo ($stm->execute()) ? retorno('Foto cadastrada com sucesso', true) : retorno($stm->errorInfo());
        $this->conexao->commit();

    }
}
