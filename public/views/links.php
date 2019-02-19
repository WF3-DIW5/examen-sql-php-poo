<a href="<?= url(''); ?>" class="text-white">Accueil</a>

<?php if (isset($_SESSION['user'])): ?>

    <a href="<?= url('conducteurs'); ?>" class="text-white">Conducteurs</a>
    <a href="<?= url('associations'); ?>" class="text-white">Associations</a>
    <a href="<?= url('vehicules'); ?>" class="text-white">Véhicules</a>
    <a href="<?= url('divers'); ?>" class="text-white">Divers</a>

    <a href="<?= url('compte'); ?>" class="text-white">Mon compte: <?= unserialize($_SESSION['user'])->pseudo() ?></a>
    <a href="<?= url('logout'); ?>" class="text-white">Deconnexion</a>

<?php else: ?>
    <a href="<?= url('signup'); ?>" class="text-white">Créer un compte</a>
    <a href="<?= url('login'); ?>" class="text-white">Connexion</a>
<?php endif; ?>