<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Caixa extends CI_Controller {

    public function index() {
        $user = $_SESSION['userLogin'];
        $data = ['base_url' => $this->config->base_url(),
         'user' => $user,
        ];
        $this->twig->display('caixa/listar', $data);
    }

    public function listarBusca() {
        $user = $_SESSION['userLogin'];
        $date = \DateTime::createFromFormat('d/m/Y', $this->input->post('data_criacao'));
        $dataInicio = $date->format('Y-m-d');


        $date2 = \DateTime::createFromFormat('d/m/Y', $this->input->post('data_vencimento'));
        $dataFinal = $date2->format('Y-m-d');

        $sql = "SELECT SUM(Z.Valor) AS Total FROM (SELECT D.id_despesa AS Codigo, 'Despesa Paga' AS Tipo, D.data_pagamento AS DataFinalizacao, D.total * -1 AS Valor FROM despesa AS D INNER JOIN despesa_status AS DS ON D.id_status = DS.id_status WHERE DS.titulo = 'Paga'AND D.data_pagamento IS NOT NULL AND D.data_pagamento BETWEEN '" . $dataInicio . "' AND '" . $dataFinal . "' UNION ALL SELECT OC.id_orcamento AS Codigo, 'Orçamento Reprovado e Pago' AS Tipo, OC.data_finalizacao AS DataFinalizacao, OC.total_liquido AS Valor FROM orcamento_cabecalho AS OC INNER JOIN orcamento_status AS OS ON OC.id_status = OS.id_status WHERE OC.data_finalizacao IS NOT NULL AND OC.data_finalizacao BETWEEN '" . $dataInicio . "' AND '" . $dataFinal . "' AND OS.titulo = 'Reprovado e Pago'UNION ALL SELECT OSC.id_ordem_servico AS Codigo, 'Ordem de Serviço Paga' AS Tipo, OSC.data_finalizacao AS DataFinalizacao, OSC.total_liquido AS Valor FROM ordem_servico_cabecalho AS OSC INNER JOIN ordem_servico_status AS OSS ON OSC.id_status = OSS.id_status WHERE OSC.data_finalizacao IS NOT NULL AND OSC.data_finalizacao BETWEEN '" . $dataInicio . "' AND '" . $dataFinal . "' AND OSS.titulo = 'Finalizada e Paga') AS Z";
        $sql2 = "SELECT Z.Codigo, Z.Tipo, DATE_FORMAT(Z.DataFinalizacao,'%d/%m/%Y') AS DataFinalizacao, Z.Valor FROM (SELECT D.id_despesa AS Codigo, 'Despesa Paga' AS Tipo, D.data_pagamento AS DataFinalizacao, D.total * -1 AS Valor FROM despesa AS D INNER JOIN despesa_status AS DS ON D.id_status = DS.id_status WHERE DS.titulo = 'Paga'AND D.data_pagamento IS NOT NULL AND D.data_pagamento BETWEEN '" . $dataInicio . "' AND '" . $dataFinal . "' UNION ALL SELECT OC.id_orcamento AS Codigo, 'Orçamento Reprovado e Pago' AS Tipo, OC.data_finalizacao AS DataFinalizacao, OC.total_liquido AS Valor FROM orcamento_cabecalho AS OC INNER JOIN orcamento_status AS OS ON OC.id_status = OS.id_status WHERE OC.data_finalizacao IS NOT NULL AND OC.data_finalizacao BETWEEN '" . $dataInicio . "' AND '" . $dataFinal . "' AND OS.titulo = 'Reprovado e Pago'UNION ALL SELECT OSC.id_ordem_servico AS Codigo, 'Ordem de Serviço Paga' AS Tipo, OSC.data_finalizacao AS DataFinalizacao, OSC.total_liquido AS Valor FROM ordem_servico_cabecalho AS OSC INNER JOIN ordem_servico_status AS OSS ON OSC.id_status = OSS.id_status WHERE OSC.data_finalizacao IS NOT NULL AND OSC.data_finalizacao BETWEEN '" . $dataInicio . "' AND '" . $dataFinal . "' AND OSS.titulo = 'Finalizada e Paga') AS Z ORDER BY Z.DataFinalizacao";

//             printf($sql);
//             //printf($sql2);
//             die();

        $query = $this->db->query($sql);
        $query2 = $this->db->query($sql2);

        $result = $query->result();
        $result2 = $query2->result();



//        foreach ($result as $row) {
//            var_dump($row);
//        }
//        
//        foreach ($result2 as $row2) {
//            var_dump($row2);
//        }
        $data = [
            'base_url' => $this->config->base_url(),
            'balancos' => $result[0],
            'extratos' => $result2,
            'user' => $user,
        ];
//                printf(extratos);
//                printf($data); 

        $this->twig->display('caixa/listar', $data);
    }

}
