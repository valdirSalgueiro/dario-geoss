-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2014 às 22:00
-- Versão do servidor: 5.0.81-community-nt
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `all4kids`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alergia`
--

CREATE TABLE IF NOT EXISTS `alergia` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `remedio` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(10) NOT NULL auto_increment,
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
  `entregou_carteira` bit(1) NOT NULL,
  `ativo` bit(1) NOT NULL,
  `idade` int(10) NOT NULL,
  `idx_nivelescolar` int(10) NOT NULL,
  `data_nasc` datetime NOT NULL,
  `foto` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `nome_mae`, `nome_pai`, `responsavel_nome`, `responsavel_cpf`, `responsavel_rg`, `endereco`, `plano_saude`, `emergencia`, `responsavel_emergencia`, `carteira`, `entregou_carteira`, `ativo`, `idade`, `idx_nivelescolar`, `data_nasc`, `foto`) VALUES
(1, 'Joaozinho', 'joaozinho@gmail.com', 'Maria', 'Joao', 'Joao', '06341307497', '6982005', 'Rua Obidos numero 8', 'UNIMED', '', '', '', b'0', b'1', 4, 6, '2010-05-25 00:00:00', ''),
(2, 'Mariazinha', 'mariazinha@gmail.com', 'Maria', 'Joao', 'Joao', '06341307497', '6982005', 'Rua Obidos numero 8', 'UNIMED', '', '', '', b'0', b'0', 3, 5, '2011-05-25 00:00:00', ''),
(38, 'teste4', '', '', '', '', '', '', '', '', '', '', '', b'0', b'0', 1, 0, '2014-06-10 00:00:00', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_alergia`
--

CREATE TABLE IF NOT EXISTS `aluno_alergia` (
  `id` int(10) NOT NULL auto_increment,
  `idx_alergia` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_atividade`
--

CREATE TABLE IF NOT EXISTS `aluno_atividade` (
  `id` int(10) NOT NULL auto_increment,
  `idx_atividade` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `aluno_atividade`
--

INSERT INTO `aluno_atividade` (`id`, `idx_atividade`, `idx_aluno`) VALUES
(31, 1, 1),
(32, 2, 1),
(30, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_servico`
--

CREATE TABLE IF NOT EXISTS `aluno_servico` (
  `id` int(10) NOT NULL auto_increment,
  `idx_aluno` int(10) NOT NULL,
  `idx_servico` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `aluno_servico`
--

INSERT INTO `aluno_servico` (`id`, `idx_aluno`, `idx_servico`) VALUES
(2, 1, 2),
(3, 1, 1),
(4, 2, 2),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_telefone`
--

CREATE TABLE IF NOT EXISTS `aluno_telefone` (
  `id` int(10) NOT NULL auto_increment,
  `idx_aluno` int(10) NOT NULL,
  `numero` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `aluno_telefone`
--

INSERT INTO `aluno_telefone` (`id`, `idx_aluno`, `numero`) VALUES
(5, 1, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `vagas` int(10) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `vagas`, `valor`) VALUES
(1, 'Ingles', 10, 50),
(2, 'Judo', 15, 60),
(3, 'Alemao', 30, 70),
(4, 'nova atividade', 100, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficio`
--

CREATE TABLE IF NOT EXISTS `beneficio` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `valor` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Administrativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE IF NOT EXISTS `conta` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `valor` float NOT NULL,
  `data_vencimento` datetime NOT NULL,
  `faturado` bit(1) NOT NULL,
  `pagar` bit(1) NOT NULL,
  `repetir` bit(1) NOT NULL,
  `juros` float NOT NULL,
  `descontos` float NOT NULL,
  `valor_repetir` int(10) NOT NULL,
  `idx_categoria` int(10) NOT NULL,
  `idx_intervalo` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `nome`, `valor`, `data_vencimento`, `faturado`, `pagar`, `repetir`, `juros`, `descontos`, `valor_repetir`, `idx_categoria`, `idx_intervalo`) VALUES
(1, 'Agua', 100, '2014-06-04 00:00:00', b'0', b'1', b'1', 0, 0, 0, 1, 3),
(4, 'Transporte', 200, '2014-06-08 00:00:00', b'0', b'0', b'0', 0, 0, 0, 0, 0),
(8, 'Alimentacao', 200, '2014-06-01 00:00:00', b'1', b'0', b'0', 0, 0, 0, 1, 0),
(9, 'Nova conta', 1000, '2014-06-18 00:00:00', b'0', b'1', b'0', 0, 0, 0, 1, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `contapagar`
--
CREATE TABLE IF NOT EXISTS `contapagar` (
`id` int(10)
,`nome` tinytext
,`valor` float
,`data_vencimento` datetime
,`faturado` bit(1)
,`pagar` bit(1)
,`repetir` bit(1)
,`juros` float
,`descontos` float
,`valor_repetir` int(10)
,`idx_categoria` int(10)
,`idx_intervalo` int(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `contareceber`
--
CREATE TABLE IF NOT EXISTS `contareceber` (
`id` int(10)
,`nome` tinytext
,`valor` float
,`data_vencimento` datetime
,`faturado` bit(1)
,`pagar` bit(1)
,`repetir` bit(1)
,`juros` float
,`descontos` float
,`valor_repetir` int(10)
,`idx_categoria` int(10)
,`idx_intervalo` int(10)
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_categoria`
--

CREATE TABLE IF NOT EXISTS `conta_categoria` (
  `id` int(10) NOT NULL auto_increment,
  `idx_categoria` int(10) NOT NULL,
  `idx_conta` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `dia`
--

INSERT INTO `dia` (`id`, `nome`) VALUES
(1, 'Segunda'),
(2, 'Terca'),
(3, 'Quarta'),
(4, 'Quinta'),
(5, 'Sexta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_horario_atividade`
--

CREATE TABLE IF NOT EXISTS `dia_horario_atividade` (
  `id` int(10) NOT NULL auto_increment,
  `idx_atividade` int(10) NOT NULL,
  `idx_horario` int(10) NOT NULL,
  `idx_dia` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `dia_horario_atividade`
--

INSERT INTO `dia_horario_atividade` (`id`, `idx_atividade`, `idx_horario`, `idx_dia`) VALUES
(8, 1, 10, 2),
(7, 4, 5, 3),
(6, 3, 1, 1),
(9, 2, 5, 1),
(10, 2, 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_horario_servico`
--

CREATE TABLE IF NOT EXISTS `dia_horario_servico` (
  `id` int(10) NOT NULL auto_increment,
  `idx_servico` int(10) NOT NULL,
  `idx_horario` int(10) NOT NULL,
  `idx_dia` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `dia_horario_servico`
--

INSERT INTO `dia_horario_servico` (`id`, `idx_servico`, `idx_horario`, `idx_dia`) VALUES
(4, 1, 6, 2),
(3, 1, 6, 1),
(5, 1, 6, 3),
(6, 1, 6, 4),
(7, 1, 6, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filho`
--

CREATE TABLE IF NOT EXISTS `filho` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `endereco` tinytext,
  `tipo_pessoa` bit(1) default b'0',
  `cnpj` int(10) NOT NULL default '0',
  `razao_social` tinytext,
  `inscricao_estadual` int(11) default NULL,
  `inscricao_municipal` int(11) default NULL,
  `aniversario` date default NULL,
  `cep` int(11) default NULL,
  `numero` int(11) default NULL,
  `bairro` tinytext,
  `complemento` tinytext,
  `cidade` tinytext,
  `fone_comercial` int(11) default NULL,
  `fone_residencial` int(11) default NULL,
  `contato` tinytext,
  `celular` int(11) default NULL,
  `observacoes` tinytext,
  `email` tinytext,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `endereco`, `tipo_pessoa`, `cnpj`, `razao_social`, `inscricao_estadual`, `inscricao_municipal`, `aniversario`, `cep`, `numero`, `bairro`, `complemento`, `cidade`, `fone_comercial`, `fone_residencial`, `contato`, `celular`, `observacoes`, `email`) VALUES
(1, 'Fornecedor1', '', b'0', 0, '', 0, 0, '0000-00-00', 0, 0, '', '', '', 0, 0, '', 0, '', ''),
(2, '0', '0', b'0', 0, '0', 0, 0, '2014-06-10', 0, 0, '0', '0', '0', 0, 0, '0', 0, '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE IF NOT EXISTS `funcao` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `cpf` tinytext NOT NULL,
  `rg` tinytext NOT NULL,
  `titulo` tinytext NOT NULL,
  `endereco` tinytext NOT NULL,
  `telefone` int(10) NOT NULL,
  `remuneracao` int(10) NOT NULL,
  `idx_funcao` int(10) NOT NULL,
  `foto` tinytext NOT NULL,
  `planosaude` bit(1) NOT NULL,
  `nomeplano` tinytext NOT NULL,
  `contatotelefone` int(10) NOT NULL,
  `contatonome` tinytext NOT NULL,
  `contatoendereco` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `rg`, `titulo`, `endereco`, `telefone`, `remuneracao`, `idx_funcao`, `foto`, `planosaude`, `nomeplano`, `contatotelefone`, `contatonome`, `contatoendereco`) VALUES
(1, '4', '', '', '', '', 4, 4, 0, '', b'0', '', 4, '', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_beneficio`
--

CREATE TABLE IF NOT EXISTS `funcionario_beneficio` (
  `id` int(10) NOT NULL auto_increment,
  `idx_funcionario` int(10) NOT NULL,
  `idx_beneficio` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_filho`
--

CREATE TABLE IF NOT EXISTS `funcionario_filho` (
  `id` int(10) NOT NULL auto_increment,
  `idx_funcionario` int(10) NOT NULL,
  `idx_filho` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(10) NOT NULL auto_increment,
  `horario` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `horario`) VALUES
(1, '07:00 as 08:00'),
(2, '08:00 as 09:00'),
(3, '09:00 as 10:00'),
(4, '10:00 as 11:00'),
(5, '11:00 as 12:00'),
(6, '12:00 as 13:00'),
(7, '13:00 as 14:00'),
(8, '14:00 as 15:00'),
(9, '15:00 as 16:00'),
(10, '16:00 as 17:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `intervalo`
--

CREATE TABLE IF NOT EXISTS `intervalo` (
  `id` int(10) NOT NULL auto_increment,
  `descricao` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `intervalo`
--

INSERT INTO `intervalo` (`id`, `descricao`) VALUES
(1, 'Diariamente'),
(2, 'Semanalmente'),
(3, 'Mensalmente'),
(4, 'Bimestralmente'),
(5, 'Trimestralmente'),
(6, 'Semestralmente'),
(7, 'Anualmente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `nome`) VALUES
(1, 'MATERNAL'),
(2, 'JARDIM I'),
(3, 'JARDIM II'),
(4, 'JARDIM III'),
(5, 'APOIO PEDAGÃ“GICO'),
(6, 'Visitante'),
(7, 'Administrador'),
(8, 'Operador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivelescolar`
--

CREATE TABLE IF NOT EXISTS `nivelescolar` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `nivelescolar`
--

INSERT INTO `nivelescolar` (`id`, `nome`) VALUES
(1, 'BERÃ‡ARIO'),
(2, 'NINHO'),
(3, 'MATERNAL'),
(4, ' JARDIM I'),
(5, ' JARDIM II'),
(6, ' JARDIM III'),
(7, 'APOIO PEDAGÃ“GICO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(10) NOT NULL auto_increment,
  `nome` tinytext NOT NULL,
  `tipo` tinytext NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`, `tipo`, `valor`) VALUES
(1, 'Transporte Escolar', '', 0),
(2, 'Almoco', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL auto_increment,
  `email` tinytext NOT NULL,
  `senha` tinytext NOT NULL,
  `idx_nivel` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `idx_nivel`) VALUES
(1, 'vns', '123', 1);

-- --------------------------------------------------------

--
-- Structure for view `contapagar`
--
DROP TABLE IF EXISTS `contapagar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `contapagar` AS select `conta`.`id` AS `id`,`conta`.`nome` AS `nome`,`conta`.`valor` AS `valor`,`conta`.`data_vencimento` AS `data_vencimento`,`conta`.`faturado` AS `faturado`,`conta`.`pagar` AS `pagar`,`conta`.`repetir` AS `repetir`,`conta`.`juros` AS `juros`,`conta`.`descontos` AS `descontos`,`conta`.`valor_repetir` AS `valor_repetir`,`conta`.`idx_categoria` AS `idx_categoria`,`conta`.`idx_intervalo` AS `idx_intervalo` from `conta` where (`conta`.`pagar` = 1);

-- --------------------------------------------------------

--
-- Structure for view `contareceber`
--
DROP TABLE IF EXISTS `contareceber`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `contareceber` AS select `conta`.`id` AS `id`,`conta`.`nome` AS `nome`,`conta`.`valor` AS `valor`,`conta`.`data_vencimento` AS `data_vencimento`,`conta`.`faturado` AS `faturado`,`conta`.`pagar` AS `pagar`,`conta`.`repetir` AS `repetir`,`conta`.`juros` AS `juros`,`conta`.`descontos` AS `descontos`,`conta`.`valor_repetir` AS `valor_repetir`,`conta`.`idx_categoria` AS `idx_categoria`,`conta`.`idx_intervalo` AS `idx_intervalo` from `conta` where (`conta`.`pagar` = 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
