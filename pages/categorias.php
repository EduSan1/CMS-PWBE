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



  $form = $teste."router.php?component=genero&action=inserir";
  if(session_status()) {

    if (!empty($_SESSION['dadosGenero'])) {

      $id = $_SESSION['dadosGenero']['id'];
      $nome = $_SESSION['dadosGenero']['nome'];

      $form = $teste."router.php?component=genero&action=editar&id=".$id;

      unset($_SESSION['dadosGenero']);

    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="<?=$teste?>css/reset.css" />
  <link rel="stylesheet" href="<?=$teste?>css/icone.css" />
  <link rel="stylesheet" href="<?=$teste?>css/header.css" />
  <link rel="stylesheet" href="<?=$teste?>css/menu.css">
  <link rel="stylesheet" href="<?=$teste?>css/footer.css">
  <link rel="stylesheet" href="<?=$teste?>css/conteudo-categorias.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <section class="header">
    <div class="header-textos">
      <div class="header-cms">
        <p>C M S</p>
        <p>Loja de Mangá</p>
      </div>
      <p>Gerenciamento do conteúdo do site</p>
    </div>
    <div class="header-imagem">
      <img src="./img/logo.png" alt="" />
    </div>
  </section>
  <section class="menu">
    <div class="menu-acoes">
      <div class="menu-acoes-esquerda">
        <div class="menu-adm-produtos">
          <a href="#">
            <svg class="icones" enable-background="new 0 0 64 64" height="64px" id="Layer_1" version="1.1" viewBox="0 0 64 64" width="64px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <path d="M62.848,16.853h-0.057c-1.094,0.007-1.263-0.946-1.282-1.386V8.558c0-0.736-0.599-1.334-1.334-1.334H40.423  c-4.957,0-6.805,1.836-7.264,2.414l-0.126,0.174l-0.001,0.002l-0.391,0.536c-0.001,0-0.001,0-0.001,0  c-0.524,0.721-0.981,0.413-1.201,0.178l-0.748-0.933L30.322,9.15c-0.622-0.653-2.242-1.927-5.452-1.927H3.827  c-0.737,0-1.335,0.598-1.335,1.334v6.822c0,1.193-0.648,1.434-1.046,1.473H1.149c-0.324,0.019-1.077,0.208-1.077,1.595v32.505  c0,0.798,0.647,1.444,1.444,1.444h19.205c6.127,0,8.797,2.312,9.598,3.197l0.457,0.566h0.001c0,0,1.225,1.385,2.516,0l0,0  l0.269-0.315v0.003l0.003-0.003l0.341-0.4c0.01-0.012,0.093-0.104,0.211-0.226c1.024-0.995,3.579-2.822,8.575-2.822h19.792  c0.798,0,1.443-0.646,1.443-1.444V18.132C63.928,16.958,63.075,16.859,62.848,16.853z M58.533,45.853  c0,0.64-0.535,1.159-1.201,1.159H41.049c-5.795,0-7.899,2.616-7.899,2.616l-0.267,0.358l-0.125,0.175c-0.001,0-0.001,0-0.001,0  c-0.553,0.75-1.365,0.006-1.369,0l-0.375-0.468c-0.278-0.333-2.407-2.682-7.558-2.682H6.665c-0.663,0-1.198-0.52-1.198-1.159v-34.64  c0-0.64,0.536-1.157,1.198-1.157h13.034c9.696,0,10.614,5.507,10.677,7.106v24.092c0,1.751,0.834,2.078,1.305,2.126h0.701  c0.479-0.048,1.242-0.333,1.242-1.697v-24.83h-0.009c0.074-2.003,0.854-6.797,6.686-6.797h17.031c0.666,0,1.201,0.517,1.201,1.157  V45.853z" fill="#241F20" />
            </svg>
            <p>Adm. de Produtos</p>
          </a>
        </div>

        <div class="menu-adm-categorias">
          <a href="#">
            <svg class="icones" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z" />
            </svg>
            <p>Adm. de Categorias</p>
          </a>
        </div>

        <div class="menu-adm-contatos">
          <a href="#">
            <svg class="icones" data-name="Layer 1" id="Layer_1" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
              <title />
              <path class="cls-1" d="M2,50a5,5,0,0,0,4,4.9V61a3,3,0,0,0,3,3H53a3,3,0,0,0,3-3V7a3,3,0,0,0-3-3H52V3a3,3,0,0,0-3-3H9A3,3,0,0,0,6,3V7.1a5,5,0,0,0,0,9.8v9.2a5,5,0,0,0,0,9.8v9.2A5,5,0,0,0,2,50ZM53,6a1,1,0,0,1,1,1V61a1,1,0,0,1-1,1H52V6ZM39.5,2h5v9a.6.6,0,0,1-.31.55.42.42,0,0,1-.45,0l-.89-.65a1.44,1.44,0,0,0-1.7,0l-.89.65a.42.42,0,0,1-.45,0A.6.6,0,0,1,39.5,11ZM4,31a3,3,0,0,1,2-2.82V31a1,1,0,0,0,2,0V16.9A5,5,0,0,0,12,12a1,1,0,0,0-2,0A3,3,0,1,1,6,9.18V12a1,1,0,0,0,2,0V3A1,1,0,0,1,9,2h5V5a1,1,0,0,0,2,0V2H38.5v9a1.61,1.61,0,0,0,.85,1.44,1.41,1.41,0,0,0,1.5-.13l.89-.65a.45.45,0,0,1,.52,0l.89.65a1.43,1.43,0,0,0,.85.29,1.39,1.39,0,0,0,.65-.16A1.61,1.61,0,0,0,45.5,11V2H49a1,1,0,0,1,1,1V62H9a1,1,0,0,1-1-1V54.9A5,5,0,0,0,12,50a1,1,0,0,0-2,0,3,3,0,1,1-4-2.82V50a1,1,0,0,0,2,0V35.9A5,5,0,0,0,12,31a1,1,0,0,0-2,0,3,3,0,0,1-6,0Z" />
              <path class="cls-1" d="M15,22a1,1,0,0,0,1-1V17a1,1,0,0,0-2,0v4A1,1,0,0,0,15,22Z" />
              <path class="cls-1" d="M15,14a1,1,0,0,0,1-1V9a1,1,0,0,0-2,0v4A1,1,0,0,0,15,14Z" />
              <path class="cls-1" d="M15,46a1,1,0,0,0,1-1V41a1,1,0,0,0-2,0v4A1,1,0,0,0,15,46Z" />
              <path class="cls-1" d="M16,61V57a1,1,0,0,0-2,0v4a1,1,0,0,0,2,0Z" />
              <path class="cls-1" d="M15,30a1,1,0,0,0,1-1V25a1,1,0,0,0-2,0v4A1,1,0,0,0,15,30Z" />
              <path class="cls-1" d="M15,54a1,1,0,0,0,1-1V49a1,1,0,0,0-2,0v4A1,1,0,0,0,15,54Z" />
              <path class="cls-1" d="M15,38a1,1,0,0,0,1-1V33a1,1,0,0,0-2,0v4A1,1,0,0,0,15,38Z" />
              <path class="cls-1" d="M33,35a8,8,0,1,0-8-8A8,8,0,0,0,33,35Zm0-14a6,6,0,1,1-6,6A6,6,0,0,1,33,21Z" />
              <path class="cls-1" d="M29.5,27A3.5,3.5,0,0,1,33,23.5a.5.5,0,0,0,0-1A4.51,4.51,0,0,0,28.5,27a.5.5,0,0,0,1,0Z" />
              <path class="cls-1" d="M22,47H44a3,3,0,0,0,3-3V39.12a4,4,0,0,0-2.46-3.69,16.06,16.06,0,0,1-2.44-1.26,2,2,0,0,0-2.41.25,10,10,0,0,1-13.38,0,2,2,0,0,0-2.41-.25,16.06,16.06,0,0,1-2.44,1.26A4,4,0,0,0,19,39.12V44A3,3,0,0,0,22,47Zm-1-7.88a2,2,0,0,1,1.23-1.84A22.64,22.64,0,0,0,25,35.9a11.92,11.92,0,0,0,16.07,0,18.51,18.51,0,0,0,2.73,1.41h0A2,2,0,0,1,45,39.12V44a1,1,0,0,1-1,1H22a1,1,0,0,1-1-1Z" />
              <path class="cls-1" d="M42,50.5H24a.5.5,0,0,0,0,1H42a.5.5,0,0,0,0-1Z" />
              <path class="cls-1" d="M38,54.5H28a.5.5,0,0,0,0,1H38a.5.5,0,0,0,0-1Z" />
            </svg>
            <p>Contatos</p>
          </a>
        </div>

        <div class="menu-adm-usuarios">
          <a href="#">
            <svg class="icones" enable-background="new 0 0 48 48" height="48px" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <path clip-rule="evenodd" d="M24,45C12.402,45,3,35.598,3,24S12.402,3,24,3s21,9.402,21,21S35.598,45,24,45z   M35.633,39c-0.157-0.231-0.355-0.518-0.514-0.742c-0.277-0.394-0.554-0.788-0.802-1.178C34.305,37.062,32.935,35.224,28,35  c-1.717,0-2.965-1.288-2.968-3.066L25,31c0-0.135-0.016,0.148,0,0v-1l1-1c0.731-0.339,1.66-0.909,2.395-1.464l0.135-0.093  C29.111,27.074,29.923,26.297,30,26l0.036-0.381C30.409,23.696,31,20.198,31,19c0-4.71-2.29-7-7-7c-4.775,0-7,2.224-7,7  c0,1.23,0.591,4.711,0.963,6.616l0.035,0.352c0.063,0.313,0.799,1.054,1.449,1.462l0.098,0.062C20.333,28.043,21.275,28.657,22,29  l1,1v1c0.014,0.138,0-0.146,0,0l-0.033,0.934c0,1.775-1.246,3.064-2.883,3.064c-0.001,0-0.002,0-0.003,0  c-4.956,0.201-6.393,2.077-6.395,2.077c-0.252,0.396-0.528,0.789-0.807,1.184c-0.157,0.224-0.355,0.51-0.513,0.741  c3.217,2.498,7.245,4,11.633,4S32.416,41.498,35.633,39z M24,5C13.507,5,5,13.507,5,24c0,5.386,2.25,10.237,5.85,13.694  C11.232,37.129,11.64,36.565,12,36c0,0,1.67-2.743,8-3c0.645,0,0.967-0.422,0.967-1.066h0.001C20.967,31.413,20.967,31,20.967,31  c0-0.13-0.021-0.247-0.027-0.373c-0.724-0.342-1.564-0.814-2.539-1.494c0,0-2.4-1.476-2.4-3.133c0,0-1-5.116-1-7  c0-4.644,1.986-9,9-9c6.92,0,9,4.356,9,9c0,1.838-1,7-1,7c0,1.611-2.4,3.133-2.4,3.133c-0.955,0.721-1.801,1.202-2.543,1.546  c-0.005,0.109-0.023,0.209-0.023,0.321c0,0-0.001,0.413-0.001,0.934h0.001C27.033,32.578,27.355,33,28,33c6.424,0.288,8,3,8,3  c0.36,0.565,0.767,1.129,1.149,1.694C40.749,34.237,43,29.386,43,24C43,13.507,34.493,5,24,5z" fill-rule="evenodd" />
            </svg>
            <p>Adm. de Usuários</p>
          </a>
        </div>
      </div>
    </div>
    <div class="menu-logout">
      <p>Boas Vindas {insira nome}</p>
      <div class="menu-acoes-sair">
        <a href="#">
          <svg class="icone-sair" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
            <defs>
            </defs>
            <title />
            <g id="logout">
              <line class="cls-2" x1="15.92" x2="28.92" y1="16" y2="16" />
              <path d="M23.93,25v3h-16V4h16V7h2V3a1,1,0,0,0-1-1h-18a1,1,0,0,0-1,1V29a1,1,0,0,0,1,1h18a1,1,0,0,0,1-1V25Z" />
              <line class="cls-2" x1="28.92" x2="24.92" y1="16" y2="20" />
              <line class="cls-2" x1="28.92" x2="24.92" y1="16" y2="12" />
              <line class="cls-2" x1="24.92" x2="24.92" y1="8.09" y2="6.09" />
              <line class="cls-2" x1="24.92" x2="24.92" y1="26" y2="24" />
            </g>
          </svg>
          <p>Sair</p>
        </a>
      </div>
    </div>

  </section>
  <section class="conteudo-categorias">
      <form action="<?=$form?>" method="post" class="cadastro-categorias">
          <div class="cadastro-categorias-campo">
              <p>Nome: </p>
              <input type="text" name="nome" value="<?= isset($nome)?$nome:null ?>" placeholder="Digite o nome de categoria">
          </div>
          <button class="cadastro-categoria-botao"> Cadastrar Categoria</button>
      </form>
      <table class="categorias-tabela" >
        <tr>
          <td colspan="6">
            <h1>Categorias</h1>
          </td>
        </tr>
        <tr>
          <td class="tblCategoriasColunas-destaqu"> Nome </td>
          <td class="tblCategoriasColunas-destaqu"> Editar </td>
          <td class="tblCategoriasColunas-destaqu"> Excluir </td>
        </tr>
        <?php
        
        require_once($caminho.'controller/controllerGenero.php');

        $listGenero = listarGenero();
        

        foreach ($listGenero as $item) {
        ?>
          <tr class="conteudo-corpo-categoria">

            <td class="conteudo-corpo-categoria-nome"><?= $item['nome']?></td>
            <td class="conteudo-corpo-categoria-editar"><a href="<?=$cmsCaminho?>router.php?component=genero&action=buscar&id=<?= $item['id']?>">editar genero<a/></td>
            <td class="conteudo-corpo-categoria-excluir"><a href="<?=$cmsCaminho?>router.php?component=genero&action=deletar&id=<?= $item['id']?>">excluir genero<a/></td>
          </tr>
          <?php } ?>
      </table>
  </section>
  <footer>
    <div class="footer-container">
      <div class="footer-copyright">
        <p>@Copyright 2021</p>
        <p>Todos os direitos reservados - Politica de privacidade</p>
      </div>
      <div class="footer-info">
        <p>Desenvolvido por Eduardo S. Nascimento</p>
        <p>versão 1.0.0</p>
      </div>
    </div>
  </footer>
</body>

</html>