<?php 
    $secretsJson = file_get_contents("vendor/secrets.json");
    $secretsData = json_decode($secretsJson, true);
    return [
        'api' => $secretsData['map']['api_key'],
    ];

?>