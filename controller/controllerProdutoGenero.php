<?php

/*******************************************************************************************
 Objetivo: arquivo responsável pela manipulação de dados de contatos
 Obs: esse arquivo fará a ponte entre a View e a Model
 Autor: Eduardo Santos Nascimento
Data: 04/03/2022
Versão 1.0
 ********************************************************************************************/

//função para receber dados da View e encaminhar para a Model (inserir)
//ira receber todos os dados do nosso formulário

if (file_exists('../module/config.php')) {
    require_once('../module/config.php');
    require_once('../model/bd/produtoGenero.php');
} else {
    require_once('module/config.php');
    require_once('model/bd/produtoGenero.php');
}

function inserirProdutoGenero($dadosContato)
{


    //verificar se dados contato possui algo 
    //empty verifica se um array está vazio
    if (!empty($dadosContato)) {
        //validação dos campos  nome, celular e email, pois são campos obrigatórios
        if (!empty($dadosContato['idProduto']) && !empty($dadosContato['idGenero'])) {

            //criação do array de dados que será encaminhado a model para iniciar no db
            //é importante criar o array por conta das necessidades  do bd
            //OBS: criar as chaves do array conforme os nomes dos atributos do bd
            $arrayDados = array(
                'idProduto' => $dadosContato['idProduto'],
                'idGenero' => $dadosContato['idGenero']

            );

            //import do arquivo de modlagem para mannipular o BD
            require_once("./model/bd/produtoGenero.php");
            //Chama a função para mandar os dados pro banco (localizado na model)
            if (insertProdutoGenero($arrayDados)) {
                return true;
            } else
                return array(
                    'idErro'  => 2,
                    'message' => 'deu ruim na hora de inserir os dados no banco de dados'
                );
        } else {
            return array(
                'idErro'  => 1,
                'message' => 'Exitem campos obrigatórios que não foram preenchidos      '
            );
        }
    }
}
// //função para receber dados da View e encaminhar para a Model (atualizar)
function atualizarProdutoGenero($dadosProdutoGenero,$id){

    if (!empty($dadosProdutoGenero)) {
        //validação dos campos  nome, celular e email, pois são campos obrigatórios
        if (!empty($dadosProdutoGenero['idGenero']) && !empty($dadosProdutoGenero['idProduto'])) {

            if (!empty($id) && $id != 0 && is_numeric($id)) {

                $arrayDados = array(
                    'id'         => $id,
                    'idGenero'       => $dadosProdutoGenero['idGenero'],
                    'idProduto'   => $dadosProdutoGenero['idProduto']
                );

                require_once("./model/bd/produtoGenero.php");
        
                if (updateProdutoGenero($arrayDados)) {
                    return true;
                } else
                    return array(
                        'idErro'  => 2,
                        'message' => 'deu ruim na hora de editar os dados no banco de dados'
                    );
            }else 
                return array(
                    'idErro'  => 5,
                    'message' => 'informe um id validado'
                );
        } else {
            return array(
                'idErro'  => 1,
                'message' => 'Exitem campos obrigatórios que não foram preenchidos      '
            );
        }
    }
}

function excluirProdutoGenero($id)
{

    if ($id != 0 && !empty($id) && is_numeric($id)) {
        require_once('model/bd/produtoGenero.php');
        deleteProdutoGenero($id);
        return true;
    } else
        return array(
            'idErro'  => 5,
            'message' => 'informe um id validado'
        );
}
//função para receber dados da View e encaminhar para a Model
function listProdutosGeneros()
{
    //import do arquivo que vai buscar os dados do bd
    
    //chama a função que vai buscar os dados do bd
    $dados = selectAllProdutoGenero();

    if (!empty($dados)) {
        return $dados;
    } else {
        return false;
    }
}

function buscarProdutosGeneros($id) {

    require_once('model/bd/produtoGenero.php');

    if ($id != 0 && !empty($id) && is_numeric($id)) {

        $dado = selectByIdProdutoGenero($id);
        if (!empty($dado)) {
            return $dado;
        } else {
            return false;
        }

    }else
    return array(
        'idErro'  => 5,
        'message' => 'informe um id validado'
    );

}
