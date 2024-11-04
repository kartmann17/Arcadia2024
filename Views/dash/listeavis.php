<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>
<div class="vide"></div>

<div class="container mt-5 mb-5 avis-container">
    <h2 class="mb-4">Liste des avis</h2>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ÉTOILES</th>
                    <th>Nom</th>
                    <th>Commentaire</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Avis as $avis): ?>
                    <tr>
                        <td><?= $avis->etoiles ?></td>
                        <td><?= $avis->nom ?></td>
                        <td><?= $avis->commentaire ?></td>
                        <td><?= $avis->date ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <form action="/DashValideAvis/deleteAvis" method="POST" onsubmit="return confirm('êtes-vous sûr de vouloir supprimer cet avis ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $avis->id ?>">
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                                <?php endif;?>
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