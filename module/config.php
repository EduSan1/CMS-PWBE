<?php

  $caminho = $_SERVER['DOCUMENT_ROOT'];
  $caminho .= "/jorge/Eduardo/CMS-PWBE/";

  session_start();

  $_SESSION['caminhoSession'] = $caminho;

  const MAX_FILE_UPLOAD = 10240;
  const EXTENSION_FILE_UPLOAD= array("image/jpg", "image/png", "image/jpeg");
  const DIRECTORY_FILE_UPLOAD = "files/";

?>