<?php



if (file_exists('../module/config.php')) {
    require_once('../module/config.php');
    $teste = "../";
    $pages = "";
    $cmsCaminho = "../";
} else {
    require_once('module/config.php');
    $teste = "";
    $pages = "pages/";
    $cmsCaminho = "../CMS-PWBE/";
}

$idProduto = null;
$idGenero = null;
$form = $teste . "router.php?component=produtogenero&action=inserir";

if (session_status()) {

    if (!empty($_SESSION['dadosProduto_Genero'])) {

        $id = $_SESSION['dadosProduto_Genero']['id'];
        $idProduto = $_SESSION['dadosProduto_Genero']['idProduto'];
        $idGenero = $_SESSION['dadosProduto_Genero']['idGenero'];

        $form = $teste . "router.php?component=produtogenero&action=editar&id=" . $id;
        unset($_SESSION['dadosProduto_Genero']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?= $teste ?>css/reset.css" />
    <link rel="stylesheet" href="<?= $teste ?>css/icone.css" />
    <link rel="stylesheet" href="<?= $teste ?>css/header.css" />
    <link rel="stylesheet" href="<?= $teste ?>css/menu.css">
    <link rel="stylesheet" href="<?= $teste ?>css/footer.css">
    <link rel="stylesheet" href="<?= $teste ?>css/conteudo-categorias.css">
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
                    <a href="<?= $pages; ?>produtos.php">
                        <img src="<?= $cmsCaminho ?>img/icon/produtos.png" class="icones" alt="" />
                        <p>Adm. de Produtos</p>
                    </a>
                </div>

                <div class="menu-adm-categorias">
                    <a href="<?= $pages; ?>categorias.php">
                        <img src="<?= $cmsCaminho ?>img/icon/categorias.png" class="icones" alt="" />
                        <p>Adm. de Categorias</p>
                    </a>
                </div>

                <div class="menu-adm-contatos">
                    <a href="<?= $cmsCaminho ?>index.php">
                        <img src="<?= $cmsCaminho ?>img/icon/contatos.png" class="icones" alt="" />
                        <p>Contatos</p>
                    </a>
                </div>

                <div class="menu-adm-usuarios">
                    <a href="<?= $pages; ?>usuario.php">
                        <img src="<?= $cmsCaminho ?>img/icon/usuarios.png" class="icones" alt="" />
                        <p>Adm. de Usuários</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="menu-logout">
            <p>Boas Vindas {insira nome}</p>
            <div class="menu-acoes-sair">
                <a href="#">
                    <img src="<?= $cmsCaminho ?>img/icon/logout.png" class="icones" alt="" />
                    <p>Sair</p>
                </a>
            </div>
        </div>

    </section>

    <section class="conteudo-categorias">
        <form action="<?= $form ?>" method="post" class="cadastro-categorias">
            <div class="cadastro-categorias-campo">
                <p>Produto: </p>
                <select name="idProduto">
                    <option <?= $idProduto == null ? "selected" : null ?> value="">Selecione um Produto</option>
                    <?php

                    require_once($caminho . 'controller/controllerProdutos.php');
                    $listProdutos = listarProdutos();

                    foreach ($listProdutos as $item) {
                        var_dump($item);
                        if ($item['id'] != $idProduto) {
                    ?>
                            <option value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>
                        <?php } else { ?>
                            <option selected value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>

                    <?php }
                    } ?>
                </select>
            </div>
            <div class="cadastro-categorias-campo">
                <p>Genero: </p>
                <select name="idGenero">
                    <option <?= $idProduto == null ? "selected" : null ?> value="">Selecione um Genero</option>
                    <?php

                    require_once($caminho . 'controller/controllerGenero.php');
                    $listGenero = listarGenero();

                    foreach ($listGenero as $item) {
                        var_dump($item);
                        if ($item['id'] != $idGenero) {
                    ?>
                            <option value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>
                        <?php } else { ?>
                            <option selected value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>

                    <?php }
                    } ?>

                </select>
            </div>
            <button class="cadastro-categoria-botao"> Cadastrar Relação</button>
        </form>
        <table class="categorias-tabela">
            <tr>
                <td colspan="6">
                    <h1>Categorias</h1>
                </td>
            </tr>
            <tr>
                <td class="tblCategoriasColunas-destaqu"> Produto </td>
                <td class="tblCategoriasColunas-destaqu"> Genero </td>
                <td class="tblCategoriasColunas-destaqu"> Editar </td>
                <td class="tblCategoriasColunas-destaqu"> Excluir </td>
            </tr>

            <?php

            require_once($teste . 'controller/controllerProdutoGenero.php');

            $listProdutosGeneros = listProdutosGeneros();

            foreach ($listProdutosGeneros as $item) {

            ?>



                <tr class="conteudo-corpo-categoria">

                    <td class="conteudo-corpo-categoria-nome"><?= $item['produto'] ?></td>
                    <td class="conteudo-corpo-categoria-email"><?= $item['genero'] ?></td>
                    <td class="conteudo-corpo-categoria-editar"><a href="<?= $cmsCaminho ?>router.php?component=produtogenero&action=buscar&id=<?= $item['id'] ?>"> editar <a /></td>
                    <td class="conteudo-corpo-categoria-excluir"><a href="<?= $cmsCaminho ?>router.php?component=produtogenero&action=deletar&id=<?= $item['id'] ?>"> excluir <a /></td>
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