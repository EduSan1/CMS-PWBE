<?php

/*******************************************************************************************
 Objetivo: arquivo responsável pela manipulação de dados de genero
 Obs: esse arquivo fará a ponte entre a View e a Model
 Autor: Eduardo Santos Nascimento
Data: 07/03/2022
Versão 1.0
 ********************************************************************************************/

if (file_exists('../module/config.php')) {
    require_once('../module/config.php');
} else {
    require_once('module/config.php');
}

$caminhoSession = "";


function listarGenero()
{

    if (session_status()) {

        if (!empty($_SESSION['caminhoSession'])) {

            $caminhoSession = $_SESSION['caminhoSession'] . 'model/bd/genero.php';
        }
    }

    require_once($caminhoSession);

    $dados = selectAllGeneros();

    if (!empty($dados)) {
        return $dados;
    } else {
        return false;
    }
}

function excluirGenero($id)
{

    if ($id != 0 && !empty($id) && is_numeric($id)) {

        require_once("model/bd/genero.php");

        if (deleteGenero($id))
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
function inserirGenero($dadosGenero)
{
    if (!empty($dadosGenero)) {

        if (!empty($dadosGenero['nome'])) {
            $arrayDados = array(
                'nome' => $dadosGenero['nome']
            );

            require_once("model/bd/genero.php");
            if (InsertGenero($arrayDados)) {
                return true;
            } else
                return array(
                    'idErro'  => 2,
                    'message' => 'deu ruim na hora de inserir os dados no banco de dados'
                );
        }
    }
}

function buscarGenero($id)
{

    if (session_status()) {

        if (!empty($_SESSION['caminhoSession'])) {

            $caminhoSession = $_SESSION['caminhoSession'] . 'model/bd/genero.php';
        }
    }

    require_once($caminhoSession);
    if ($id != 0 && !empty($id) && is_numeric($id)) {

        $dado = selectByIdGenero($id);

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

function atualizarGenero($dadosGenero, $id)
{
    if (!empty($dadosGenero)) {
        //validação dos campos  nome, celular e email, pois são campos obrigatórios
        if (!empty($dadosGenero['nome'])) {

            if (!empty($id) && $id != 0 && is_numeric($id)) {
                $arrayDados = array(
                    'id'         => $id,
                    'nome'       => $dadosGenero['nome'],

                );
                echo ($arrayDados);

                //import do arquivo de modlagem para mannipular o BD
                require_once("./model/bd/genero.php");
                //Chama a função para mandar os dados pro banco (localizado na model)
                if (updateGenero($arrayDados)) {
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
        } else {
            return array(
                'idErro'  => 1,
                'message' => 'Exitem campos obrigatórios que não foram preenchidos      '
            );
        }
    }
}
