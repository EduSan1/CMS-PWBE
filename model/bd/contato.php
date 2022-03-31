<?php

    /**********************************************************************************************************
    
        Objetivo: arquivo responsável por manipular os dados dentro do Banco de Dados
                    (insert, update, select e delete)
        Autor: Eduardo Santos Nascimento
        Data: 25/02/2022
        Versão: 1.0
    
 **********************************************************************************************************/

require_once("conexaoMysqlPhp.php");

function selectAllContato() {

    $conexao = conexaoMysql();

    $sql = "select * from tblContatos order by idContato desc";

    $result = mysqli_query($conexao,$sql);

    if ($result) {

        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {

            $arrayDados[$cont] = array(
                "id"    => $rsDados['idContato'],
                "nome"    => $rsDados['nome'],
                "email"    => $rsDados['email'],
                "mensagem"    => $rsDados['mensagem']
            );
            $cont++;
        };

        fecharConexaoMysql($conexao);
        return $arrayDados;
    }else {
        fecharConexaoMysql($conexao);                        
        return array(
            'idErro'  => 1,
            'message' => 'Não foi encontrado no banco'
        );
    }

}

?>