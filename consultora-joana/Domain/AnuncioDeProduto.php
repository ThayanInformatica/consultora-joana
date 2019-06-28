<?php

class AnuncioDeProduto
{

    private $id_produto;
    private $id_sub_categoria;
    private $nome_produto;
    private $desc_produto;
    private $preco;
    private $promocao;


    public function getIdProduto()
    {
        return $this->id_produto;
    }

    public function setIdProduto($id_produto)
    {
        settype($id_produto, "int");
        $this->id_produto = $id_produto;
    }

    public function getIdSubCategoria()
    {
        return $this->id_sub_categoria;
    }

    public function setIdSubCategoria($id_sub_categoria)
    {
        settype($id_sub_categoria, "int");
        $this->id_sub_categoria = $id_sub_categoria;
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

    public function getPreco()
    {
        return $this->preco;
    }


    public function setPreco($preco)
    {
        settype($preco, "string");
        $this->preco = $preco;
    }

    public function getPromocao()
    {
        return $this->promocao;
    }


    public function setPromocao($promocao)
    {
        settype($promocao, "string");
        $this->promocao = $promocao;
    }
}

?>