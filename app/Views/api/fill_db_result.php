<?php
/** @var array $imageLinks */
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultat remplissage DB</title>
</head>
<body>

<h1>Resultat remplissage DB</h1>
<a href="<?= route_to('api_index')?>">Retour</a>
<p>Les images suivantes ont été ajouté:</p>

<?php 
foreach ($imageLinks as $imageLink){
    ?> <img src="<?= $imageLink ?>" height="100" width="100" alt="Fill DB result"><?php
}
?>

</body>
</html>

