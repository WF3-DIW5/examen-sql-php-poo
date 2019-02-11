<?php ob_start(); ?>

    <table class="table table-striped text-center">
        <tr>
            <th>id_association</th>
            <th>conducteur</th>
            <th>vehicule</th>
            <th>modification</th>
            <th>suppression</th>
        </tr>

        <?php foreach($associations as $association) : ?>

            <tr>
                <td><?= $association->idAssociation() ?></td>
                <td><?= $association->conducteur()->prenom() . ' ' . $association->conducteur()->nom() . '<br>' . $association->conducteur()->idConducteur() ?></td>
                <td><?= $association->vehicule()->marque() . ' ' . $association->vehicule()->modele() . '<br>' . $association->vehicule()->idVehicule() ?></td>
                <td><a href="<?= url('associations/' . $association->idAssociation() . '/show') ?>"><i class="fas fa-pen"></i></a></td>
                <td><a href="<?= url('associations/' . $association->idAssociation() . '/delete') ?>"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </table>


<form action="<?= url('associations/save')?>" method="post">

    <label for="idConducteur">Conducteur</label>
    <select id="idConducteur" class="form-control" name="id_conducteur">
        <?php foreach($conducteurs as $conducteur) : ?>
        <option value="<?= $conducteur->idConducteur() ?>"><?= $conducteur->prenom() ?> <?= $conducteur->nom() ?></option>
        <?php endforeach; ?>
    </select>

    <label for="idVehicule">Véhicule</label>
    <select id="idVehicule" class="form-control" name="id_vehicule">
        <?php foreach($vehicules as $vehicule) : ?>
        <option value="<?= $vehicule->idVehicule() ?>"><?= $vehicule->marque() ?> - <?= $vehicule->modele() ?> (<?= $vehicule->immatriculation() ?>)</option>
        <?php endforeach; ?>
    </select>

    <hr>

    <button type="submit" class="btn btn-primary">Ajouter cette association</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>