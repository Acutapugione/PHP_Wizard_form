<?php 
    $secretsJson = file_get_contents("vendor/secrets.json");
    $secretsData = json_decode($secretsJson, true);
    // define('MAP_API_KEY', $secretsData['map']['api_key']);

    return [
        'api' => $secretsData['map']['api_key'],
    ];

?>