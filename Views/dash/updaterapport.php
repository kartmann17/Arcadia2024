<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>
<section class="container ">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Mise a jour <?= $rapport->nom ?></h2>
                    </div>
                    <div class="card-body">

                        <form action="/DashRapport/updateRapport/<?= $rapport->id ?>" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <input type="hidden" name="id" value="<?= $rapport->id ?>" />

                            <div class="form-group mb-3">
                                <label for="nom">Nom de l'animal</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= $rapport->nom ?>" placeholder="Nom de l'animal" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?= $rapport->date ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Statut</label>
                                <input type="text" class="form-control" id="status" name="status" value="<?= $rapport->status ?>" placeholder="Ex : Actif, Repos, Malade..." required>
                            </div>

                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'vétérinaire')): ?>
                                <div class="form-group mb-3">
                                    <label for="nourriture">Nourriture recommandée</label>
                                    <input type="text" class="form-control" id="nourriture" name="nourriture_reco" value="<?= $rapport->nourriture_reco ?>" placeholder="Type de nourriture" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="grammage">Grammage recommandé (en grammes)</label>
                                    <input type="number" class="form-control" id="grammage" name="grammage_reco" value="<?= $rapport->grammage_reco ?>" placeholder="Grammage en grammes" required>
                                </div>
                            <?php endif; ?>

                            <div class="form-group mb-3">
                                <label for="sante">Santé (sur 10)</label>
                                <input type="number" class="form-control" id="sante" name="sante" value="<?= $rapport->sante ?>" min="0" max="10" placeholder="Niveau de santé (0-10)" required>
                            </div>

                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employé')): ?>
                                <div class="form-group mb-3">
                                    <label for="repas">Repas donnés</label>
                                    <input type="text" class="form-control" id="repas" name="repas_donnees" value="<?= $rapport->repas_donnees ?>" placeholder="Type de repas donné" required>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="quantite">Quantité donnée (en grammes)</label>
                                    <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $rapport->quantite ?>" placeholder="Quantité donnée en grammes" required>
                                </div>
                            <?php endif; ?>

                            <div class="form-group mb-3">
                                <label for="commentaire">Commentaire</label>
                                <textarea class="form-control" id="commentaire" name="commentaire" value="<?= $rapport->commentaire ?>" rows="3" placeholder="Ajouter un commentaire..." required><?= $rapport->commentaire ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Animal</label>
                                <select class="form-select" id="id_animal" name="id_animal" required>
                                    <option value="">Sélectionner l'animal</option>
                                    <?php foreach ($animaux as $animal): ?>
                                        <option value="<?= $animal->id ?>" <?= ($animal->id == $rapport->id_animal) ? 'selected' : '' ?>>
                                            <?= $animal->nom ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a href="/DashRapport/liste" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>