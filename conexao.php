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
    require_once "config.php";
    $conexao = mysqli_connect(
        $config['host'],
        $config['user'],
        $config['pass'],
        $config['db']
    );

    if ($conexao === false) {
        echo "Erro ao conectar à base dados. N° do erro: " .
            mysqli_connect_errno($conexao) . ". " .
            mysqli_connect_errno();
        die();
    }
    return $conexao;
}




function executarSQL($conexao, $sql)
{
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado === false) {
        echo "Erro ao executar o comando SQL." .
            mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
    return $resultado;
}
