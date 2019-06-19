<?php

class AnuncioDeProduto
{

    private $id_produto;
    private $nome_produto;
    private $desc_produto;

    public function getIdProduto()
    {
        return $this->id_produto;
    }

    public function setIdProduto($id_produto)
    {
        settype($id_produto, "int");
        $this->id_produto = $id_produto;
    }

    public function getNomeProduto()
    {
        return $this->nome_produto;
    }

    public function setNomeProduto($nome_produto)
    {
        settype($nome_produto, "string");
        $this->nome_produto = $nome_produto;
    }

    public function getDescProduto()
    {
        return $this->desc_produto;
    }


    public function setDescProduto($desc_produto)
    {
        settype($desc_produto, "string");
        $this->desc_produto = $desc_produto;
    }
}

?>