<?php

use App\Entities\Api;

/** @var string $title */
/** @var array $arrApi */
/** @var Api $api */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>

<a href="<?= route_to('')?>">Retour</a>

<h1><?php echo $title ?></h1>

<table>
    <tr>
        <th>enabled</th>
        <th>id</th>
        <th>category</th>
        <th>short_name</th>
        <th>api_name</th>
        <th>request_url</th>
        <th>data_selector</th>
        <th>actions</th>
    </tr>
    <?php
    foreach ($arrApi as $api) { ?>
        <tr>
            <td><!--suppress HtmlFormInputWithoutLabel -->
                <input type="checkbox" onclick="return false;" <?php if ($api->enabled) {echo 'checked';}?>>
            </td>
            <td><?php echo $api->id ?></td>
            <td><?php echo $api->category ?></td>
            <td><?php echo $api->short_name ?></td>
            <td><?php echo $api->api_name ?></td>
            <td><?php echo $api->request_url ?></td>
            <td><?php echo $api->data_selector ?></td>
            <td>
                <a href="<?= route_to('api_test', $api->short_name) ?>">test</a>
                <a href="<?= route_to('api_filldb', $api->short_name, 10)?>">fillDB</a>
                <a href="">edit</a>
                <a href="">delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>