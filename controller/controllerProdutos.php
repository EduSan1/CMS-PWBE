<?php

/*******************************************************************************************
 Objetivo: arquivo responsável pela manipulação de dados de produto
 Autor: Eduardo Santos Nascimento
Data: 06/05/2022
Versão 1.0
 ********************************************************************************************/

if (file_exists('../module/config.php')) {
    require_once('../module/config.php');
} else {
    require_once('module/config.php');
}

$caminhoSession = "";

function listarProdutos() {
    if (session_status()) {

        if (!empty($_SESSION['caminhoSession'])) {

            $caminhoSession = $_SESSION['caminhoSession'] . 'model/bd/produto.php';
        }
    }

    require_once($caminhoSession);

    $dados = selectAllProdutos();

    if (!empty($dados)) {
        return $dados;
    } else {
        return false;
    }
}
function excluirProduto($id) {
    
    if ($id != 0 && !empty($id) && is_numeric($id)) {

        require_once("model/bd/produto.php");

        if (deleteProduto($id))
            return true;
        else
            return array(
                'idErro'  => 3,
                'message' => 'o banco de dados não pode excluir o registro'
            );
    } else {
        return array(
            'idErro'  => 5,
            'message' => 'informe um id validado'
        );
    }
}
function inserirProduto($dadosProduto , $file) {

    $photoName = (string) null;
    
    if(!empty($dadosProduto)) {
        if(!empty($dadosProduto['nome']) || !empty($dadosProduto['descricao']) || !empty($dadosProduto['preco']) || !empty($dadosProduto['desconto'])) {
           
            if ($file['foto']['name'] != null) {
                require_once('module/upload.php');
                $photoName = uploadFile($file["foto"]);
                // se for um array retorna o erro qu ta no array da variavel
                if (is_array($photoName)){
                    return $photoName;
                }
            }
           
            $arrayDados = array (
                'nome' => $dadosProduto['nome'],
                'descricao' => $dadosProduto['descricao'],
                'preco' => $dadosProduto['preco'],
                'desconto' => $dadosProduto['desconto'],
                'foto'       => $photoName,
                'destaque'  => $dadosProduto['rdoDestaque']
                
            );

            require_once("model/bd/produto.php");
            if (InsertProduto($arrayDados)) {
                return true;
            }else {
                return array(
                    'idErro'  => 2,
                    'message' => 'deu ruim na hora de inserir os dados no banco de dados'
                );
            }
        }
    }

}
function buscarProduto($id) {

    if (session_status()) {

        if (!empty($_SESSION['caminhoSession'])) {

            $caminhoSession = $_SESSION['caminhoSession'] . 'model/bd/produto.php';
        }
    }

    require_once($caminhoSession);

    if ($id != 0 && !empty($id) && is_numeric($id)) {

        $dado = selectByIdProduto($id);

        if (!empty($dado)) {
            return $dado;
        } else {
            return false;
        }
    } else
        return array(
            'idErro'  => 5,
            'message' => 'informe um id validado'
        );
}
function atualizarProduto($dadosProduto, $array) {
    $id = $array['id'];
    $foto = $array['foto'];
    $file = $array['file'];

    if (!empty($dadosProduto)) {
        if(!empty($dadosProduto['nome']) || !empty($dadosProduto['descricao']) || !empty($dadosProduto['preco']) || !empty($dadosProduto['desconto'])) {
            if (!empty($id) && $id != 0 && is_numeric($id)) {

                if ($file["foto"]["name"] != null) {
                    require_once('module/upload.php');
                    $novaFoto = uploadFile($file["foto"]);
                    require_once('module/config.php');
                //permite apagar a foto fisicamente do diretório no servidor
                unlink(DIRECTORY_FILE_UPLOAD.$foto);
                }else {
                    $novaFoto = $foto;
                }
                $arrayDados = array(
                    'id'         => $id,
                    'nome'       => $dadosProduto['nome'],
                    'descricao'       => $dadosProduto['descricao'],
                    'preco'       => $dadosProduto['preco'],
                    'desconto'       => $dadosProduto['desconto'],
                    'foto'       => $novaFoto,
                    'destaque'  => $dadosProduto['rdoDestaque']

                );
                echo ($arrayDados);

                require_once("./model/bd/produto.php");

                if (updateProduto($arrayDados)) {
                    return true;
                } else
                    return array(
                        'idErro'  => 2,
                        'message' => 'Editado com sucesso'
                    );
            } else
                return array(
                    'idErro'  => 5,
                    'message' => 'informe um id validado'
                );
        }
        }
    }


?>