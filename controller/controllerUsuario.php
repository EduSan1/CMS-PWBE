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

function listarUsuario()
{

  if (session_status()) {

    if (!empty($_SESSION['caminhoSession'])) {

      $caminhoSession = $_SESSION['caminhoSession'] . 'model/bd/usuario.php';
    }
  }

  require_once($caminhoSession);

  $dados = selectAllUsuarios();

  if (!empty($dados)) {
    return $dados;
  } else {
    return false;
  }
}
function inserirUsuario($dadosUsuario)
{

  if (!empty($dadosUsuario)) {

    if (!empty($dadosUsuario['nome']) && !empty($dadosUsuario['senha']) && !empty($dadosUsuario['email'])) {
      $arrayDados = array(
        'nome' => $dadosUsuario['nome'],
        'email' => $dadosUsuario['email'],
        'senha' => $dadosUsuario['senha'],

      );

      require_once("model/bd/usuario.php");
            if (insertUsuario($arrayDados)) {
                return true;
            } else
                return array(
                    'idErro'  => 2,
                    'message' => 'deu ruim na hora de inserir os dados no banco de dados'
                );

    }
  }
}
