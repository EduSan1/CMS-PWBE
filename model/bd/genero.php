<?php


    /**********************************************************************************************************
    
        Objetivo: arquivo responsável por manipular a tabela de generos dentro do Banco de Dados
                    (insert, update, select e delete)
        Autor: Eduardo Santos Nascimento
        Data: 07/04/2022
        Versão: 1.0
    
 **********************************************************************************************************/
require_once("conexaoMysqlPhp.php");

function InsertGenero($dadoscontato){

    $statusResposta = (boolean) false;
    $conexao = conexaoMysql();

    $sql = "insert into tblgenero (nome) values('".$dadoscontato['nome']."')";

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao)) {
            $statusResposta = true;
        }else {
            fecharConexaoMysql($conexao);                        
            return array(
                'idErro'  => 3,
                'message' => 'Não foi encontrado no banco'
            );
        }
    } 

    fecharConexaoMysql($conexao);
    return $statusResposta;
        
}

function selectAllGeneros() {

    $conexao = conexaoMysql();

    $sql = "select * from tblgenero order by idgenero desc; ";

    $result = mysqli_query($conexao,$sql);


    if($result) {
        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados[$cont] = array(
                "id" => $rsDados['idGenero'],
                "nome" => $rsDados['nome']
            );
            $cont++;
        };

        fecharConexaoMysql($conexao);
        return $arrayDados;

    }else 
    return array(
        'idErro'  => 1,
        'message' => 'Não foi encontrado no banco');

}

function deleteGenero($id) {

    $conexao = conexaoMysql();

    $statusResposta = false;

    $sql = "delete from tblgenero where idgenero = ".$id;

    if(mysqli_query($conexao,$sql)) {
        if (mysqli_affected_rows($conexao)) {
            $statusResposta = true;
        }
    }
    fecharConexaoMysql($conexao);
    return $statusResposta;

}
function selectByIdGenero($id) {

    $conexao = conexaoMysql();

    $sql = "select * from tblgenero where idgenero = ".$id;

  $result = mysqli_query($conexao, $sql);

    if ($result) {

        if ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados = array(
                "id"       => $rsDados['idGenero'],
                "nome"       => $rsDados['nome']
            );
        };
        fecharConexaoMysql($conexao);

        return $arrayDados;

    } else {
        fecharConexaoMysql($conexao);                        
        return array(
            'idErro'  => 3,
            'message' => 'Não foi encontrado o genero no banco '
        );
    }
}

function updateGenero($dadosGenero) {
    $statusResposta = (boolean) false;
    // abre a conexão com o banco de dados
    $conexao = conexaoMysql();
    // update tblcontatos set nome =  'nome' where idcontato = 169;
    $sql = "update tblGenero set 
    nome = '" . $dadosGenero['nome']."'
    where idgenero = ".$dadosGenero['id'];

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao)) {
            $statusResposta = true;
        }
    } 
    //fecha a conexão com o banco de dados
    fecharConexaoMysql($conexao);
    //retorna o status da conexão com o banco 
    return $statusResposta;
}


?>