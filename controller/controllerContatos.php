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

?>