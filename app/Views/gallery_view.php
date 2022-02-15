<?php
/** @noinspection PhpUndefinedVariableInspection */
use App\Controllers\Gallery;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('favicon.ico');?>"/>

</head>
<body>
<h1 style="text-align:center"><?php echo $title; ?></h1>

<p><a href="<?= site_url("/auth") ?>">Se connecter</a></p>
<table>
    <thead>
    <tr>
        <th>Image</th>
        <th>Commentaire</th>
    </tr>
    </thead>
    <tbody>
        <?php $count = 0;        
        foreach($arrImages as $key=>$image){
            if ($count == 0){
                $firstIdTmp = $image->id;
            }
            if ($count == 10){
                $lastId = $image->id;
                break;
            }
            if ($image->id < $lastId) continue;
            if (isset($firstId) and $firstId != 0){
                if ($image->id > $firstId) continue;
            }
            $count += 1;
        ?>
            <tr>    
                <td>
                    <form action="<?= site_url("gallery/add"); ?>" method="post">
                    <input type="hidden" name="imageId" value="<?= $image->id?>" >
                    <?= '<img src="https://' . $image->path_to_image . '" width="500" height="500" >';?>
                    <input type="text" name="comment" placeholder="Commentaire">
                    
                    <button type="submit">Ajouter</button>
                    <br>
                </form>
                </td>
                <td>
        <?php foreach($arrComments as $comment){
            if ($comment->image_id == $image->id){?>
                    <table>
                        <tr>
                            <td><?= $comment->text;?></td>
                            <td>

                            <?php 
                                if (is_null($lastId)){   ?>
                                        <td><a href="<?= site_url("gallery/delete")."/".$comment->id?>"><button type="button">Supprimer</button></a></td>
                                    <?php
                                    }
                                        else
                                    {
                                        ?>
                                        <td><a href="<?= site_url("gallery/delete")."/".$comment->id?>"><button type="button">Supprimer</button></a></td>

                                    <?php } ?>        
                                            
                                <?php  
                            ?>

                        </tr>
                    </table>  
        <?php }
            } ?>
                </td>
            </tr>
        <?php } 
        $firstId = $firstIdTmp;?>    
    </tbody>
</table>

<p><a href="<?php echo site_url();?>">Retour</a></p>
<?php 
    if (count($arrImages) > 10){
        if ($page != 0){?>
            <p><a href="<?= site_url("gallery/previous"). "/". $page - 1 . "/" . $firstId ?>">Précédant</a></p>
        <?php }
        if ($count == 10 ){?>
            <p><a href="<?= site_url("gallery/next"). "/" . $page + 1 . "/" . $lastId ?>">Suivant</a></p>
        <?php } ?>        
                
    <?php } 
?>
</body>
</html>