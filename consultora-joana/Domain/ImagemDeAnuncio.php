<?php

class ImagemDeAnuncio
{

    private $id_imagem;
    private $nome;
    private $conteudo;
    private $tipo;
    private $tamanho;

    public function getIdImagem()
    {
        return $this->id_imagem;
    }

    public function setIdImagem($id_imagem)
    {
        settype($id_imagem, "int");
        $this->id_imagem = $id_imagem;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        settype($nome, "string");
        $this->nome = $nome;
    }

    public function getConteudo()
    {
        return $this->conteudo;
    }


    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        settype($tipo, "string");
        $this->tipo = $tipo;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }


    public function setTamanho($tamanho)
    {
        settype($tamanho, "int");
        $this->tamanho = $tamanho;
    }
}

?>