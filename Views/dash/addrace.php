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
                        <h2 class="text-center">Ajouter une nouvelle race</h2>
                    </div>
                    <div class="card-body">
                        <form action="/DashRace/ajoutRace" method="POST">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                            <div class="mb-3">
                                <label for="race" class="form-label">Nom de la race</label>
                                <input type="text" class="form-control" id="race" name="race" placeholder="Entrez le nom de la race" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <a href="/dash" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>