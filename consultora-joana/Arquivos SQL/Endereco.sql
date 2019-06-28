CREATE TABLE IF NOT EXISTS `tb_endereco` (
`id_endereco` int not NULL PRIMARY KEY AUTO_INCREMENT,
	`id_usuario` integer NOT NULL,
	`cep` integer NOT NULL,
		`rua` varchar(100) NOT NULL,
		`bairro` varchar(100) NOT NULL,
		`numero` integer null ,
		`complementacao` varchar(255) null ,
		`cidade` VARCHAR(100) NOT NULL ,
		`uf` varchar(5) NOT NULL,

CONSTRAINT fk_tb_edereco_tb_usuario FOREIGN KEY (id_usuario)
REFERENCES tb_usuario(id_usuario) on delete cascade
);