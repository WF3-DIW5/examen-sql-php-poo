<?php ob_start(); ?>

    <table class="table table-striped text-center">
        <tr>
            <th>id_conducteur</th>
            <th>prenom</th>
            <th>nom</th>
            <th>modification</th>
            <th>suppression</th>
        </tr>

        <?php foreach ($conducteurs as $conducteur) : ?>

            <tr>
                <td><?= $conducteur->idConducteur() ?></td>
                <td><?= $conducteur->prenom() ?></td>
                <td><?= $conducteur->nom() ?></td>
                <td><a href="<?= url('conducteurs/' . $conducteur->idConducteur() . '/show') ?>"><i class="fas fa-pen"></i></a></td>
                <td><a href="<?= url('conducteurs/' . $conducteur->idConducteur() . '/delete') ?>"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>


<form action="<?= url('conducteurs/save') ?>" method="post">

    <label for="idPrenom">Prénom</label>
    <input type="text" id="idPrenom" class="form-control" name="prenom">

    <label for="idNom">Nom</label>
    <input type="text" id="idNom" class="form-control" name="nom">


    <hr>

    <button type="submit" class="btn btn-primary">Ajouter ce conducteur</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>