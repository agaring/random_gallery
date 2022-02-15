<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sign In</title>
    
</head>
<body>
    <h4>Connexion</h4><hr>
    <form action="<?= base_url('auth/check') ?>" method="post" >
        <?= csrf_field(); ?>

        <?php if(!empty(session()->getFlashdata('fail'))) : ?>
            <div> <?= session()->getFlashdata('fail'); ?></div>
        <?php endif ?>

        <?php if(!empty(session()->getFlashdata('success'))) : ?>
            <div> <?= session()->getFlashdata('success'); ?></div>
        <?php endif ?>
        <label>Email</label>
        <input type="text" name="email" placeholder="Votre adresse mail" value="<?= set_value('email'); ?>">
        <span><?= isset($validation) ? display_error($validation, 'email') : ''?> </span> 
        <label>Mot de passe</label>
        <input type="text" name="password" placeholder="Votre mot de passe" value="<?= set_value('password'); ?>">
        <span><?= isset($validation) ? display_error($validation, 'password') : ''?> </span> 
        <button type="submit">Connexion</button>
        <br>
        <a href="<?= site_url('auth/register'); ?>">Je n'ai pas de compte, m'inscrire</a>
    </form>


</body>
</html>
