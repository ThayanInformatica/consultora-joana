CREATE TABLE IF NOT EXISTS `tb_usuario` (
`id_usuario` int not NULL PRIMARY KEY AUTO_INCREMENT,
		`email`VARCHAR(100) NOT NULL,
		`nome` varchar (100) NOT NULL,
		`senha` TEXT NOT NULL,
		`cpf` VARCHAR(15) NOT null
);