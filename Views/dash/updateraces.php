<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>
<section class="container">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Mise à jour <?= $races->race ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="/DashRace/updateRace/<?= $races->id ?>" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <input type="hidden" name="id" value="<?= $races->id ?>" />

                            <!-- Nom de la race -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom de la race</label>
                                <input type="text" class="form-control" id="nom" name="race" value="<?= $races->race ?>" placeholder="Nom de la race" required>
                            </div>

                            <!-- Boutons de soumission -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="/DashRace/liste" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>