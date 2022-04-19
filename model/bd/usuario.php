<?php

require_once("conexaoMysqlPhp.php");

function SelectAllUsuarios(){

    $conexao = conexaoMysql();

    $sql = "select * from tblusuario order by idusuario desc; ";

    $result = mysqli_query($conexao,$sql);

    if($result) {
        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados[$cont] = array(
                "nome" => $rsDados['nome'],
                "senha" => $rsDados['senha'],
                "email" => $rsDados['email'],
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

function InsertUsuario($dadosusuario){

    $statusResposta = (boolean) false;
    $conexao = conexaoMysql();

    $sql = "insert into tblgenero (nome) values('".$dadosusuario['nome']."')";

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

?>