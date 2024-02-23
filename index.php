<?php

require_once 'funcoes.php';

$resposta = '';

if (isset($_GET['cep']) && !empty($_GET['cep'])) {
    $resposta = curl_get("http://viacep.com.br/ws/{$_GET['cep']}/json/");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        p{
            margin: 0;
            padding: 0;
        }
        .danger{
            color: red;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integração ViaCEP</title>
</head>

<body>
    <div>
        <form action="">
            <h2>Informe seu cep para receber os dados.</h2>
            <input type="text" name="cep" value="<?= $_GET['cep'] ?? '' ?>" placeholder="Informe seu cep">
            <input type="submit">
        </form>
    </div>

    <div>
        <?php if ($resposta) : ?>
            <h3>Seu endereço:</h3>
            <p>CEP: <?= $resposta->cep ?></p>
            <p>Rua: <?= $resposta->logradouro ?></p>
            <p>Bairro: <?= $resposta->bairro ?></p>
            <p>Cidade: <?= $resposta->localidade ?></p>
            <p>Estado: <?= $resposta->uf ?></p>
            <p>DDD: <?= $resposta->ddd ?></p>
        <?php else: ?>
            <p class="danger">O cep está incorreto, verifique e envie novamente!</p>
        <?php endif; ?>
    </div>
                
</body>

</html>