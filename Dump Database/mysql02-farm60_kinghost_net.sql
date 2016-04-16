-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql02-farm60.kinghost.net
-- Tempo de geração: 15/04/2016 às 18:16
-- Versão do servidor: 5.5.46-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `eduaraujodev`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf_cnpj` varchar(80) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(3) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `telefone_residencial` varchar(18) DEFAULT NULL,
  `celular` varchar(18) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `recebimento_notificacao` tinyint(1) DEFAULT NULL,
  `observacoes` text,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf_cnpj`, `data_nascimento`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `telefone_residencial`, `celular`, `email`, `recebimento_notificacao`, `observacoes`, `deletado`) VALUES
(1, 'Cliente teste', '999.999.999-99', NULL, 'Avenida teste', 999999, 'apto 1', 'Teste', 'São Paulo', 'SP', '99999-999', '(011) 9999-9999', '(011) 99999-9999', 'teste@teste.com', NULL, 'teste', 1),
(2, 'Teste', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 3434-5678', '(011) 00111-1198', 'kleber_nunes99@hotmail.com', NULL, 'Teste.', 0),
(3, 'Fábio Almeida', '831.067.618-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 98574-8569', 'fabio.almeida234@gmail.com', NULL, NULL, 0),
(4, 'Leonardo Alvares Teixeira', '723.577.332-41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 97856-3222', 'leonardo.ateixeira@hotmail.com', NULL, NULL, 0),
(5, 'Rafaela Machado Costa', '355.875.857-94', NULL, 'Rua Lourdes Barbosa Tango', NULL, NULL, 'Portal do Alto', 'Ribeirão Preto', 'SP', '14056-642', NULL, '(011) 95568-8741', 'rafaela_mcosta412@gmail.com', NULL, NULL, 0),
(6, 'Gisele Santana', '872.721.477-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 95668-8999', 'gisele_sant5467@gmail.com', NULL, NULL, 0),
(7, 'Mario Albuquerque Souto', '656.755.830-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 98989-5566', 'malbuquerquesouto@hotmail.com', NULL, NULL, 0),
(8, 'Wagner Leme Silva', '301.316.975-36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 95632-1455', 'wagner_leme_silva@hotmail.com', NULL, NULL, 0),
(9, 'Sérgio Alcântara Santos', '345.775.508-65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 25588-9631', 'sergio_alc_santos@gmail.com', NULL, NULL, 0),
(10, 'Beatriz Silva Rosa', '852.816.711-97', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 98566-3258', 'beatriz_sr@hotmail.com', NULL, NULL, 0),
(11, 'Mauricio Camilo Matos', '212.755.851-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 95624-8789', 'mauricio_c_mattos@hotmail.com', NULL, NULL, 0),
(12, 'Patricia Pessoa Junqueira', '873.221.665-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(011) 99856-3258', 'patricia_pjunqueira765@hotmail.com', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesa`
--

CREATE TABLE IF NOT EXISTS `despesa` (
  `id_despesa` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_pagamento` datetime DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `observacoes` text,
  `finalizado` tinyint(1) DEFAULT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesa_categoria`
--

CREATE TABLE IF NOT EXISTS `despesa_categoria` (
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesa_pedido`
--

CREATE TABLE IF NOT EXISTS `despesa_pedido` (
  `id_despesa_pedido` int(11) NOT NULL,
  `id_pedido_compra` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_pagamento` datetime DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `observacoes` text,
  `finalizado` tinyint(1) DEFAULT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `despesa_status`
--

CREATE TABLE IF NOT EXISTS `despesa_status` (
  `id_status` tinyint(4) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `ierg` varchar(18) DEFAULT NULL,
  `data_fundacao` date DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(3) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `telefone_fixo` varchar(18) NOT NULL,
  `celular` varchar(18) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `observacoes` text,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id_fornecedor`, `nome`, `nome_fantasia`, `cpf_cnpj`, `ierg`, `data_fundacao`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `telefone_fixo`, `celular`, `email`, `observacoes`, `deletado`) VALUES
(1, 'Canal Peças LTDA', 'Canal das Peças', '69.120.157/0001-57', NULL, NULL, 'Rua Alberto de Sequeira', 42, NULL, 'Tijuca', 'Rio de Janeiro', 'SP', '20260-160', '(021) 3149-5544', NULL, 'contato@canaldapeca.com.br', NULL, 0),
(2, 'Luciano Alcântara ME', 'Luci Auto Peças', '495.956.974-35', NULL, NULL, NULL, NULL, NULL, 'Nova Cidade', 'Ipeúna', 'SP', '13537-000', '(011) 2445-6743', NULL, 'contato@luciautopecas.com.br', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento_cabecalho`
--

CREATE TABLE IF NOT EXISTS `orcamento_cabecalho` (
  `id_orcamento` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_finalizacao` datetime DEFAULT NULL,
  `desconto_adicional` decimal(10,2) DEFAULT NULL,
  `desconto_total` decimal(10,2) DEFAULT NULL,
  `total_bruto` decimal(10,2) NOT NULL,
  `total_liquido` decimal(10,2) NOT NULL,
  `data_prevista_finalizacao` datetime NOT NULL,
  `finalizado` tinyint(1) DEFAULT NULL,
  `deletado` tinyint(1) DEFAULT NULL,
  `observacoes` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `orcamento_cabecalho`
--

INSERT INTO `orcamento_cabecalho` (`id_orcamento`, `id_status`, `id_cliente`, `id_tipo_pagamento`, `data_criacao`, `data_finalizacao`, `desconto_adicional`, `desconto_total`, `total_bruto`, `total_liquido`, `data_prevista_finalizacao`, `finalizado`, `deletado`, `observacoes`) VALUES
(2, 1, 3, 1, '2016-03-28 00:00:00', '2016-03-29 00:00:00', '50.00', '50.00', '1230.00', '615.00', '2016-03-29 00:00:00', 0, 0, NULL),
(3, 1, 8, 1, '2016-03-28 00:00:00', '2016-04-02 00:00:00', '15.00', '17.32', '1100.00', '909.50', '2016-04-02 00:00:00', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento_produto`
--

CREATE TABLE IF NOT EXISTS `orcamento_produto` (
  `id_orcamento` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL,
  `preco_cobrado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `orcamento_produto`
--

INSERT INTO `orcamento_produto` (`id_orcamento`, `id_produto`, `quantidade`, `desconto`, `preco_venda`, `deletado`, `preco_cobrado`) VALUES
(2, 3, 1, '0.00', '85.00', NULL, '360.00'),
(2, 5, 1, '0.00', '360.00', NULL, '400.00'),
(3, 17, 2, '0.00', '300.00', NULL, '200.00'),
(3, 29, 1, '10.00', '400.00', NULL, '300.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento_servico`
--

CREATE TABLE IF NOT EXISTS `orcamento_servico` (
  `id_servico` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL,
  `preco_cobrado` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `orcamento_servico`
--

INSERT INTO `orcamento_servico` (`id_servico`, `id_orcamento`, `deletado`, `preco_cobrado`) VALUES
(2, 2, NULL, '385.00'),
(2, 3, NULL, '400.00'),
(3, 2, NULL, '85.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento_status`
--

CREATE TABLE IF NOT EXISTS `orcamento_status` (
  `id_status` tinyint(4) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `orcamento_status`
--

INSERT INTO `orcamento_status` (`id_status`, `titulo`, `deletado`) VALUES
(1, 'Aberto', 0),
(2, 'Reprovado', 0),
(3, 'Reprovado e Pendente Pagamento', 0),
(4, 'Reprovado e Pago', 0),
(5, 'Reprovado e Não Pago', 0),
(6, 'Aprovado', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_servico_cabecalho`
--

CREATE TABLE IF NOT EXISTS `ordem_servico_cabecalho` (
  `id_ordem_servico` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_finalizacao` datetime DEFAULT NULL,
  `desconto_adicional` decimal(10,2) DEFAULT NULL,
  `desconto_total` decimal(10,2) DEFAULT NULL,
  `total_bruto` decimal(10,2) NOT NULL,
  `total_liquido` decimal(10,2) NOT NULL,
  `data_prevista_finalizacao` datetime NOT NULL,
  `finalizado` tinyint(1) DEFAULT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_servico_produto`
--

CREATE TABLE IF NOT EXISTS `ordem_servico_produto` (
  `id_ordem_servico` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_servico_servico`
--

CREATE TABLE IF NOT EXISTS `ordem_servico_servico` (
  `id_servico` int(11) NOT NULL,
  `id_ordem_servico` int(11) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_servico_status`
--

CREATE TABLE IF NOT EXISTS `ordem_servico_status` (
  `id_status` tinyint(4) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_compra_cabecalho`
--

CREATE TABLE IF NOT EXISTS `pedido_compra_cabecalho` (
  `id_pedido_compra` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL,
  `numero_nf` varchar(20) NOT NULL,
  `serie_nf` varchar(20) NOT NULL,
  `data_emissao` datetime NOT NULL,
  `data_recebimento` date DEFAULT NULL,
  `data_prevista_entrega` date DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `observacoes` text,
  `finalizado` tinyint(1) DEFAULT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_compra_produto`
--

CREATE TABLE IF NOT EXISTS `pedido_compra_produto` (
  `id_pedido_produto` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_compra_status`
--

CREATE TABLE IF NOT EXISTS `pedido_compra_status` (
  `id_status` tinyint(4) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `codigo_fabricante` varchar(40) DEFAULT NULL,
  `quantidade_estoque` int(11) NOT NULL,
  `quantidade_reservada` int(11) DEFAULT NULL,
  `valor_custo` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `id_marca`, `nome`, `codigo_fabricante`, `quantidade_estoque`, `quantidade_reservada`, `valor_custo`, `valor_venda`, `deletado`) VALUES
(1, 1, 4, 'Produto 1', '123456', 2, 0, '1.00', '1.00', 0),
(2, 3, 6, 'Aerofolio Celta', 'ioasdj89as7', 4, 0, '150.00', '180.00', 0),
(3, 3, 8, 'Aerofolio New Civic', NULL, 7, 1, '320.00', '360.00', 0),
(4, 3, 10, 'Aerofólio Ford Ka', 'asdj723h4j', 4, 0, '225.00', '270.00', 0),
(5, 3, 11, 'Kit Par Travessas Rack Preta', NULL, 10, 1, '385.00', '400.00', 0),
(6, 3, 9, 'Kit Longarinas + Travessas + Bau Maleiro', 'asodjhnasd89234nknmo', 4, 0, '1.55', '1.70', 0),
(7, 3, 13, 'Kit Travessa + Bau Maleiro 5 L', 'asdoijnoisn0090', 12, 0, '1.00', '1.20', 0),
(8, 4, 12, 'Defletor Olho de Gato Parachoque Sonata', 'asdac345fsd', 4, 0, '100.00', '120.00', 0),
(9, 4, 7, 'Refletor Parachoque Traseiro Voyage', 'adsdsaf453', 10, 0, '46.00', '70.00', 0),
(10, 4, 9, 'Refletor do Parachoque Traseiro Uno Way ', 'asdvn90hfg', 15, 0, '76.00', '90.00', 0),
(11, 5, 12, 'Acab Inferior Parachoque Dianteiro CRV', 'asdvbn48as', 5, 0, '296.00', '350.00', 0),
(12, 5, 7, 'Parachoque Dianteiro+Grades+Spoiler Polo', 'asdfvc234sdf56', 20, 0, '475.00', '550.00', 0),
(13, 5, 7, 'Parachoque Dianteiro Gol', 'asdxv5679cxzn786', 12, 0, '180.00', '235.00', 0),
(14, 6, 8, 'Painel Dianteiro City', 'asd234vcx6723cxv', 14, 0, '595.00', '370.00', 0),
(15, 6, 6, 'Painel Frontal Corsa Classic', 'asdzxc674d43', 22, 0, '150.00', '300.00', 0),
(16, 6, 10, 'Painel Frontal Ecosport', 'asd4546565po', 12, 0, '495.00', '580.00', 0),
(17, 7, 7, 'Capa Retrovisor Jetta', 'asdcv45dfs234', 30, 2, '150.00', '200.00', 0),
(18, 7, 14, 'Retrovisor Peugeot 308', 'asd234sfd', 21, 0, '575.00', '700.00', 0),
(19, 7, 15, 'Pisca Retrovisor Citroen C5', 'sdf5631ds', 18, 0, '100.00', '150.00', 0),
(20, 8, 6, 'Volante Celta Prisma', 'adsrgh879', 3, 0, '210.00', '300.00', 0),
(21, 8, 9, 'Volante Palio Siena Uno', 'grt5dg67', 8, 0, '136.00', '320.00', 0),
(22, 8, 7, 'Volante Rallye Preto com Cubo', 'sadf67g6fg', 28, 0, '146.00', '320.00', 0),
(23, 9, 16, 'Cilindro mestre do freio', 'abnmre6t324sdfs', 32, 0, '88.00', '150.00', 0),
(24, 9, 17, 'Cilindro mestre do freio Gol/Parati', 'gh56df234', 28, 0, '20.00', '70.00', 0),
(25, 9, 17, 'Óleo do freio - DOT 5.1', 'bnmn67dft435dfssd', 40, 0, '32.00', '60.00', 0),
(26, 10, 16, 'Bobina de ignição Ka/Focus/EcoSport', 'nmhi67fgh546', 15, 0, '245.00', '380.00', 0),
(27, 10, 10, 'Cabo de vela - Ranger', 'cbndgh5d45324234', 12, 0, '708.00', '880.00', 0),
(28, 10, 18, 'Vela de ignição Uno/Pampa', 'vnbn78567dsf', 19, 0, '63.00', '150.00', 0),
(29, 11, 20, 'DVD player - tela de 7" touch screen', 'vfg57456d234sdfsd', 5, 1, '1.25', '2.00', 0),
(30, 11, 21, 'Viva-voz com bluetooth - Alternativo', '987ygr34rdsft54', 26, 0, '160.00', '220.00', 0),
(31, 11, 19, 'Encosto de cabeça com monitor - Tela 7"', 'po98dnfk89u', 8, 0, '690.00', '770.00', 0),
(32, 3, 8, 'Jogo de Rodas CIvic', 'adfajs8934bjkd', 3, 0, '5000.00', '5500.00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_categoria`
--

CREATE TABLE IF NOT EXISTS `produto_categoria` (
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produto_categoria`
--

INSERT INTO `produto_categoria` (`id_categoria`, `titulo`, `deletado`) VALUES
(1, 'Categoria 1', 0),
(2, 'Categoria 2', 0),
(3, 'Acessórios Automotivos', 0),
(4, 'Iluminação', 0),
(5, 'Parachoque', 0),
(6, 'Lataria', 0),
(7, 'Retrovisor', 0),
(8, 'Volante', 0),
(9, 'Freio', 0),
(10, 'Ignição', 0),
(11, 'Som', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_marca`
--

CREATE TABLE IF NOT EXISTS `produto_marca` (
  `id_marca` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `produto_marca`
--

INSERT INTO `produto_marca` (`id_marca`, `titulo`, `deletado`) VALUES
(1, 'Marca 1', 1),
(2, 'Nova Marca 1', 1),
(3, 'teste marca', 1),
(4, 'Marca 1', 0),
(5, 'Marca 2', 0),
(6, 'Chevrolet', 0),
(7, 'Volkswagen', 0),
(8, 'Honda', 0),
(9, 'Fiat', 0),
(10, 'Ford', 0),
(11, 'Renault', 0),
(12, 'Hyundai', 0),
(13, 'Chery', 0),
(14, 'Peugeot', 0),
(15, 'Citroen', 0),
(16, 'Bosch', 0),
(17, 'Varga', 0),
(18, 'NGK', 0),
(19, 'JVC', 0),
(20, 'Pioneer', 0),
(21, 'Multilaser', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `descricao` varchar(80) DEFAULT NULL,
  `valor` decimal(6,2) NOT NULL,
  `observacoes` text,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `titulo`, `descricao`, `valor`, `observacoes`, `deletado`) VALUES
(1, 'Troca de óleo', 'Troca de óleo Castrol', '32.00', NULL, 0),
(2, 'Instalação de equipamentos de som', 'Instalação de peças de som/vídeo na parte interior', '385.00', NULL, 0),
(3, 'Troca de óleo', 'Trocal de óleo e limpeza geral no motor', '85.00', NULL, 0),
(4, 'Instalação trio elétrico', 'Vidro/alarme/trava automática', '1500.00', NULL, 0),
(5, 'Serviço teste', 'Serviço teste', '100.00', NULL, 0),
(6, 'Arranha', 'Arranhado', '111.12', 'oioio', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_pagamento`
--

CREATE TABLE IF NOT EXISTS `tipo_pagamento` (
  `id_tipo_pagamento` int(11) NOT NULL,
  `titulo` varchar(40) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipo_pagamento`
--

INSERT INTO `tipo_pagamento` (`id_tipo_pagamento`, `titulo`, `deletado`) VALUES
(1, 'Sem pagamento', 0),
(2, 'Dinheiro', 0),
(3, 'Cheque', 0),
(4, 'Cartão de Debito', 0),
(5, 'Cartão de Credito', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_perfil`
--

CREATE TABLE IF NOT EXISTS `tipo_perfil` (
  `id_tipo_perfil` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipo_perfil`
--

INSERT INTO `tipo_perfil` (`id_tipo_perfil`, `titulo`, `deletado`) VALUES
(1, 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `deletado` tinyint(1) DEFAULT NULL,
  `id_tipo_perfil` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `login`, `email`, `senha`, `deletado`, `id_tipo_perfil`) VALUES
(2, 'Administrador', 'admin', 'admin@admin.com', '491166b1c4150a5b80f14939f24564cc', 0, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `despesa`
--
ALTER TABLE `despesa`
  ADD PRIMARY KEY (`id_despesa`), ADD KEY `FK_Despesas_Categoria` (`id_categoria`), ADD KEY `FK_Despesas_Status` (`id_status`);

--
-- Índices de tabela `despesa_categoria`
--
ALTER TABLE `despesa_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `despesa_pedido`
--
ALTER TABLE `despesa_pedido`
  ADD PRIMARY KEY (`id_despesa_pedido`), ADD KEY `FK_DespesaPedidos_PedidoCompra` (`id_pedido_compra`), ADD KEY `FK_DespesaPedidos_categoria` (`id_categoria`), ADD KEY `FK_DespesaPedidos_Status` (`id_status`);

--
-- Índices de tabela `despesa_status`
--
ALTER TABLE `despesa_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Índices de tabela `orcamento_cabecalho`
--
ALTER TABLE `orcamento_cabecalho`
  ADD PRIMARY KEY (`id_orcamento`), ADD KEY `FK_OrcamentoCabecalho_status` (`id_status`), ADD KEY `FK_OrcamentoCabecalho_cliente` (`id_cliente`), ADD KEY `FK_OrcamentoCabecalho_TipoPagamento` (`id_tipo_pagamento`);

--
-- Índices de tabela `orcamento_produto`
--
ALTER TABLE `orcamento_produto`
  ADD UNIQUE KEY `PK_OrcamentoProdutos` (`id_orcamento`,`id_produto`), ADD KEY `Fk_Produto` (`id_produto`);

--
-- Índices de tabela `orcamento_servico`
--
ALTER TABLE `orcamento_servico`
  ADD UNIQUE KEY `PK_OrcamentoServicos` (`id_servico`,`id_orcamento`), ADD KEY `FK_OrcamentoID` (`id_orcamento`);

--
-- Índices de tabela `orcamento_status`
--
ALTER TABLE `orcamento_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `ordem_servico_cabecalho`
--
ALTER TABLE `ordem_servico_cabecalho`
  ADD PRIMARY KEY (`id_ordem_servico`), ADD KEY `FK_OrdemServicoCabecalho_Status` (`id_status`), ADD KEY `FK_OrdemServicoCabecalho` (`id_cliente`), ADD KEY `FK_OrdemServicoCabecalho_TipoPgtoID` (`id_tipo_pagamento`), ADD KEY `FK_OrdemServicoCabecalho_Orcamento` (`id_orcamento`);

--
-- Índices de tabela `ordem_servico_produto`
--
ALTER TABLE `ordem_servico_produto`
  ADD KEY `Fk_OrdemServicoProdutos_Produto` (`id_produto`), ADD KEY `FK_OrdemServicoProdutos_OSID` (`id_ordem_servico`);

--
-- Índices de tabela `ordem_servico_servico`
--
ALTER TABLE `ordem_servico_servico`
  ADD UNIQUE KEY `PK_OrdemServicoServicos` (`id_servico`,`id_ordem_servico`), ADD KEY `FK_OrdemServicoServicos_OSID` (`id_ordem_servico`);

--
-- Índices de tabela `ordem_servico_status`
--
ALTER TABLE `ordem_servico_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `pedido_compra_cabecalho`
--
ALTER TABLE `pedido_compra_cabecalho`
  ADD PRIMARY KEY (`id_pedido_compra`), ADD KEY `FK_PedidosCompraID_Status` (`id_status`), ADD KEY `FK_PedidosCompraCabecalho_Forncedor` (`id_fornecedor`);

--
-- Índices de tabela `pedido_compra_produto`
--
ALTER TABLE `pedido_compra_produto`
  ADD UNIQUE KEY `PK_PedidoCompraProdutos` (`id_pedido_produto`,`id_produto`), ADD KEY `FK_PedidoCompraProdutos_ProdutoID` (`id_produto`);

--
-- Índices de tabela `pedido_compra_status`
--
ALTER TABLE `pedido_compra_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`), ADD KEY `FK_Produtos_Categoria` (`id_categoria`), ADD KEY `FK_Produtos_Marca` (`id_marca`);

--
-- Índices de tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `produto_marca`
--
ALTER TABLE `produto_marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices de tabela `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  ADD PRIMARY KEY (`id_tipo_pagamento`);

--
-- Índices de tabela `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  ADD PRIMARY KEY (`id_tipo_perfil`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`), ADD KEY `FK_Usuario` (`id_tipo_perfil`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `despesa`
--
ALTER TABLE `despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `despesa_categoria`
--
ALTER TABLE `despesa_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `despesa_pedido`
--
ALTER TABLE `despesa_pedido`
  MODIFY `id_despesa_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `despesa_status`
--
ALTER TABLE `despesa_status`
  MODIFY `id_status` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `orcamento_cabecalho`
--
ALTER TABLE `orcamento_cabecalho`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `orcamento_status`
--
ALTER TABLE `orcamento_status`
  MODIFY `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `ordem_servico_cabecalho`
--
ALTER TABLE `ordem_servico_cabecalho`
  MODIFY `id_ordem_servico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `ordem_servico_status`
--
ALTER TABLE `ordem_servico_status`
  MODIFY `id_status` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pedido_compra_cabecalho`
--
ALTER TABLE `pedido_compra_cabecalho`
  MODIFY `id_pedido_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `pedido_compra_status`
--
ALTER TABLE `pedido_compra_status`
  MODIFY `id_status` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de tabela `produto_categoria`
--
ALTER TABLE `produto_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `produto_marca`
--
ALTER TABLE `produto_marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  MODIFY `id_tipo_pagamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  MODIFY `id_tipo_perfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `despesa`
--
ALTER TABLE `despesa`
ADD CONSTRAINT `FK_Despesas_Categoria` FOREIGN KEY (`id_categoria`) REFERENCES `despesa_categoria` (`id_categoria`),
ADD CONSTRAINT `FK_Despesas_Status` FOREIGN KEY (`id_status`) REFERENCES `despesa_status` (`id_status`);

--
-- Restrições para tabelas `despesa_pedido`
--
ALTER TABLE `despesa_pedido`
ADD CONSTRAINT `FK_DespesaPedidos_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `despesa_categoria` (`id_categoria`),
ADD CONSTRAINT `FK_DespesaPedidos_PedidoCompra` FOREIGN KEY (`id_pedido_compra`) REFERENCES `pedido_compra_cabecalho` (`id_pedido_compra`),
ADD CONSTRAINT `FK_DespesaPedidos_Status` FOREIGN KEY (`id_status`) REFERENCES `despesa_status` (`id_status`);

--
-- Restrições para tabelas `orcamento_cabecalho`
--
ALTER TABLE `orcamento_cabecalho`
ADD CONSTRAINT `FK_OrcamentoCabecalho_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
ADD CONSTRAINT `FK_OrcamentoCabecalho_status` FOREIGN KEY (`id_status`) REFERENCES `orcamento_status` (`id_status`),
ADD CONSTRAINT `FK_OrcamentoCabecalho_TipoPagamento` FOREIGN KEY (`id_tipo_pagamento`) REFERENCES `tipo_pagamento` (`id_tipo_pagamento`);

--
-- Restrições para tabelas `orcamento_produto`
--
ALTER TABLE `orcamento_produto`
ADD CONSTRAINT `Fk_Orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`),
ADD CONSTRAINT `Fk_Produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `orcamento_servico`
--
ALTER TABLE `orcamento_servico`
ADD CONSTRAINT `FK_OrcamentoID` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`),
ADD CONSTRAINT `FK_Servicos` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`);

--
-- Restrições para tabelas `ordem_servico_cabecalho`
--
ALTER TABLE `ordem_servico_cabecalho`
ADD CONSTRAINT `FK_OrdemServicoCabecalho` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
ADD CONSTRAINT `FK_OrdemServicoCabecalho_Orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`),
ADD CONSTRAINT `FK_OrdemServicoCabecalho_Status` FOREIGN KEY (`id_status`) REFERENCES `ordem_servico_status` (`id_status`),
ADD CONSTRAINT `FK_OrdemServicoCabecalho_TipoPgtoID` FOREIGN KEY (`id_tipo_pagamento`) REFERENCES `tipo_pagamento` (`id_tipo_pagamento`);

--
-- Restrições para tabelas `ordem_servico_produto`
--
ALTER TABLE `ordem_servico_produto`
ADD CONSTRAINT `FK_OrdemServicoProdutos_OSID` FOREIGN KEY (`id_ordem_servico`) REFERENCES `ordem_servico_cabecalho` (`id_ordem_servico`),
ADD CONSTRAINT `Fk_OrdemServicoProdutos_Produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `ordem_servico_servico`
--
ALTER TABLE `ordem_servico_servico`
ADD CONSTRAINT `FK_OrdemServicoServicos` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
ADD CONSTRAINT `FK_OrdemServicoServicos_OSID` FOREIGN KEY (`id_ordem_servico`) REFERENCES `ordem_servico_cabecalho` (`id_ordem_servico`);

--
-- Restrições para tabelas `pedido_compra_cabecalho`
--
ALTER TABLE `pedido_compra_cabecalho`
ADD CONSTRAINT `FK_PedidosCompraCabecalho_Forncedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`),
ADD CONSTRAINT `FK_PedidosCompraID_Status` FOREIGN KEY (`id_status`) REFERENCES `pedido_compra_status` (`id_status`);

--
-- Restrições para tabelas `pedido_compra_produto`
--
ALTER TABLE `pedido_compra_produto`
ADD CONSTRAINT `FK_PedidoCompraProdutos_Pedido` FOREIGN KEY (`id_pedido_produto`) REFERENCES `pedido_compra_cabecalho` (`id_pedido_compra`),
ADD CONSTRAINT `FK_PedidoCompraProdutos_ProdutoID` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
ADD CONSTRAINT `FK_Produtos_Categoria` FOREIGN KEY (`id_categoria`) REFERENCES `produto_categoria` (`id_categoria`),
ADD CONSTRAINT `FK_Produtos_Marca` FOREIGN KEY (`id_marca`) REFERENCES `produto_marca` (`id_marca`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `FK_Usuario` FOREIGN KEY (`id_tipo_perfil`) REFERENCES `tipo_perfil` (`id_tipo_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
