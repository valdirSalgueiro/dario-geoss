DROP TABLE IF EXISTS dia;
DROP TABLE IF EXISTS horario;
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS aluno;
DROP TABLE IF EXISTS nivelescolar;
DROP TABLE IF EXISTS atividade;
DROP TABLE IF EXISTS dia_atividade;
DROP TABLE IF EXISTS horario_atividade;
DROP TABLE IF EXISTS dia_servico;
DROP TABLE IF EXISTS horario_servico;
DROP TABLE IF EXISTS nivel_escolar;
DROP TABLE IF EXISTS alergia;
DROP TABLE IF EXISTS aluno_alergia;
DROP TABLE IF EXISTS aluno_atividade;
DROP TABLE IF EXISTS telefone;
DROP TABLE IF EXISTS telefone_aluno;
DROP TABLE IF EXISTS funcionario;
DROP TABLE IF EXISTS beneficio;
DROP TABLE IF EXISTS funcionario_beneficio;
DROP TABLE IF EXISTS funcionario_filho;
DROP TABLE IF EXISTS funcao;
DROP TABLE IF EXISTS filho;
DROP TABLE IF EXISTS nivel;
DROP TABLE IF EXISTS conta;
DROP TABLE IF EXISTS intervalo;
DROP TABLE IF EXISTS servico;
DROP TABLE IF EXISTS categoria;
DROP TABLE IF EXISTS conta_categoria;
DROP TABLE IF EXISTS conta_atividade;
DROP TABLE IF EXISTS conta_aluno;
DROP TABLE IF EXISTS conta_servico;
DROP TABLE IF EXISTS aluno_servico;
DROP TABLE IF EXISTS fornecedor;

CREATE TABLE `dia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `horario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `horario` tinytext NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `email` tinytext NOT NULL,
  `nome_mae` tinytext NOT NULL,
  `nome_pai` tinytext NOT NULL,
  `responsavel_nome` tinytext NOT NULL,
  `responsavel_cpf` tinytext NOT NULL,
  `responsavel_rg` tinytext NOT NULL,
  `endereco` tinytext NOT NULL,
  `plano_saude` tinytext NOT NULL,
  `emergencia` tinytext NOT NULL,
  `responsavel_emergencia` tinytext NOT NULL,
  `carteira` tinytext NOT NULL, 
  `entregou_carteira` BIT NOT NULL,
  `ativo` BIT NOT NULL,
  `idade` int(10) NOT NULL,
  `idx_nivelescolar` int(10) NOT NULL,
  `data_nasc` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `nivelescolar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `alergia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `remedio` tinytext NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `aluno_alergia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_alergia` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `vagas` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `dia_atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_atividade` int(10) NOT NULL,
  `idx_dia` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `horario_atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_atividade` int(10) NOT NULL,
  `idx_horario` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `dia_servico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_servico` int(10) NOT NULL,
  `idx_dia` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `horario_servico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_servico` int(10) NOT NULL,
  `idx_horario` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `aluno_atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_atividade` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
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

CREATE TABLE `conta` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `valor` float NOT NULL,
  `data_vencimento` datetime NOT NULL,
  `faturado` BIT NOT NULL,
  `pagar` BIT NOT NULL, -- 1 - pagar 0 - receber
  `repetir` BIT NOT NULL,
  `juros` float NOT NULL,
  `descontos` float NOT NULL,
  `valor_repetir` int(10) NOT NULL,
  `idx_categoria` int(10) NOT NULL,
  `idx_intervalo` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `intervalo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `servico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `tipo` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `aluno_servico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_aluno` int(10) NOT NULL,
  `idx_servico` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `fornecedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `endereco` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `conta_categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_categoria` int(10) NOT NULL,
  `idx_conta` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- CREATE TABLE `conta_atividade` (
  -- `id` int(10) NOT NULL AUTO_INCREMENT,
  -- `idx_conta` int(10) NOT NULL,
  -- `idx_atividade` int(10) NOT NULL,
  -- PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- CREATE TABLE `conta_aluno` (
  -- `id` int(10) NOT NULL AUTO_INCREMENT,
  -- `idx_conta` int(10) NOT NULL,
  -- `idx_aluno` int(10) NOT NULL,
  -- PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- CREATE TABLE `conta_servico` (
  -- `id` int(10) NOT NULL AUTO_INCREMENT,
  -- `idx_conta` int(10) NOT NULL,
  -- `idx_servico` int(10) NOT NULL,
  -- PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO usuario (email,idx_nivel,senha) values ('vns',1,123);
