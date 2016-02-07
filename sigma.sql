CREATE DATABASE  IF NOT EXISTS `sigma`; 
USE `sigma`;


--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `nome_fantasia` varchar(80)  NULL,
  `cpf_cnpj` varchar(18) NULL,
  `ierg` varchar(18)  NULL,
  `data_fundacao` date  NULL,
  `logradouro` varchar(100) NULL,
  `numero` int(11)  NULL,
  `complemento` varchar(100)  NULL,
  `bairro` varchar(40)  NULL,
  `cidade` varchar(50)  NULL,
  `uf` varchar(3)  NULL,
  `cep` varchar(10)  NULL,
  `telefone_fixo` varchar(18) NOT NULL,
  `celular` varchar(18) NULL,
  `email` varchar(30) NOT NULL,
  `observacoes` text,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `pedido_compra_status`
--

DROP TABLE IF EXISTS `pedido_compra_status`;
CREATE TABLE `pedido_compra_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `pedido_compra_cabecalho`
--

DROP TABLE IF EXISTS `pedido_compra_cabecalho`;
CREATE TABLE `pedido_compra_cabecalho` (
  `id_pedido_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` tinyint(4) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL,
  `numero_nf` varchar(20) NOT NULL,
  `serie_nf` varchar(20) NOT NULL,
  `data_emissao` datetime NOT NULL,
  `data_recebimento` date  NULL,  
  `data_prevista_entrega` date  NULL,  
  `total` decimal(10,2) NOT NULL,
  `observacoes` text,  
  `finalizado` TINYINT(1),
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_pedido_compra`),
  KEY `FK_PedidosCompraID_Status` (`id_status`),
  KEY `FK_PedidosCompraCabecalho_Forncedor` (`id_fornecedor`),
  CONSTRAINT `FK_PedidosCompraID_Status` FOREIGN KEY (`id_status`) REFERENCES `pedido_compra_status` (`id_status`),
  CONSTRAINT `FK_PedidosCompraCabecalho_Forncedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `despesa_categoria`
--

DROP TABLE IF EXISTS `despesa_categoria`;
CREATE TABLE `despesa_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `despesa_status`
--

DROP TABLE IF EXISTS `despesa_status`;
CREATE TABLE `despesa_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `despesa_pedido`
--

DROP TABLE IF EXISTS `despesa_pedido`;
CREATE TABLE `despesa_pedido` (
  `id_despesa_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido_compra` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_vencimento` date NULL,
  `data_pagamento` datetime,
  `total` decimal(10,2) NOT NULL,
  `observacoes` text NULL,
  `finalizado` TINYINT(1),
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_despesa_pedido`),
  KEY `FK_DespesaPedidos_PedidoCompra` (`id_pedido_compra`),
  KEY `FK_DespesaPedidos_categoria` (`id_categoria`),
  KEY `FK_DespesaPedidos_Status` (`id_status`),
  CONSTRAINT `FK_DespesaPedidos_PedidoCompra` FOREIGN KEY (`id_pedido_compra`) REFERENCES `pedido_compra_cabecalho` (`id_pedido_compra`),
  CONSTRAINT `FK_DespesaPedidos_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `despesa_categoria` (`id_categoria`),
  CONSTRAINT `FK_DespesaPedidos_Status` FOREIGN KEY (`id_status`) REFERENCES `despesa_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `despesa`
--

DROP TABLE IF EXISTS `despesa`;
CREATE TABLE `despesa` (
  `id_despesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_vencimento` date NULL,
  `data_pagamento` datetime,
  `total` decimal(10,2) NOT NULL,
  `observacoes` text NULL,
  `finalizado` TINYINT(1),
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_despesa`),
  KEY `FK_Despesas_Categoria` (`id_categoria`),
  KEY `FK_Despesas_Status` (`id_status`),
  CONSTRAINT `FK_Despesas_Categoria` FOREIGN KEY (`id_categoria`) REFERENCES `despesa_categoria` (`id_categoria`),
  CONSTRAINT `FK_Despesas_Status` FOREIGN KEY (`id_status`) REFERENCES `despesa_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `orcamento_status`
--

DROP TABLE IF EXISTS `orcamento_status`;
CREATE TABLE `orcamento_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `cpf_cnpj` varchar(80) NULL,
  `data_nascimento` date NULL,
  `logradouro` varchar(100)  NULL,
  `numero` int(11) NULL,
  `complemento` varchar(100) NULL,
  `bairro` varchar(40) NULL,
  `cidade` varchar(50) NULL,
  `uf` varchar(3) NULL,
  `cep` varchar(10) NULL,
  `telefone_residencial` varchar(18) NULL,
  `celular` varchar(18) NOT NULL,
  `email` varchar(80) NULL,
  `recebimento_notificacao` TINYINT(1),
  `observacoes` text NULl,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `tipo_pagamento`
--

DROP TABLE IF EXISTS `tipo_pagamento`;
CREATE TABLE `tipo_pagamento` (
  `id_tipo_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_tipo_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `orcamento_cabecalho`
--

DROP TABLE IF EXISTS `orcamento_cabecalho`;
CREATE TABLE `orcamento_cabecalho` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` tinyint(4) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_finalizacao` datetime,
  `desconto_adicional` decimal(10,2) NULL,
  `desconto_total` decimal(10,2)  NULL,
  `total_bruto` decimal(10,2) NOT NULL,
  `total_liquido` decimal(10,2) NOT NULL,
  `data_prevista_finalizacao` datetime NOT NULL,
  `finalizado` TINYINT(1),
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_orcamento`),
  KEY `FK_OrcamentoCabecalho_status` (`id_status`),
  KEY `FK_OrcamentoCabecalho_cliente` (`id_cliente`),
  KEY `FK_OrcamentoCabecalho_TipoPagamento` (`id_tipo_pagamento`),
  CONSTRAINT `FK_OrcamentoCabecalho_status` FOREIGN KEY (`id_status`) REFERENCES `orcamento_status` (`id_status`),
  CONSTRAINT `FK_OrcamentoCabecalho_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `FK_OrcamentoCabecalho_TipoPagamento` FOREIGN KEY (`id_tipo_pagamento`) REFERENCES `tipo_pagamento` (`id_tipo_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `produto_categoria`
--

DROP TABLE IF EXISTS `produto_categoria`;
CREATE TABLE `produto_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `produto_marca`
--

DROP TABLE IF EXISTS `produto_marca`;
CREATE TABLE `produto_marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `codigo_fabricante` varchar(40),
  `quantidade_estoque` int(11) NOT NULL,
  `quantidade_reservada` int(11)  NULL,
  `valor_custo` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_produto`),
  KEY `FK_Produtos_Categoria` (`id_categoria`),
  KEY `FK_Produtos_Marca` (`id_marca`),
  CONSTRAINT `FK_Produtos_Categoria` FOREIGN KEY (`id_categoria`) REFERENCES `produto_categoria` (`id_categoria`),
  CONSTRAINT `FK_Produtos_Marca` FOREIGN KEY (`id_marca`) REFERENCES `produto_marca` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `orcamento_produto`
--

DROP TABLE IF EXISTS `orcamento_produto`;
CREATE TABLE `orcamento_produto` (
  `id_orcamento` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2) NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `deletado` TINYINT(1),
  UNIQUE KEY `PK_OrcamentoProdutos` (`id_orcamento`,`id_produto`),
  KEY `Fk_Produto` (`id_produto`),
  CONSTRAINT `Fk_Orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`),
  CONSTRAINT `Fk_Produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `ordem_servico_status`
--

DROP TABLE IF EXISTS `ordem_servico_status`;
CREATE TABLE `ordem_servico_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `ordem_servico_cabecalho`
--

DROP TABLE IF EXISTS `ordem_servico_cabecalho`;
CREATE TABLE `ordem_servico_cabecalho` (
  `id_ordem_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_orcamento` int(11) NOT NULL,
  `id_status` tinyint(4) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_pagamento` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL,
  `data_finalizacao` datetime,
  `desconto_adicional` decimal(10,2) NULL,
  `desconto_total` decimal(10,2)  NULL,
  `total_bruto` decimal(10,2) NOT NULL,
  `total_liquido` decimal(10,2) NOT NULL,
  `data_prevista_finalizacao` datetime NOT NULL,
  `finalizado` TINYINT(1),
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_ordem_servico`),
  KEY `FK_OrdemServicoCabecalho_Status` (`id_status`),
  KEY `FK_OrdemServicoCabecalho` (`id_cliente`),
  KEY `FK_OrdemServicoCabecalho_TipoPgtoID` (`id_tipo_pagamento`),
  KEY `FK_OrdemServicoCabecalho_Orcamento` (`id_orcamento`),
  CONSTRAINT `FK_OrdemServicoCabecalho_Status` FOREIGN KEY (`id_status`) REFERENCES `ordem_servico_status` (`id_status`),
  CONSTRAINT `FK_OrdemServicoCabecalho` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `FK_OrdemServicoCabecalho_TipoPgtoID` FOREIGN KEY (`id_tipo_pagamento`) REFERENCES `tipo_pagamento` (`id_tipo_pagamento`),
  CONSTRAINT `FK_OrdemServicoCabecalho_Orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `ordem_servico_produto`
--

DROP TABLE IF EXISTS `ordem_servico_produto`;
CREATE TABLE `ordem_servico_produto` (
  `id_ordem_servico` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` decimal(10,2)  NULL,
  `preco_venda` decimal(10,2) NOT NULL,
  `deletado` TINYINT(1),
  KEY `Fk_OrdemServicoProdutos_Produto` (`id_produto`),
  KEY `FK_OrdemServicoProdutos_OSID` (`id_ordem_servico`),
  CONSTRAINT `Fk_OrdemServicoProdutos_Produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  CONSTRAINT `FK_OrdemServicoProdutos_OSID` FOREIGN KEY (`id_ordem_servico`) REFERENCES `ordem_servico_cabecalho` (`id_ordem_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `descricao` varchar(80)  NULL,
  `valor` decimal(6,2) NOT NULL,
  `observacoes` text,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `orcamento_servico`
--

DROP TABLE IF EXISTS `orcamento_servico`;
CREATE TABLE `orcamento_servico` (
  `id_servico` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `deletado` TINYINT(1),
  UNIQUE KEY `PK_OrcamentoServicos` (`id_servico`,`id_orcamento`),
  KEY `FK_OrcamentoID` (`id_orcamento`),
  CONSTRAINT `FK_Servicos` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  CONSTRAINT `FK_OrcamentoID` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `ordem_servico_servico`
--

DROP TABLE IF EXISTS `ordem_servico_servico`;
CREATE TABLE `ordem_servico_servico` (
  `id_servico` int(11) NOT NULL,
  `id_ordem_servico` int(11) NOT NULL,
  `deletado` TINYINT(1),
  UNIQUE KEY `PK_OrdemServicoServicos` (`id_servico`,`id_ordem_servico`),
  KEY `FK_OrdemServicoServicos_OSID` (`id_ordem_servico`),
  CONSTRAINT `FK_OrdemServicoServicos` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  CONSTRAINT `FK_OrdemServicoServicos_OSID` FOREIGN KEY (`id_ordem_servico`) REFERENCES `ordem_servico_cabecalho` (`id_ordem_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `pedido_compra_produto`
--

DROP TABLE IF EXISTS `pedido_compra_produto`;

CREATE TABLE `pedido_compra_produto` (
  `id_pedido_produto` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `deletado` TINYINT(1),
  UNIQUE KEY `PK_PedidoCompraProdutos` (`id_pedido_produto`,`id_produto`),
  KEY `FK_PedidoCompraProdutos_ProdutoID` (`id_produto`),
  CONSTRAINT `FK_PedidoCompraProdutos_Pedido` FOREIGN KEY (`id_pedido_produto`) REFERENCES `pedido_compra_cabecalho` (`id_pedido_compra`),
  CONSTRAINT `FK_PedidoCompraProdutos_ProdutoID` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `tipo_perfil`
--

DROP TABLE IF EXISTS `tipo_perfil`;
CREATE TABLE `tipo_perfil` (
  `id_tipo_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `deletado` TINYINT(1),
  PRIMARY KEY (`id_tipo_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `deletado` TINYINT(1),
  `id_tipo_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_Usuario` (`id_tipo_perfil`),
  CONSTRAINT `FK_Usuario` FOREIGN KEY (`id_tipo_perfil`) REFERENCES `tipo_perfil` (`id_tipo_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
