<?php ob_start(); ?>


<form action="<?= url('login') ?>" method="post" class="form">

    <div class="form-group">
        <label for="loginEmail">E-mail</label>
        <input id="loginEmail" name="email" type="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="loginPassword">Mot de passe</label>
        <input id="loginPassword" name="password" type="password" class="form-control" required>

    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success float-right">Connexion</button>
    </div>

</form>

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>