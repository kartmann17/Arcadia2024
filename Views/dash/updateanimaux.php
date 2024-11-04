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
                        <h2 class="text-center">Mise à jour <?= $animaux->nom ?></h2>
                    </div>
                    <div class="card-body">

                        <form action="/DashAnimaux/updateAnimal/<?= $animaux->id ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <input type="hidden" name="id" value="<?= $animaux->id ?>" />

                            <!-- Nom de l'animal -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom de l'animal</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= $animaux->nom ?>" placeholder="Nom de l'animal" required>
                            </div>

                            <!-- Âge de l'animal -->
                            <div class="mb-3">
                                <label for="age" class="form-label">Âge de l'animal</label>
                                <input type="number" class="form-control" id="age" name="age" value="<?= $animaux->age ?>" placeholder="Âge de l'animal" required>
                            </div>

                            <!-- image actuelle -->
                            <div class="mb-3">
                                <label for="current_image" class="form-label">Image actuelle</label>
                                <div class="mb-3">
                                    <img src="/Asset/Images/<?= htmlspecialchars($animaux->img, ENT_QUOTES, 'UTF-8') ?>" alt="Image actuelle" class="img-fluid">
                                </div>
                            </div>

                            <!-- URL de l'image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Nouvelle image (optionnelle)</label>
                                <input type="file" class="form-control" id="image" name="img" accept="image/*">
                                <small class="form-text text-muted">Laissez ce champ vide si vous ne voulez pas changer l'image.</small>
                            </div>

                            <!-- Race de l'animal -->
                            <div class="mb-3">
                                <label for="id_race" class="form-label">Race</label>
                                <select class="form-select" id="id_race" name="id_race" required>
                                    <option value="">Sélectionner une race</option>
                                    <?php foreach ($races as $race): ?>
                                        <option value="<?= $race->id ?>" <?= ($race->id == $animaux->id_race) ? 'selected' : '' ?>><?= $race->race ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Habitat de l'animal -->
                            <div class="mb-3">
                                <label for="id_habitat" class="form-label">Habitat</label>
                                <select class="form-select" id="id_habitat" name="id_habitat" required>
                                    <option value="">Sélectionner un habitat</option>
                                    <?php foreach ($univers as $univer): ?>
                                        <option value="<?= $univer->id ?>" <?= ($univer->id == $animaux->id_habitat) ? 'selected' : '' ?>><?= $univer->nom ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" value="<?= $animaux->description ?>" rows="4" placeholder="Description de l'animal" required><?= $animaux->description ?></textarea>
                            </div>

                            <!-- Boutons de soumission -->
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                <a href="/DashAnimaux/liste" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>