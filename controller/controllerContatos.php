<?php

    /*******************************************************************************************
 Objetivo: arquivo responsável pela manipulação de dados de contatos
 Obs: esse arquivo fará a ponte entre a View e a Model
 Autor: Eduardo Santos Nascimento
Data: 31/03/2022
Versão 1.0
 ********************************************************************************************/


function listarContato() {

    require_once('model/bd/contato.php');


    $dados = selectAllContato();

    if (!empty($dados)) {
        return $dados;
    }else {
        return false;
    }
}

function excluirContato($id) {

    if ($id != 0 && !empty($id) && is_numeric($id)) {

        require_once('model/bd/contato.php');

        if (deleteContato($id))
            return true;
        else 
            return array(
                'idErro'  => 3,
                'message' => 'o banco de dados não pode excluir o registro'
            );

    }else 
        array(
            'idErro'  => 5,
            'message' => 'informe um id validado');
}

?>