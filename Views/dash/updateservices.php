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
                        <h2 class="text-center">Mise à jour : <?= ($services->nom) ?></h2>
                    </div>
                    <div class="card-body">

                        <!-- Formulaire -->
                        <form action="/DashServices/updateServices/<?= $services->id ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= ($services->nom) ?>" placeholder="Nom du service" required>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ajoutez une description" required><?= ($services->description) ?></textarea>
                            </div>
                            <!-- image actuelle -->
                            <div class="mb-3">
                                <label for="current_image" class="form-label">Image actuelle</label>
                                <div class="mb-3">
                                    <img src="/Asset/Images/<?= htmlspecialchars($services->img, ENT_QUOTES, 'UTF-8') ?>" alt="Image actuelle" class="img-fluid">
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Nouvelle image (optionnelle)</label>
                                <input type="file" class="form-control" id="image" name="img" accept="image/*">
                                <small class="form-text text-muted">Laissez ce champ vide si vous ne voulez pas changer l'image.</small>
                            </div>

                            <!-- Boutons d'action -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="/DashServices/liste" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>