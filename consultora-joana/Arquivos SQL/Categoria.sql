CREATE TABLE IF NOT EXISTS `tb_categoria` (
`id_categoria` int not NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_categoria` TEXT NOT NULL,
    `id_marca` int not null,
            CONSTRAINT `fk_tb_categoria_tb_marca_idx` FOREIGN KEY (`id_marca`) REFERENCES `tb_marca` (`id_marca`)
);

INSERT INTO tb_categoria values (1,"Perfume",1);
INSERT INTO tb_categoria values (2,"Lingerie",2);
INSERT INTO tb_categoria values (3,"Corpo e Banho",3);
INSERT INTO tb_categoria values (4,"Unhas",4);
INSERT INTO tb_categoria values (5,"Maquiagem",5);