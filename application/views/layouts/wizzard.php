<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <?= BOOTSTRAP_SCRIPT_CSS; ?>
    <link rel="stylesheet" href="../css/site.css">
</head>

<body>
    <?= $content; ?>
    
    <?php echo BOOTSTRAP_SCRIPT_JS; ?>
    <script src="wizzardform.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?key=<?= MAP_API_KEY; ?>"></script>
    <script src="loadmap.js"></script>
</body>
</html>