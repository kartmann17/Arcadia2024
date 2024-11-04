<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>

<div class="container mt-5 mb-5 avis-container">
    <h2 class="mb-4">Liste des contacts</h2>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>email</th>
                    <th>message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?= $contact->nom ?></td>
                        <td><?= $contact->email ?></td>
                        <td><?= $contact->message ?></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <form action="/Contacts/deleteContact" method="POST" onsubmit="return confirm('êtes-vous sûr de vouloir supprimer cet avis ?');">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <input type="hidden" name="id" value="<?= $contact->id ?>">
                                    <button class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
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