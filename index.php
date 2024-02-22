<?php

require_once 'funcoes.php';

$resposta = '';

if ($_GET['cep']) {
    $resposta = curl_get("http://viacep.com.br/ws/{$_GET['cep']}/json/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        p{
            margin: 0.5em;
            padding: 0.2em;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integração ViaCEP</title>
</head>

<body>
    <div>
        <form action="">
            <input type="text" name="cep" placeholder="Informe seu cep">
            <input type="submit">
        </form>
    </div>

    <?php if ($resposta) : ?>
        <div>
            <h2>Seu endereço:</h2>
            <p>CEP: <?= $resposta->cep ?></p>
            <p>Rua: <?= $resposta->logradouro ?></p>
            <p>Bairro: <?= $resposta->bairro ?></p>
            <p>Cidade: <?= $resposta->localidade ?></p>
            <p>Estado: <?= $resposta->uf ?></p>
            <p>DDD: <?= $resposta->ddd ?></p>
        </div>
    <?php endif; ?>
</body>

</html>