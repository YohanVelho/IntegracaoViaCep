<?php
/**
 * Faz um GET para a url informada
 * $url = URL desejada
 * $get = query string da url
 * $options = opções adicionais do curl
 */
function curl_get($url, array $get = [], array $options = [])
{

    $defaults = [
        CURLOPT_URL => $url . (strpos($url, '?') === FALSE ? '?' : '') . http_build_query($get),
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 4
    ];

    $ch = curl_init();

    curl_setopt_array($ch, ($options + $defaults));

    if (!$result = curl_exec($ch)) {
        trigger_error(curl_error($ch));
    }

    curl_close($ch);

    return json_decode($result);
}
