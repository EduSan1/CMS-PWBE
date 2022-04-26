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
function excluirUsuario($id)
{
  if ($id != 0 && !empty($id) && is_numeric($id)) {

    require_once("model/bd/usuario.php");

    if (deleteUsuario($id))
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
function buscarUsuario($id)
{
  if (session_status()) {

    if (!empty($_SESSION['caminhoSession'])) {

      $caminhoSession = $_SESSION['caminhoSession'] . 'model/bd/usuario.php';
    }
  }

  require_once($caminhoSession);
  if ($id != 0 && !empty($id) && is_numeric($id)) {

    $dado = selectByIdUsuario($id);

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

function atualizarUsuario($dadosUsuario, $id)
{
  if (!empty($dadosUsuario)) {
    //validação dos campos  nome, celular e email, pois são campos obrigatórios
    if (!empty($dadosUsuario['nome']) && !empty($dadosUsuario['email']) && !empty($dadosUsuario['senha'])) {

        if (!empty($id) && $id != 0 && is_numeric($id)) {
            $arrayDados = array(
                'id'         => $id,
                'nome'       => $dadosUsuario['nome'],
                'email'       => $dadosUsuario['email'],
                'senha'       => $dadosUsuario['senha']

            );

            //import do arquivo de modlagem para mannipular o BD
            require_once("./model/bd/usuario.php");
            //Chama a função para mandar os dados pro banco (localizado na model)
            if (updateUsuario($arrayDados)) {
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
