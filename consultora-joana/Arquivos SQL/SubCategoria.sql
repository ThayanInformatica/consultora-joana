CREATE TABLE IF NOT EXISTS `tb_sub_categoria` (
`id_sub_categoria` int not NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_sub_categoria` TEXT NOT NULL,
    `id_categoria` int not null,
            CONSTRAINT `fk_tb_sub_categoria_tb_categoria_idx` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`)
);

INSERT INTO tb_sub_categoria values (1,"Desodorante",1);
INSERT INTO tb_sub_categoria values (2,"Perfumes Masculinos",1);
INSERT INTO tb_sub_categoria values (3,"Malha Fina",2);
INSERT INTO tb_sub_categoria values (4,"Batom",3);
INSERT INTO tb_sub_categoria values (5,"Esmalte",4);
INSERT INTO tb_sub_categoria values (6,"Acessórios",5);