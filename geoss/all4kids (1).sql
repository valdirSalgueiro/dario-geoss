-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jul-2014 às 11:56
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `remedio` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
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
  `entregou_carteira` bit(1) NOT NULL,
  `ativo` bit(1) NOT NULL,
  `idade` int(10) NOT NULL,
  `idx_nivelescolar` int(10) NOT NULL,
  `data_nasc` datetime NOT NULL,
  `foto` tinytext NOT NULL,
  `sexo` bit(1) NOT NULL,
  `naturalidade` tinytext NOT NULL,
  `uf` tinytext NOT NULL,
  `pais` tinytext NOT NULL,
  `numero` tinytext NOT NULL,
  `complemento` tinytext NOT NULL,
  `bairro` tinytext NOT NULL,
  `cidade` tinytext NOT NULL,
  `estado` tinytext NOT NULL,
  `cep` tinytext NOT NULL,
  `reside` tinytext NOT NULL,
  `reside_outros` tinytext NOT NULL,
  `escola` tinytext NOT NULL,
  `alergia` tinytext NOT NULL,
  `restricao_alimentar` tinytext NOT NULL,
  `pessoas_autorizadas` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `email`, `nome_mae`, `nome_pai`, `responsavel_nome`, `responsavel_cpf`, `responsavel_rg`, `endereco`, `plano_saude`, `emergencia`, `responsavel_emergencia`, `carteira`, `entregou_carteira`, `ativo`, `idade`, `idx_nivelescolar`, `data_nasc`, `foto`, `sexo`, `naturalidade`, `uf`, `pais`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `reside`, `reside_outros`, `escola`, `alergia`, `restricao_alimentar`, `pessoas_autorizadas`) VALUES
(1, 'Joaozinho', 'joaozinho@gmail.com', 'Maria', 'Joao', 'Joao', '06341307497', '6982005', 'Rua Obidos numero 8', 'UNIMED', '', '', '', b'0', b'1', 4, 6, '2010-05-25 00:00:00', '', b'0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Mariazinha', 'mariazinha@gmail.com', 'Maria', 'Joao', 'Joao', '06341307497', '6982005', 'Rua Obidos numero 8', 'UNIMED', '', '', '', b'0', b'0', 3, 5, '2011-05-25 00:00:00', '', b'0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'jhgfhjgjgfh', '', '', '', '', '', '', '', '', '', '', '', b'0', b'0', 0, 0, '0000-00-00 00:00:00', '', b'1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_alergia`
--

CREATE TABLE IF NOT EXISTS `aluno_alergia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_alergia` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_atividade`
--

CREATE TABLE IF NOT EXISTS `aluno_atividade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_atividade` int(10) NOT NULL,
  `idx_aluno` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `aluno_atividade`
--

INSERT INTO `aluno_atividade` (`id`, `idx_atividade`, `idx_aluno`) VALUES
(33, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_medicamento`
--

CREATE TABLE IF NOT EXISTS `aluno_medicamento` (
  `tipo` bit(1) NOT NULL,
  `causa` tinytext NOT NULL,
  `medicacao` tinytext NOT NULL,
  `dosagem` tinytext NOT NULL,
  `horario` tinytext NOT NULL,
  `idx_aluno` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `aluno_medicamento`
--

INSERT INTO `aluno_medicamento` (`tipo`, `causa`, `medicacao`, `dosagem`, `horario`, `idx_aluno`, `id`) VALUES
(b'0', 'hgfdhgfdhg', '', '', '', 40, 8),
(b'0', 'causa2', '', '', '', 40, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_responsavel`
--

CREATE TABLE IF NOT EXISTS `aluno_responsavel` (
  `financeiro` bit(1) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nome` tinytext NOT NULL,
  `data_nasc` datetime NOT NULL,
  `cpf` tinytext NOT NULL,
  `rg` tinytext NOT NULL,
  `orgao` tinytext NOT NULL,
  `uf` tinytext NOT NULL,
  `local` tinytext NOT NULL,
  `endereco` tinytext NOT NULL,
  `cargo` tinytext NOT NULL,
  `numero` tinytext NOT NULL,
  `complemento` tinytext NOT NULL,
  `bairro` tinytext NOT NULL,
  `cidade` tinytext NOT NULL,
  `estado` tinytext NOT NULL,
  `telefone_comercial` tinytext NOT NULL,
  `telefone_residencial` tinytext NOT NULL,
  `celular1` tinytext NOT NULL,
  `celular2` tinytext NOT NULL,
  `celular1_operadora` tinytext NOT NULL,
  `celular2_operadora` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `facebook` tinytext NOT NULL,
  `outro` tinytext NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idx_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `aluno_responsavel`
--

INSERT INTO `aluno_responsavel` (`financeiro`, `tipo`, `nome`, `data_nasc`, `cpf`, `rg`, `orgao`, `uf`, `local`, `endereco`, `cargo`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `telefone_comercial`, `telefone_residencial`, `celular1`, `celular2`, `celular1_operadora`, `celular2_operadora`, `email`, `facebook`, `outro`, `id`, `idx_aluno`) VALUES
(b'0', 0, 'Resp 1', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, 40),
(b'1', 0, 'responsavel maria 4', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, 40),
(b'0', 0, 'Resp 2', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_servico`
--

CREATE TABLE IF NOT EXISTS `aluno_servico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_aluno` int(10) NOT NULL,
  `idx_servico` int(10) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `aluno_servico`
--

INSERT INTO `aluno_servico` (`id`, `idx_aluno`, `idx_servico`, `tipo`) VALUES
(4, 2, 2, 0),
(5, 2, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_telefone`
--

CREATE TABLE IF NOT EXISTS `aluno_telefone` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_aluno` int(10) NOT NULL,
  `numero` int(10) NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `vagas` int(10) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `vagas`, `valor`) VALUES
(1, 'Ingles', 10, 50),
(2, 'Judo', 15, 60),
(3, 'Alemao', 30, 70),
(10, 'atividade valendo', 100, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficio`
--

CREATE TABLE IF NOT EXISTS `beneficio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `valor` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `beneficio`
--

INSERT INTO `beneficio` (`id`, `nome`, `valor`) VALUES
(1, 'Vale Transporte', 100),
(2, 'Vale Alimentacao', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `repeat_start` int(11) NOT NULL,
  `repeat_interval` int(11) NOT NULL,
  `idx_fornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `nome`, `valor`, `data_vencimento`, `faturado`, `pagar`, `repetir`, `juros`, `descontos`, `valor_repetir`, `idx_categoria`, `idx_intervalo`, `repeat_start`, `repeat_interval`, `idx_fornecedor`) VALUES
(23, 'gfdgd', 0, '0000-00-00 00:00:00', b'0', b'1', b'0', 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Agua', 0, '2014-06-05 00:00:00', b'0', b'1', b'0', 0, 0, 0, 0, 1, 1401840000, 86400, 0);

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_categoria` int(10) NOT NULL,
  `idx_conta` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_atividade` int(10) NOT NULL,
  `idx_horario` int(10) NOT NULL,
  `idx_dia` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `dia_horario_atividade`
--

INSERT INTO `dia_horario_atividade` (`id`, `idx_atividade`, `idx_horario`, `idx_dia`) VALUES
(8, 1, 10, 2),
(7, 4, 5, 3),
(6, 3, 1, 1),
(9, 2, 5, 1),
(10, 2, 5, 3),
(15, 10, 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_horario_servico`
--

CREATE TABLE IF NOT EXISTS `dia_horario_servico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_servico` int(10) NOT NULL,
  `idx_horario` int(10) NOT NULL,
  `idx_dia` int(10) NOT NULL,
  PRIMARY KEY (`id`)
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
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` int(11) NOT NULL,
  `responsavel` tinytext NOT NULL,
  `cnpj` int(11) NOT NULL,
  `endereco` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `telefone_comercial` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `logomarca` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filho`
--

CREATE TABLE IF NOT EXISTS `filho` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `data_nasc` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `endereco` tinytext,
  `tipo_pessoa` bit(1) DEFAULT b'0',
  `cnpj` int(10) NOT NULL DEFAULT '0',
  `razao_social` tinytext,
  `inscricao_estadual` int(11) DEFAULT NULL,
  `inscricao_municipal` int(11) DEFAULT NULL,
  `aniversario` date DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` tinytext,
  `complemento` tinytext,
  `cidade` tinytext,
  `fone_comercial` int(11) DEFAULT NULL,
  `fone_residencial` int(11) DEFAULT NULL,
  `contato` tinytext,
  `celular` int(11) DEFAULT NULL,
  `observacoes` tinytext,
  `email` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `endereco`, `tipo_pessoa`, `cnpj`, `razao_social`, `inscricao_estadual`, `inscricao_municipal`, `aniversario`, `cep`, `numero`, `bairro`, `complemento`, `cidade`, `fone_comercial`, `fone_residencial`, `contato`, `celular`, `observacoes`, `email`) VALUES
(1, 'Fornecedor1', '', b'0', 0, '', 0, 0, '0000-00-00', 0, 0, '', '', '', 0, 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE IF NOT EXISTS `funcao` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `carteiraprofissional` tinytext NOT NULL,
  `pis` tinytext NOT NULL,
  `tipocontrato` bit(1) NOT NULL,
  `celular` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `rg`, `titulo`, `endereco`, `telefone`, `remuneracao`, `idx_funcao`, `foto`, `planosaude`, `nomeplano`, `contatotelefone`, `contatonome`, `contatoendereco`, `carteiraprofissional`, `pis`, `tipocontrato`, `celular`) VALUES
(3, 'joao da vassoura', '', '', '', '', 0, 0, 0, '', b'0', '', 0, '', 0, '', '', b'0', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_beneficio`
--

CREATE TABLE IF NOT EXISTS `funcionario_beneficio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_funcionario` int(10) NOT NULL,
  `idx_beneficio` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_filho`
--

CREATE TABLE IF NOT EXISTS `funcionario_filho` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idx_funcionario` int(10) NOT NULL,
  `idx_filho` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE IF NOT EXISTS `horario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `horario` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
(10, '16:00 as 17:00'),
(15, '07:15 as 08:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `intervalo`
--

CREATE TABLE IF NOT EXISTS `intervalo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descricao` tinytext NOT NULL,
  PRIMARY KEY (`id`)
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
-- Stand-in structure for view `medicamentocontinuo`
--
CREATE TABLE IF NOT EXISTS `medicamentocontinuo` (
`tipo` bit(1)
,`causa` tinytext
,`medicacao` tinytext
,`dosagem` tinytext
,`horario` tinytext
,`idx_aluno` int(11)
,`id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `medicamentoemergencia`
--
CREATE TABLE IF NOT EXISTS `medicamentoemergencia` (
`tipo` bit(1)
,`causa` tinytext
,`medicacao` tinytext
,`dosagem` tinytext
,`horario` tinytext
,`idx_aluno` int(11)
,`id` int(11)
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` tinytext NOT NULL,
  `tipo` tinytext NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`, `tipo`, `valor`) VALUES
(1, 'Transporte Escolar', '', 0),
(2, 'Almoco', '', 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` tinytext NOT NULL,
  `senha` tinytext NOT NULL,
  `idx_nivel` int(10) NOT NULL,
  PRIMARY KEY (`id`)
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

-- --------------------------------------------------------

--
-- Structure for view `medicamentocontinuo`
--
DROP TABLE IF EXISTS `medicamentocontinuo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `medicamentocontinuo` AS select `aluno_medicamento`.`tipo` AS `tipo`,`aluno_medicamento`.`causa` AS `causa`,`aluno_medicamento`.`medicacao` AS `medicacao`,`aluno_medicamento`.`dosagem` AS `dosagem`,`aluno_medicamento`.`horario` AS `horario`,`aluno_medicamento`.`idx_aluno` AS `idx_aluno`,`aluno_medicamento`.`id` AS `id` from `aluno_medicamento` where (`aluno_medicamento`.`tipo` = 0);

-- --------------------------------------------------------

--
-- Structure for view `medicamentoemergencia`
--
DROP TABLE IF EXISTS `medicamentoemergencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `medicamentoemergencia` AS select `aluno_medicamento`.`tipo` AS `tipo`,`aluno_medicamento`.`causa` AS `causa`,`aluno_medicamento`.`medicacao` AS `medicacao`,`aluno_medicamento`.`dosagem` AS `dosagem`,`aluno_medicamento`.`horario` AS `horario`,`aluno_medicamento`.`idx_aluno` AS `idx_aluno`,`aluno_medicamento`.`id` AS `id` from `aluno_medicamento` where (`aluno_medicamento`.`tipo` = 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
