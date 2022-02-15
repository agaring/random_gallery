<?php
use App\Entities\Api;

/**
 * @var string $title
 * @var Api $api
 * @var string $message
 */

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erreur Fill Database</title>
</head>
<body>

<a href="<?= route_to('api_index') ?>">Retour</a>

<h1><?= $title ?></h1>

<?php
if(isset($api)){
    ?><p>Api: <?= $api ?></p><?php
}
?>

<p><?= $message ?></p>

</body>
</html>
