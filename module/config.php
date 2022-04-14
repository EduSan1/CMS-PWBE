<?php

  $caminho = $_SERVER['DOCUMENT_ROOT'];
  $caminho .= "/jorge/Eduardo/CMS-PWBE/";

  session_start();

  $_SESSION['caminhoSession'] = $caminho;

?>