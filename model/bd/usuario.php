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
                "idUsuario" => $rsDados['idUsuario'],
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

    $sql = "    insert into tblUsuario (
        nome,
        senha,
        email
        )
            values('".$dadosusuario['nome']."', 
            '". md5($dadosusuario['senha'])."',
            '".$dadosusuario['email']."');";

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

function deleteUsuario($id) {

    $conexao = conexaoMysql();

    $statusResposta = false;

    $sql = "delete from tblusuario where idusuario =".$id;

    if(mysqli_query($conexao,$sql)) {
        if (mysqli_affected_rows($conexao)) {
            $statusResposta = true;
        }
    }
    fecharConexaoMysql($conexao);
    return $statusResposta;

}

function selectByIdUsuario($id){

    $conexao = conexaoMysql();

    $sql = "select * from tblusuario where idusuario = ".$id;

  $result = mysqli_query($conexao, $sql);

    if ($result) {

        if ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados = array(
                "id"       => $rsDados['idUsuario'],
                "nome"       => $rsDados['nome'],
                "email"       => $rsDados['email']
            );
        };
        fecharConexaoMysql($conexao);

        return $arrayDados;

    } else {
        fecharConexaoMysql($conexao);                        
        return array(
            'idErro'  => 3,
            'message' => 'Não foi encontrado o usuario no banco '
        );
    }

}
function updateUsuario($dadosusuario)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "update tblUsuario set 
nome = '".$dadosusuario['nome']."',
email = '".$dadosusuario['email']."',
senha = '". md5($dadosusuario['senha'])."'
where idUsuario =".$dadosusuario['id'];

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