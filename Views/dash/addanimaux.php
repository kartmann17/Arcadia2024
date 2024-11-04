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
                        <h2 class="text-center">Ajout Animal</h2>
                    </div>
                    <div class="card-body">

                        <form action="/DashAnimaux/ajoutAnimaux" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom Animal" required>
                            </div>

                            <!-- Age -->
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="img" accept="image/*" required>
                            </div>

                            <!-- Race -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Race</label>
                                <select class="form-select" id="id_race" name="id_race" required>
                                    <option value="">Sélectionner une race</option>
                                    <?php foreach ($races as $race): ?>
                                        <option value="<?= $race->id ?>"><?= $race->race ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- habitat -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Habitat</label>
                                <select class="form-select" id="id_habitat" name="id_habitat" required>
                                    <option value="">Sélectionner un habitat</option>
                                    <?php foreach ($univers as $univer): ?>
                                        <option value="<?= $univer->id ?>"><?= $univer->nom ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Description de l'animal" required></textarea>
                            </div>


                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="/dash" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>