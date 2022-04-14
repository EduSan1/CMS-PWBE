<?php

/************************************************************************************************
    Objetivo: Arquivo de rota, para segmentar as ações encaminhadas pela View
    (dados de um form, listagem de dados, ação de excluir ou atualizar).
    Esse arquivo será responsável por encaminhar as solicitações para a Controller
    Autor: Eduardo Santos Nascimento
    Data:31/03/22
    Versão: 1.0
 ************************************************************************************************/


$action = (string) null;
$component = (string) null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    $component = strtoupper($_GET['component']);
    $action = strtoupper($_GET['action']);

    switch ($component) {
        case 'CONTATOS';
            require_once('controller/controllerContatos.php');

            if ($action == 'DELETAR') {
                $id = strtoupper($_GET['id']);
                $resposta = excluirContato($id);

                if (is_bool($resposta)) {
                    echo ("<script>
                alert('Contato excluido do banco de dados');
                window.location.href = 'index.php';
                </script>");
                } elseif (is_array($resposta)) {
                    echo ("<script>
                alert('" . $resposta["message"] . "');
                window.location.href = 'index.php';
                </script>");
                } else {

                    echo ("<script>
                alert('CARAI MENÓ, COMO TU FEZ ISSO??');
                window.location.href = 'index.php';
                </script>");
                }
            }

        case 'GENERO';
            require_once('controller/controllerGenero.php');

            if ($action == 'DELETAR') {
                $id = strtoupper($_GET['id']);
                $resposta = excluirGenero($id);

                if (is_bool($resposta)) {
                    echo ("<script>
                alert('Contato excluido do banco de dados');
                window.location.href = 'pages/categorias.php';
                </script>");
                } elseif (is_array($resposta)) {
                    echo ("<script>
                alert('" . $resposta["message"] . "');
                window.location.href = 'pages/categorias.php';
                </script>");
                } else {

                    echo ("<script>
                alert('CARAI MENÓ, COMO TU FEZ ISSO??');
                window.location.href = 'pages/categorias.php';
                </script>");
                }
            } else if ($action == 'INSERIR') {
                if ($_POST['nome'] != "") {
                    $resposta = inserirGenero($_POST);

                    if (is_bool($resposta)) {
                        echo ("<script>
                alert('Contato inserido no banco de dados');
                window.location.href = 'pages/categorias.php';
                </script>");
                    } elseif (is_array($resposta)) {
                        echo ("<script>
                alert('" . $resposta["message"] . "');
                window.location.href = 'pages/categorias.php';
                </script>");
                    } else {

                        echo ("<script>
                alert('CARAI MENÓ, COMO TU FEZ ISSO??');
                window.location.href = 'pages/categorias.php';
                </script>");
                    }
                } else {

                    echo ("<script>
                    alert('Insira um texto no campo para poder cadastrar');
                    window.location.href = 'pages/categorias.php';
                    </script>");
                }
            } else if ($action == 'BUSCAR') {

                $id = strtoupper($_GET['id']);

                $dado = buscarGenero($id);


                $_SESSION['dadosGenero'] = $dado;

                // header('location: pages/categorias.php');

                require_once("pages/categorias.php");
            } else if ($action == "EDITAR") {
                $idContato = $_GET['id'];

                $resposta = atualizarGenero($_POST, $idContato);
            
                if (is_bool($resposta)) {

                    if ($resposta) {

                        echo ("<script>
                       alert('Registro atualizado com sucesso');
                       window.location.href = 'pages/categorias.php';
                       </script>");
                    }
                } elseif (is_array($resposta)) {

                    echo ("<script>
                    alert('" . $resposta["message"] . "');
                    window.location.href = 'pages/categorias.php';
                    </script>");
                } else {

                    echo ("<script>
                    alert('CARAI MENÓ, COMO TU FEZ ISSO??');
                    window.location.href = 'pages/categorias.php';
                    </script>");
                }
                break;
            }
    }
}