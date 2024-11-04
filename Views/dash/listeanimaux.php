<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>

<div class="container mt-5 mb-5 animaux-container">
    <h2 class="mb-4">Gestion des Animaux</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Age</th>
                    <th>Image</th>
                    <th>Habitat</th>
                    <th>Visite</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animaux as $animal): ?>
                    <tr>
                        <td><?= $animal->nom ?></td>
                        <td><?= $animal->age ?></td>
                        <td>
                            <img src="/Asset/Images/<?= $animal->img ?>" class="img-thumbnail" alt="image de <?= $animal->nom ?>" width="80" height="80" />
                        </td>
                        <td><?= $animal->id_habitat ?></td>
                        <td><?= $animal->visite ?></td>
                        <td><?= $animal->description ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="/DashAnimaux/updateAnimal/<?= $animal->id ?>" class="btn btn-warning ">Modifier</a>
                                <form action="/DashAnimaux/deleteAnimal" method="POST" onsubmit="return confirm('êtes-vous sûr de vouloir supprimer cet animal ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $animal->id ?>">
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>