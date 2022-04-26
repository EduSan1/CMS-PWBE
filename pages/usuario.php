<?php

if(file_exists('../module/config.php')) {
    require_once('../module/config.php');
    $teste = "../";
    $cmsCaminho = "../";
  }else {
    require_once('module/config.php');
    $teste = "";
    $cmsCaminho = "../CMS-PWBE/";
  }

  $form = $teste."router.php?component=usuario&action=inserir";

  if(session_status()) {

    if (!empty($_SESSION['dadosUsuario'])) {

      $id = $_SESSION['dadosUsuario']['id'];
      $nome = $_SESSION['dadosUsuario']['nome'];
      $email = $_SESSION['dadosUsuario']['email'];

      $form = $teste."router.php?component=usuario&action=editar&id=".$id;

      unset($_SESSION['dadosUsuario']);

    }
  }

?>
  <form action="<?=$form?>" method="post" class="">
          <div class="">
              <p>Nome: </p>
              <input type="text" value="<?= isset($nome)?$nome:null ?>" name="nome" value="" >
          </div>
          <div class="">
              <p>Email: </p>
              <input type="text" value="<?= isset($email)?$email:null ?>" name="email" value="" >
          </div>
          <div class="">
              <p>Senha: </p>
              <input type="password" name="senha" value="" s>
          </div>
          <button class=""> Cadastrar Usuario</button>
      </form>

<?php

  
require_once($caminho.'controller/controllerUsuario.php');

$listUsuario = listarUsuario();

foreach ($listUsuario as $item) {

    echo("*****************************");
    echo("<BR/>");
    echo($item['nome']);
    echo("---");
    echo($item['senha']);
    echo("---");
    echo($item['email']);    
    echo("=//////=");
    echo('<a href ="'.$cmsCaminho.'router.php?component=usuario&action=deletar&id='.$item['idUsuario'].'"> excluir <a/>');
    echo("=//////=");
    echo('<a href ="'.$cmsCaminho.'router.php?component=usuario&action=buscar&id='.$item['idUsuario'].'"> editar <a/>');
    echo("<BR/>");
    echo("<BR/>");
    
  } 


?>