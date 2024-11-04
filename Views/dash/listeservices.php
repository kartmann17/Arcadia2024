<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>
<div class="container mt-5 mb-5 service-container">
    <h2 class="mb-4">Gestion des Services</h2>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= $service->nom ?></td>
                        <td>
                            <img src="/Asset/Images/<?= $service->img ?>" class="img-thumbnail" alt="image de <?= $service->nom ?>" width="80" height="80" />
                        </td>
                        <td><?= $service->description ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="/DashServices/updateServices/<?= $service->id ?>" class="btn btn-warning ">Modifier</a>
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] !== 'employé'): ?>
                                    <form action="/DashServices/deleteService" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
                                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                        <input type="hidden" name="id" value="<?= $service->id ?>">
                                        <button class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                <?php endif; ?>
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