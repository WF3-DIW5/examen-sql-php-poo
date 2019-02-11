<?php ob_start(); ?>

    <table class="table table-striped text-center">
        <tr>
            <th>id_vehicule</th>
            <th>marque</th>
            <th>modele</th>
            <th>couleur</th>
            <th>immatriculation</th>
            <th>modification</th>
            <th>suppression</th>
        </tr>

        <?php foreach ($vehicules as $vehicule) : ?>

            <tr>
                <td><?= $vehicule->idVehicule() ?></td>
                <td><?= $vehicule->marque() ?></td>
                <td><?= $vehicule->modele() ?></td>
                <td><?= $vehicule->couleur() ?></td>
                <td><?= $vehicule->immatriculation() ?></td>
                <td><a href="<?= url('vehicules/' . $vehicule->idVehicule() . '/show') ?>"><i class="fas fa-pen"></i></a></td>
                <td><a href="<?= url('vehicules/' . $vehicule->idVehicule() . '/delete') ?>"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>


<form action="<?= url('vehicules/save') ?>" method="post">

    <label for="idMarque">Marque</label>
    <input type="text" id="idMarque" class="form-control" name="marque">

    <label for="idModele">Modèle</label>
    <input type="text" id="idModele" class="form-control" name="modele">

    <label for="idCouleur">Couleur</label>
    <input type="text" id="idCouleur" class="form-control" name="couleur">

    <label for="idImmatriculation">Immatriculation</label>
    <input type="text" id="idImmatriculation" class="form-control" name="immatriculation">


    <hr>

    <button type="submit" class="btn btn-primary">Ajouter ce véhicule</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>