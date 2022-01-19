<?php if(!isset($_GET['page'])){
    $_GET['page'] = 0;
    $lastId = null;
}else {
    if (isset($_GET['lastid'])){
        $lastId = $_GET['lastid'];
    }
    if (isset($_GET['firstid'])){
        $lastId = null;
        $firstId = $_GET['firstid'];
    }
}; ?>
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
            if (isset($firstId)){
                if ($image->id > $firstId) continue;
            }                       
            $count += 1;
            ?>
            <tr>
                <td><?= '<img src="https://' . $image->path_to_image . '" width="500" height="500" >';?></td>
                <td>
        <?php foreach($arrComments as $comment){
            if ($comment->image_id == $image->id){?>
                    <table>
                        <tr>
                            <td><?= $comment->text;?></td>
                            <td><a href="<?= site_url('Comment/edit/'.$comment->id);?>">Modifier</a>
                                <a href="<?= site_url('Comment/delete/'.$comment->id);?>">Supprimer</a></td>
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

<p><a href="<?php echo previous_url();?>">Retour</a></p>
<?php 
    if (count($arrImages) > 10){
        if ($_GET['page'] != 0){?>
            <p><a href="http://rg.local/gallery?page=<?= intval($_GET['page']) - 1; ?>&firstid=<?= $firstId ?>">Précédant</a></p>
        <?php }
        if ($count == 10 ){?>
            <p><a href="http://rg.local/gallery?page=<?= intval($_GET['page']) + 1; ?>&lastid=<?= $lastId ?>">Suivant</a></p>
        <?php } ?>        
                
    <?php } 
?>
</body>
</html>