<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>

</head>
<body>
<h4>Inscription</h4>
<hr>
<form action="<?= site_url('auth/save'); ?>" method="post">
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div> <?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div> <?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
    <label>Nom
        <input type="text" name="name" placeholder="Votre nom" value="<?= set_value('name'); ?>">
    </label>
    <span><?= isset($validation) ? display_error($validation, 'name') : '' ?> </span>
    <label>Email
        <input type="text" name="email" placeholder="Votre adresse mail" value="<?= set_value('email'); ?>">
    </label>
    <span><?= isset($validation) ? display_error($validation, 'email') : '' ?> </span>
    <label>Mot de passe
        <input type="password" name="password" placeholder="Votre mot de passe" value="<?= set_value('password'); ?>">
    </label>
    <span><?= isset($validation) ? display_error($validation, 'password') : '' ?> </span>
    <label>confirmation de Mot de passe
        <input type="password" name="cpassword" placeholder="Confirmation de mot de passe" value="<?= set_value('cpassword'); ?>">
    </label>
    <span><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?> </span>
    <button type="submit">S'inscrire</button>
    <br>
    <a href="<?= site_url('auth'); ?>">J'ai déjà un compte, me connecter</a>
</form>


</body>
</html>
