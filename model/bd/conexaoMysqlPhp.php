<?php

     /**********************************************************************************************************
    
        Objetivo: arquivo que cria uma conexão com o MySQL
        Autor: Eduardo Santos Nascimento
        Data: 31/02/2022
        Versão: 1.0
    
    **********************************************************************************************************/

    const SERVER = 'localhost';
    const USER = 'root';
    const PASSWORD = 'bcd127';
    const DATABASE = 'dbFlyMangas';

    $resultado = conexaoMysql();

    function conexaoMysql() {

        $conexao = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);

        if ($conexao) 
            return $conexao;
        else
            return false;

    }

    function fecharConexaoMysql ($conexao){

        mysqli_close($conexao);

    }

?>