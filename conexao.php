<?php

/**
 * faz uma conexao com o banco de dados MySQL, 
 * na base de dadosrecuperar-senha.
 * 
 * @return \mysqli retorna uma conexao com a base de dados, ou em caso 
 * de falha, mata a execução e exibe o erro.
 */

function conectar()
{
    $conexao = mysqli_connect("localhost", "root", "", "recuperar-senha");
    if ($conexao === false) {
        echo "Erro ao conectar à base dados. N° do erro: " .
            mysqli_connect_errno($conexao) . ". " .
            mysqli_connect_errno();
        die();
    }
    return $conexao;
}
