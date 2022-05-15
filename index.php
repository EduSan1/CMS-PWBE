<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="./css/reset.css" />
  <link rel="stylesheet" href="./css/icone.css" />
  <link rel="stylesheet" href="./css/header.css" />
  <link rel="stylesheet" href="./css/menu.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/conteudo.css">
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
      <a href="/cleiton/CMS-PWBE/pages/produtos.php">
        <img src="img/icon/produtos.png" class="icones" alt="" />
        <p>Adm. de Produtos</p>
      </a>
    </div>

    <div class="menu-adm-categorias">
      <a href="/cleiton/CMS-PWBE/pages/categorias.php">
        <img src="img/icon/categorias.png" class="icones" alt="" />
        <p>Adm. de Categorias</p>
      </a>
    </div>

    <div class="menu-adm-contatos">
      <a href="index.php">
        <img src="img/icon/contatos.png" class="icones" alt="" />
        <p>Contatos</p>
      </a>
    </div>

    <div class="menu-adm-usuarios">
      <a href="/cleiton/CMS-PWBE/pages/usuario.php">
        <img src="img/icon/usuarios.png" class="icones" alt="" />
        <p>Adm. de Usuários</p>
      </a>
    </div>
  </div>
</div>

<div class="menu-logout">
  <p>Boas Vindas {insira nome}</p>
  <div class="menu-acoes-sair">
    <a href="#">
      <img src="img/icon/logout.png" class="icones" alt="" />
      <p>Sair</p>
    </a>
  </div>
</div>

</section>
  <section class="conteudo">
      <table class="tblContato" id="tblContato">
        <tr>
          <td id="tblTitulo" colspan="6">
            <h1>Mensagens</h1>
          </td>
        </tr>
        <tr id="tblLinhas">
          <td class="tblColunas-destaque"> Nome </td>
          <td class="tblColunas-destaque"> Email </td>
          <td class="tblColunas-destaque"> Mensagem </td>
          <td class="tblColunas-destaque"> Excluir </td>
        </tr>

        <?php
        require_once('controller/controllerContatos.php');

        $listContato = listarContato();
        

        foreach ($listContato as $item) {
        ?>
          <tr class="conteudo-corpo-contato">

            <td class="conteudo-corpo-contato-nome"><?= $item['nome'] ?></td>
            <td class="conteudo-corpo-contato-email"><?= $item['email'] ?></td>
            <td class="conteudo-corpo-contato-mensagem"><?= $item['mensagem'] ?></td>
            <td class="conteudo-corpo-contato-excluir"><a href="router.php?component=contatos&action=deletar&id=<?= $item['id']?>">excluir comentario<a/></td>
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