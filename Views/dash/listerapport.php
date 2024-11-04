<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>

<div class="container mt-5 mb-5 rapport-container">
    <h2 class="mb-4">Rapport des animaux</h2>

    <div class="d-flex justify-content-end mb-3">
        <div class="me-3">
            <label for="animalFilter" class="form-label">Sélectionner un animal</label>
            <select id="animalFilter" class="form-select" onchange="filterTable()">
                <option value="">Tous les animaux</option>
                <?php foreach ($rapports as $rapport): ?>
                    <option value="<?= $rapport->nom ?>"><?= $rapport->nom ?></option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="me-3">
            <label for="dateFilter" class="form-label">Sélectionner une date</label>
            <input type="date" id="dateFilter" class="form-control" onchange="filterTable()">
        </div>


        <div class="me-3 align-self-end">
            <button onclick="resetFilter()" class="btn btn-secondary">Annuler</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="rapportTable">
            <thead class="table-dark">
                <tr>
                    <th>Nom de l'animal</th>
                    <th>Date/heure</th>
                    <th>Statut</th>
                    <th>Nourriture recommandée</th>
                    <th>Poids recommandé (Kg)</th>
                    <th>Santé (/10)</th>
                    <th>Repas donnés</th>
                    <th>Quantité donnée (Kg)</th>
                    <th>Commentaire</th>
                    <th>Id user</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rapports as $rapport): ?>
                    <tr>
                        <td><?= $rapport->nom ?></td>
                        <td><?= $rapport->date ?></td>
                        <td><?= $rapport->status ?></td>
                        <td><?= $rapport->nourriture_reco ?></td>
                        <td><?= $rapport->grammage_reco ?></td>
                        <td><?= $rapport->sante ?></td>
                        <td><?= $rapport->repas_donnees ?></td>
                        <td><?= $rapport->quantite ?></td>
                        <td><?= $rapport->commentaire ?></td>
                        <td><?= $rapport->id_User ?></td>
                        <td><?= $rapport->nom ?></td>
                        <td>
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin' ): ?>
                            <div class="d-flex justify-content-between">
                                <a href="/DashRapport/updateRapport/<?= $rapport->id ?>" class="btn btn-warning">Modifier</a>
                                <?php endif;?>

                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'vétérinaire'): ?>
                                <form action="/DashRapport/deleteRapport" method="POST" onsubmit="return confirm('êtes-vous sûr de vouloir supprimer ce rapport ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $rapport->id ?>">
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

<script src="/Asset/Js/trisanimaux.js"></script>