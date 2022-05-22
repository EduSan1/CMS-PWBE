<?php

require_once("conexaoMysqlPhp.php");

function selectAllProdutoGenero(){
    $conexao = conexaoMysql();

    //script para listar todos os dados da tabela do DB
    /*asc *//*desc */
    $sql = "select * from  tblProduto_Genero order by idProduto_Genero desc; ";

    //quando mandamos um script pro banco que seja insert delete ou update eles n retornam nada
    //o select por outro lado retorna os dados 
    $result = mysqli_query($conexao, $sql);
    //valida se retornou registros 
    if ($result) {
        //permite converter os dados do BD em um array para manipular com php
        //nesta repetição estamos convertendo os dados do bd em array, além do próprio while
        //conseguir gerenciar a quantidade de vezes que deveré ser feira a repetição
        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {
            //cria um array com os dados do BD
          
            $arrayDados[$cont] = array(
                "id"       => $rsDados['idProduto_Genero'],
                "produto"       => $rsDados['idProduto'],
                "genero"   => $rsDados['idGenero']
            );
            $cont++;
        };
        //solicita o fechamento da conexao com o banco de dados
        fecharConexaoMysql($conexao);

        if(isset($arrayDados))
            return $arrayDados;
        else
            return false;

        
    } else {
        fecharConexaoMysql($conexao);                        
        return array(
            'idErro'  => 3,
            'message' => 'Não foi encontrado no banco'
        );
    }
}
function insertProdutoGenero($dadosProdutoGenero){
    //variavel que salva o status de resposta do bd
    $statusResposta = (boolean) false;
    // abre a conexão com o banco de dados
    $conexao = conexaoMysql();

    $sql = "insert into tblProduto_Genero (
        idProduto,
        idGenero
        )
            values(".$dadosProdutoGenero['idProduto'].",
            ".$dadosProdutoGenero['idGenero']."
        );";

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
function deleteProdutoGenero($id) {
    $conexao = conexaoMysql();

    $statusResposta = false;

    $sql = "delete from tblProduto_Genero where idProduto_Genero=".$id;

    if(mysqli_query($conexao,$sql)){
        if(mysqli_affected_rows($conexao)) {
            $statusResposta = true;

        }

    }

    fecharConexaoMysql($conexao);
    return $statusResposta;

}
function selectByIdProdutoGenero($id){

    $conexao = conexaoMysql();

    
    $sql = "select * from tblProduto_Genero where idProduto_Genero = ".$id;

   

    $result = mysqli_query($conexao, $sql);



    if ($result) {

        if ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados = array(
                "id"       => $rsDados['idProduto_Genero'],
                "idGenero"       => $rsDados['idGenero'],
                "idProduto"   => $rsDados['idProduto']
            );
        };
        fecharConexaoMysql($conexao);

        return $arrayDados;

    } else {
        fecharConexaoMysql($conexao);                        
        return array(
            'idErro'  => 3,
            'message' => 'Não foi encontrado no banco'
        );
    }
}
function updateProdutoGenero($dadosProdutoGenero) {
        //variavel que salva o status de resposta do bd
        $statusResposta = (boolean) false;
        // abre a conexão com o banco de dados
        $conexao = conexaoMysql();
   
        $sql = "update tblProduto_Genero set 
        idGenero = " . $dadosProdutoGenero['idGenero'] . ",
        idProduto = " . $dadosProdutoGenero['idProduto'] . "
        where idProduto_Genero =".$dadosProdutoGenero['id'];

        
    
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
