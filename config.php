<?php 
    $secretsJson = file_get_contents("vendor/secrets.json");
    $secretsData = json_decode($secretsJson, true);
    define('MAP_API_KEY', $secretsData['map']['api_key']);

    define('BOOTSTRAP_SCRIPT_JS', '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>');
    define('BOOTSTRAP_SCRIPT_CSS', '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">');
    
    
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'demo');

    // $conn = mysqli_connect(
    //     DB_SERVER,
    //     DB_USERNAME,
    //     DB_PASSWORD,
    //     DB_NAME);
    
    // if ($conn === false) {
    //     die( mysqli_connect_error());
    // }
?>
