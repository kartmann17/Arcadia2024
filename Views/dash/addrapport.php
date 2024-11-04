<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>

<div class="container mt-5 mb-5 rapport-container">
    <h2 class="mb-4">Rapport animaux</h2>

    <form action="/DashRapport/ajoutRapport" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="mb-3">
            <label for="role" class="form-label">Animal</label>
            <select class="form-select" id="nom" name="nom" required>
                <option value="">Sélectionner l'animal</option>
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal->nom ?>"><?= $animal->nom ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="datetime">Date et Heure</label>
            <input type="datetime-local" class="form-control" id="date" name="date" required>
        </div>

        <?php if (isset($_SESSION['role']) && ( $_SESSION['role'] === 'vétérinaire')): ?>
        <div class="form-group mb-3">
            <label for="status">Statut</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Ex : Actif, Repos, Malade...">
        </div>

            <div class="form-group mb-3">
                <label for="nourriture">Nourriture recommandée</label>
                <input type="text" class="form-control" id="nourriture" name="nourriture_reco" placeholder="Type de nourriture">
            </div>

            <div class="form-group mb-3">
                <label for="grammage">Poid recommandé (en Kg)</label>
                <input type="number" class="form-control" id="grammage" name="grammage_reco" placeholder="Grammage en grammes">
            </div>

            <div class="form-group mb-3">
                <label for="sante">Santé (sur 10)</label>
                <input type="number" class="form-control" id="sante" name="sante" min="0" max="10" placeholder="Niveau de santé (0-10)">
            </div>
            <?php endif; ?>

        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employé')): ?>
            <div class="form-group mb-3">
                <label for="repas">Repas donnés</label>
                <input type="text" class="form-control" id="repas" name="repas_donnees" placeholder="Type de repas donné" required>
            </div>


            <div class="form-group mb-3">
                <label for="quantite">Quantité donnée (en Kg)</label>
                <input type="number" class="form-control" id="quantite" name="quantite" placeholder="Quantité donnée en grammes" required>
            </div>
        <?php endif; ?>

        <div class="form-group mb-3">
            <label for="commentaire">Commentaire</label>
            <textarea class="form-control" id="commentaire" name="commentaire" rows="3" placeholder="Ajouter un commentaire..." required></textarea>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Animal</label>
            <select class="form-select" id="id_animal" name="id_animal" required>
                <option value="">Sélectionner l'animal</option>
                <?php foreach ($animaux as $animal): ?>
                    <option value="<?= $animal->id ?>"><?= $animal->nom ?></option>
                <?php endforeach; ?>
            </select>
        </div>



        <div class="form-group text-end">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/dash" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>