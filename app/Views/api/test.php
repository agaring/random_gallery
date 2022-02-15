<?php

use App\Entities\Api;

/** @var Api $api */
/** @var array $imageLinks */
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Api Test</title>
</head>
<body>
<a href="<?= route_to('api_index') ?>">retour</a>

<?php if (isset($api)) {
    ?>
    <h1>Api = <?= $api ?></h1>
    <?php
    /** @var string $imageLink */
    foreach ($imageLinks as $imageLink) {
        ?><img src="<?= $imageLink?>" width="300" height="300" alt="test_image"><?php
    }
} else {
    ?>
    <h1>No Api found</h1>
    <?php
} ?>


</body>
</html>
