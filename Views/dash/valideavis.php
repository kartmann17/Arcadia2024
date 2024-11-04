<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>

<div class="container mt-5 mb-5 avis-container">
    <h2 class="mb-4">Valider des avis</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ETOILES</th>
                <th>Nom</th>
                <th>Commentaire</th>
                <th>date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach ($Avis as $avis): ?>
            <tbody>
                <tr>
                    <td><?= $avis->etoiles ?></td>
                    <td><?= $avis->nom ?></td>
                    <td><?= $avis->commentaire ?></td>
                    <td><?= $avis->date ?></td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <form action="/DashValideAvis/validerAvis" method="POST" onsubmit="return confirm('etes vous sur de vouloir valider l\'avis ?');">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <input type="hidden" name="id" value="<?= $avis->id ?>">
                                <button class="btn btn-success btn-sm">Valider</button>
                            </form>

                            <form action="/DashValideAvis/deleteAvis" method="POST" onsubmit="return confirm('etes vous sur de vouloir supprimer cette avis ?');">
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                <input type="hidden" name="id" value="<?= $avis->id ?>">
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </table>

    <div class="text-end">
        <a href="/dash" class="btn btn-secondary">Annuler</a>
    </div>
</div>