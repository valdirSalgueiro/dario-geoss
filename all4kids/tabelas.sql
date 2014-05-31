CREATE TABLE `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` tinytext NOT NULL,
  `senha` tinytext NOT NULL,
  `idx_nivel` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `aluno` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `nome_mae` tinytext NOT NULL,
  `nome_pai` tinytext NOT NULL,
  `responsavel_nome` tinytext NOT NULL,
  `responsavel_cpf` tinytext NOT NULL,
  `responsavel_rg` tinytext NOT NULL,
  `endereco` tinytext NOT NULL,
  `idade` int(10) NOT NULL,
  `data_nasc` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `vagas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `atividade_desconto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `idx_atividade` int(10) NOT NULL,
  `idx_desconto` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `aluno_atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_atividade_desconto` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `desconto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `telefone` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `numero` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `telefone_aluno` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_aluno` int(10) NOT NULL,
  `idx_telefone` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `funcionario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `cpf` tinytext NOT NULL,
  `rg` tinytext NOT NULL,  
  `titulo` tinytext NOT NULL,
  `endereco` tinytext NOT NULL,
  `telefone` int(10) NOT NULL,
  `remuneracao` int(10) NOT NULL,
  `idx_funcao` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `beneficio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `valor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `funcionario_funcao` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_funcionario` int(10) NOT NULL,
  `idx_funcao` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `funcionario_beneficio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_funcionario` int(10) NOT NULL,
  `idx_beneficio` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `funcionario_filho` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_funcionario` int(10) NOT NULL,
  `idx_filho` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `funcao` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `filho` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `nivel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE usuario;
-- DROP TABLE aluno;
-- DROP TABLE atividade;
-- DROP TABLE atividade_desconto;
-- DROP TABLE aluno_atividade; 
-- DROP TABLE desconto;
-- DROP TABLE telefone;
-- DROP TABLE telefone_aluno;
-- DROP TABLE funcionario;
-- DROP TABLE beneficio;
-- DROP TABLE funcionario_funcao;
-- DROP TABLE funcionario_beneficio;
-- DROP TABLE funcionario_filho;
-- DROP TABLE funcao;
-- DROP TABLE filho;
