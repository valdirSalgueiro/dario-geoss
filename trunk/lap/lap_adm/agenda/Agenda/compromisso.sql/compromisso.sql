-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Nov 03, 2006 as 03:12 PM
-- Versão do Servidor: 5.0.21
-- Versão do PHP: 5.1.4
-- 
-- Banco de Dados: `geracao`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `compromisso`
-- 

CREATE TABLE `compromisso` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `data` date NOT NULL,
  `hora` char(40) collate latin1_general_ci NOT NULL,
  `titulo` varchar(150) collate latin1_general_ci NOT NULL,
  `compromisso` longtext collate latin1_general_ci NOT NULL,
  `cor` char(6) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

-- 
-- Extraindo dados da tabela `compromisso`
-- 

INSERT INTO `compromisso` VALUES (7, '2006-11-03', 'Inicio as 18:00', 'Revista PHP', 'Revista PHP<br /><a href="http://www.revistaphp.com.br">http://www.revistaphp.com.br</a><br /><br />Cadastro: <br /><a href="http://www.revistaphp.com.br/cadastro.php">http://www.revistaphp.com.br/cadastro.php</a><br />', '99FFFF');
