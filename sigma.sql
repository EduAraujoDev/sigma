--
-- Table structure for table `caixa`
--

DROP TABLE IF EXISTS `caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixa` (
  `id_caixa` int(11) NOT NULL DEFAULT '0',
  `id_transacao` int(11) DEFAULT NULL,
  `id_tipo_transacao` int(11) DEFAULT NULL,
  `data_transacao` date DEFAULT NULL,
  `sing` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_caixa`),
  KEY `Fk_Caixa` (`id_tipo_transacao`),
  CONSTRAINT `Fk_Caixa` FOREIGN KEY (`id_tipo_transacao`) REFERENCES `tipo_transacoes` (`id_tipo_transacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `caixa_categoria`
--

DROP TABLE IF EXISTS `caixa_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caixa_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `cpf_cnpj` varchar(80) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(3) DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `celular` varchar(18) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `despesa`
--

DROP TABLE IF EXISTS `despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesa` (
  `id_despesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `id_status` tinyint(4) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id_despesa`),
  KEY `FK_Despesas_Categoria` (`id_categoria`),
  KEY `FK_Despesas_Status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `despesa_categoria`
--

DROP TABLE IF EXISTS `despesa_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesa_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `despesa_pedido`
--

DROP TABLE IF EXISTS `despesa_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesa_pedido` (
  `id_despesa_pedido` int(11) NOT NULL,
  `id_pedido_compra` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_status` tinyint(4) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id_despesa_pedido`),
  KEY `FK_DespesaPedidos_PedidoCompra` (`id_pedido_compra`),
  KEY `FK_DespesaPedidos_categoria` (`id_categoria`),
  KEY `FK_DespesaPedidos_Status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `despesa_status`
--

DROP TABLE IF EXISTS `despesa_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesa_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `nome_fantasia` varchar(80) DEFAULT NULL,
  `cpf_cnpj` varchar(18) DEFAULT NULL,
  `ierg` varchar(18) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` varchar(3) DEFAULT NULL,
  `telefone` varchar(18) DEFAULT NULL,
  `celular` varchar(18) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orcamento_cabecalho`
--

DROP TABLE IF EXISTS `orcamento_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orcamento_cabecalho` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` tinyint(4) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_tipo_pagamento` int(11) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `desconto_adicional` decimal(10,2) DEFAULT NULL,
  `desconto_total` decimal(10,2) DEFAULT NULL,
  `total_bruto` decimal(10,2) DEFAULT NULL,
  `total_liquido` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_orcamento`),
  KEY `FK_OrcamentoCabecalho_status` (`id_status`),
  KEY `FK_OrcamentoCabecalho_cliente` (`id_cliente`),
  KEY `FK_OrcamentoCabecalho_TipoPagamento` (`id_tipo_pagamento`),
  CONSTRAINT `FK_OrcamentoCabecalho_TipoPagamento` FOREIGN KEY (`id_tipo_pagamento`) REFERENCES `tipo_pagamento` (`id_tipo_pagamento`),
  CONSTRAINT `FK_OrcamentoCabecalho_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `FK_OrcamentoCabecalho_status` FOREIGN KEY (`id_status`) REFERENCES `orcamento_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orcamento_produto`
--

DROP TABLE IF EXISTS `orcamento_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orcamento_produto` (
  `id_orcamento` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `deletado` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `PK_OrcamentoProdutos` (`id_orcamento`,`id_produto`),
  KEY `Fk_Produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orcamento_status`
--

DROP TABLE IF EXISTS `orcamento_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orcamento_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ordem_servico`
--

DROP TABLE IF EXISTS `ordem_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordem_servico` (
  `id_servico` int(11) DEFAULT NULL,
  `id_orcamento` int(11) DEFAULT NULL,
  UNIQUE KEY `PK_OrdemServicos` (`id_servico`,`id_orcamento`),
  KEY `FK_OrcamentoID` (`id_orcamento`),
  CONSTRAINT `FK_OrcamentoID` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`),
  CONSTRAINT `FK_Servicos` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ordem_servico_servicos`
--

DROP TABLE IF EXISTS `ordem_servico_servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordem_servico_servicos` (
  `id_servico` int(11) DEFAULT NULL,
  `id_orderm_servico` int(11) DEFAULT NULL,
  `deletado` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `PK_OrdemServicoServicos` (`id_servico`,`id_orderm_servico`),
  KEY `FK_OrdemServicoServicos_OSID` (`id_orderm_servico`),
  CONSTRAINT `FK_OrdemServicoServicos` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`),
  CONSTRAINT `FK_OrdemServicoServicos_OSID` FOREIGN KEY (`id_orderm_servico`) REFERENCES `ordemservico_cabecalho` (`id_orderm_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ordem_servico_status`
--

DROP TABLE IF EXISTS `ordem_servico_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordem_servico_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `ordemservico_cabecalho`
--

DROP TABLE IF EXISTS `ordemservico_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordemservico_cabecalho` (
  `id_orderm_servico` int(11) NOT NULL AUTO_INCREMENT,
  `id_orcamento` int(11) DEFAULT NULL,
  `id_status` tinyint(4) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_tipo_pagamento` int(11) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `desconto_adicional` decimal(10,2) DEFAULT NULL,
  `desconto_total` decimal(10,2) DEFAULT NULL,
  `total_bruto` decimal(10,2) DEFAULT NULL,
  `total_liquido` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_orderm_servico`),
  KEY `FK_OrdemServicoCabecalho_Status` (`id_status`),
  KEY `FK_OrdemServicoCabecalho` (`id_cliente`),
  KEY `FK_OrdemServicoCabecalho_TipoPgtoID` (`id_tipo_pagamento`),
  KEY `FK_OrdemServicoCabecalho_Orcamento` (`id_orcamento`),
  CONSTRAINT `FK_OrdemServicoCabecalho` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `FK_OrdemServicoCabecalho_Orcamento` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamento_cabecalho` (`id_orcamento`),
  CONSTRAINT `FK_OrdemServicoCabecalho_Status` FOREIGN KEY (`id_status`) REFERENCES `ordem_servico_status` (`id_status`),
  CONSTRAINT `FK_OrdemServicoCabecalho_TipoPgtoID` FOREIGN KEY (`id_tipo_pagamento`) REFERENCES `tipo_pagamento` (`id_tipo_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `pedido_compra_produto`
--

DROP TABLE IF EXISTS `pedido_compra_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_compra_produto` (
  `id_pedido_produto` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `deletado` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `PK_PedidoCompraProdutos` (`id_pedido_produto`,`id_produto`),
  KEY `FK_PedidoCompraProdutos_ProdutoID` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedido_compra_status`
--

DROP TABLE IF EXISTS `pedido_compra_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_compra_status` (
  `id_status` tinyint(4) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedidos_compra_cabecalho`
--

DROP TABLE IF EXISTS `pedidos_compra_cabecalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos_compra_cabecalho` (
  `id_pedido_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` tinyint(4) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL COMMENT '	',
  `id_tipo_pagamento` int(11) DEFAULT NULL,
  `numero_nf` varchar(20) DEFAULT NULL,
  `serie_nf` varchar(20) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_recebimento` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id_pedido_compra`),
  KEY `FK_PedidosCompraID_Status` (`id_status`),
  KEY `FK_PedidosCompraCabecalho_Forncedor` (`id_fornecedor`),
  CONSTRAINT `FK_PedidosCompraCabecalho_Forncedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`),
  CONSTRAINT `FK_PedidosCompraID_Status` FOREIGN KEY (`id_status`) REFERENCES `pedido_compra_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `quantidade_estoque` int(11) DEFAULT NULL,
  `quantidade_reservada` int(11) DEFAULT NULL,
  `valor_custo` decimal(10,2) DEFAULT NULL,
  `valor_venda` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `FK_Produtos_Categoria` (`id_categoria`),
  KEY `FK_Produtos_Marca` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produto_categoria`
--

DROP TABLE IF EXISTS `produto_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produto_marcas`
--

DROP TABLE IF EXISTS `produto_marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_curta` varchar(40) DEFAULT NULL,
  `descricao_longa` varchar(80) DEFAULT NULL,
  `valor` decimal(6,2) DEFAULT NULL,
  `observacoes` text,
  PRIMARY KEY (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_pagamento`
--

DROP TABLE IF EXISTS `tipo_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_pagamento` (
  `id_tipo_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_perfil`
--

DROP TABLE IF EXISTS `tipo_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_perfil` (
  `id_tipo_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_perfil`
--

LOCK TABLES `tipo_perfil` WRITE;
/*!40000 ALTER TABLE `tipo_perfil` DISABLE KEYS */;
INSERT INTO `tipo_perfil` VALUES (1,'Administrador'),(2,'Usuario');
/*!40000 ALTER TABLE `tipo_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_transacoes`
--

DROP TABLE IF EXISTS `tipo_transacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_transacoes` (
  `id_tipo_transacao` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_transacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `‌login` varchar(30) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `id_tipo_perfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `FK_Usuario` (`id_tipo_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
