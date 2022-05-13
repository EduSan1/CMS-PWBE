<?php

require_once("conexaoMysqlPhp.php");

function InsertProduto($dadosProduto){

    $statusResposta = (boolean) false;
    $conexao = conexaoMysql();

    $sql = "insert into tblProduto (
        nome,
        descricao,
        preco,
        desconto,
        destaque,
        foto
        )
            values('".$dadosProduto['nome']."', 
            '".$dadosProduto['descricao']."',
            ".$dadosProduto['preco'].",
            ".$dadosProduto['desconto'].",
            ".$dadosProduto['destaque'].",
            '".$dadosProduto['foto']."'
        );";

            if (mysqli_query($conexao, $sql)) {
                if (mysqli_affected_rows($conexao)) {
                    $statusResposta = true;
                }else {
                    fecharConexaoMysql($conexao);                        
                    return array(
                        'idErro'  => 3,
                        'message' => 'Não foi possivel cadastrar no banco'
                    );
                }
            } 
        
            fecharConexaoMysql($conexao);
            return $statusResposta;

}

function selectAllProdutos(){

    $conexao = conexaoMysql();

    $sql = " select * from tblProduto order by idproduto desc ";

    $result = mysqli_query($conexao,$sql);


    if($result) {
        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados[$cont] = array(
                "id" => $rsDados['idProduto'],
                "nome" => $rsDados['nome'],
                "descricao" => $rsDados['descricao'],
                "preco" => $rsDados['preco'],
                "desconto" => $rsDados['desconto'],
                "foto" => $rsDados['foto'],
                "destaque"=> $rsDados['destaque']
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

function deleteProduto($id){
    
    $conexao = conexaoMysql();

    $statusResposta = false;

    $sql = "delete from tblproduto where idproduto = ".$id;

    if(mysqli_query($conexao,$sql)) {
        if (mysqli_affected_rows($conexao)) {
            $statusResposta = true;
        }
    }
    fecharConexaoMysql($conexao);
    return $statusResposta;
}

function selectByIdProduto($id){
    $conexao = conexaoMysql();

    $sql = "select * from tblproduto where idproduto = ".$id;

  $result = mysqli_query($conexao, $sql);

    if ($result) {

        if ($rsDados = mysqli_fetch_assoc($result)) {
           
            $arrayDados = array(
                "id" => $rsDados['idProduto'],
                "nome" => $rsDados['nome'],
                "descricao" => $rsDados['descricao'],
                "preco" => $rsDados['preco'],
                "desconto" => $rsDados['desconto'],
                "foto" => $rsDados['foto'],
                "destaque"=> $rsDados['destaque']
                

            );
        };
        fecharConexaoMysql($conexao);
        return $arrayDados;

    } else {
        fecharConexaoMysql($conexao);                        
        return array(
            'idErro'  => 3,
            'message' => 'Não foi encontrado o produto no banco '
        );
    }
}

function updateProduto($dadosProduto){
    $statusResposta = (boolean) false;
    // abre a conexão com o banco de dados
    $conexao = conexaoMysql();
    // update tblcontatos set nome =  'nome' where idcontato = 169;
    $sql = "        update tblproduto set 
    nome = '".$dadosProduto['nome']."',
    descricao = '".$dadosProduto['descricao']."',
    preco = ".$dadosProduto['preco'].",
    desconto = ".$dadosProduto['desconto'].",
    destaque = ".$dadosProduto['destaque'].",
    foto =  '".$dadosProduto['foto']."' 
    where idproduto =".$dadosProduto['id'];

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
