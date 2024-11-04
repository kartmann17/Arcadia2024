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
                        <h2 class="text-center">Mise à jour <?= htmlspecialchars($univers->nom, ENT_QUOTES, 'UTF-8') ?></h2>
                    </div>
                    <div class="card-body">
                        <form action="/DashUnivers/updateUnivers/<?= htmlspecialchars($univers->id, ENT_QUOTES, 'UTF-8') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($univers->id, ENT_QUOTES, 'UTF-8') ?>" />

                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Univers</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($univers->nom, ENT_QUOTES, 'UTF-8') ?>" placeholder="Nom de l'habitat" required>
                            </div>

                            <!-- image actuelle -->
                            <div class="mb-3">
                                <label for="current_image" class="form-label">Image actuelle</label>
                                <div class="mb-3">
                                    <img src="/Asset/Images/<?= htmlspecialchars($univers->img, ENT_QUOTES, 'UTF-8') ?>" alt="Image actuelle" class="img-fluid">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Nouvelle image (optionnelle)</label>
                                <input type="file" class="form-control" id="image" name="img" accept="image/*">
                                <small class="form-text text-muted">Laissez ce champ vide si vous ne voulez pas changer l'image.</small>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Ajoutez une description" required><?= htmlspecialchars($univers->description, ENT_QUOTES, 'UTF-8') ?></textarea>
                            </div>
                            <?php endif; ?>

                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'vétérinaire')): ?>
                            <!-- Commentaire -->
                            <div class="mb-3">
                                <label for="commentaire" class="form-label">Commentaire</label>
                                <textarea class="form-control" id="commentaire" name="commentaire" rows="3" placeholder="Ajoutez un commentaire"><?= htmlspecialchars($univers->commentaire, ENT_QUOTES, 'UTF-8') ?></textarea>
                            </div>
                            <?php endif; ?>

                            <!-- Boutons -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="/DashUnivers/liste" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>