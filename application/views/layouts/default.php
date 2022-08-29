<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <?= BOOTSTRAP_SCRIPT_CSS; ?>
    <link rel="stylesheet" href="../css/site.css">

</head>
<body>
    <?= $content; ?>
    <?php echo BOOTSTRAP_SCRIPT_JS; ?>

</body>
</html>