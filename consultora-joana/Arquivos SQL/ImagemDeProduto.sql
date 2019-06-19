CREATE TABLE IF NOT EXISTS `tb_imagem_de_produto` (
 `id_imagem` int unsigned NOT NULL AUTO_INCREMENT,
 `nome` varchar(60) NOT NULL,
 `conteudo` mediumblob NOT NULL,
 `tipo` varchar(20) NOT NULL,
 `tamanho` int(10) unsigned NOT NULL,
 PRIMARY KEY (`id_imagem`)
);