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

?>
  <form action="<?=$form?>" method="post" class="">
          <div class="">
              <p>Nome: </p>
              <input type="text" name="nome" value="" >
          </div>
          <div class="">
              <p>Email: </p>
              <input type="text" name="email" value="" >
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
    echo("<BR/>");
    echo("<BR/>");
    
  } 


?>