<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>
<div class="container mt-5 mb-5 univers-container">
    <h2 class="mb-4">Gestion des Univers</h2>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Commentaire véto</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($univers as $univer): ?>
                    <tr>
                        <td><?= $univer->nom ?></td>
                        <td>
                            <img src="/Asset/Images/<?= $univer->img ?>" class="img-thumbnail" alt="image de <?= $univer->nom ?>" width="80" height="80" />
                        </td>
                        <td><?= $univer->description ?></td>
                        <td><?= $univer->commentaire ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="/DashUnivers/updateUnivers/<?= $univer->id ?>" class="btn btn-warning ">Modifier</a>

                                <form action="/DashUnivers/deleteUniver" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet univers ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $univer->id ?>">
                                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                        <button class="btn btn-danger btn-sm">Supprimer</button>
                                    <?php endif; ?>
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