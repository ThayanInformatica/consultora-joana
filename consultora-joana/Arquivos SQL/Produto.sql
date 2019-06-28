CREATE TABLE IF NOT EXISTS `tb_produto`(
    `id_produto` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `nome_produto` TEXT NOT NULL,
    `desc_produto` TEXT NOT NULL,
        `preco` varchar(15) NOT NULL,
            `promocao` varchar(50) NOT NULL,
    `id_sub_categoria` INT NULL,
CONSTRAINT `fk_tb_produto_tb_sub_categoria_idx` FOREIGN KEY (`id_sub_categoria`) REFERENCES `tb_sub_categoria` (`id_sub_categoria`)

);