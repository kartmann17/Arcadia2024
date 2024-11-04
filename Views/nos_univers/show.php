<?php
echo '<link rel="stylesheet" href="/Asset/css/nosunivers.css">';
?>

<<div class="vide"></div>
<div class="container my-5">
    <h2 class="text-center mb-4">Animaux de l'habitat : <?= htmlspecialchars($Habitat->nom, ENT_QUOTES, 'UTF-8') ?></h2>

        <div class="texte text-center">
            <p class="m-auto"><?= htmlspecialchars($univer[0]->description_Habitat, ENT_QUOTES, 'UTF-8') ?></p>
        </div>

    <div class="row row-cols-1 row-cols-md-3 g-5 m-auto mb-5">
        <?php foreach ($univer as $u): ?>
            <div class="col">
                <div class="card m-auto w-75 h-100 d-flex flex-column">
                    <img src="/Asset/Images/<?= htmlspecialchars($u->img_animal, ENT_QUOTES, 'UTF-8') ?>" class="card-img-top image" alt="Animal Image" />
                    <div class="card-body overflow-auto text-center d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><?= htmlspecialchars($u->nom_animal, ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text">Âge : <?= htmlspecialchars($u->age, ENT_QUOTES, 'UTF-8'); ?> ans</p>
                            <p class="card-text">Race: <?= htmlspecialchars($u->race, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">Habitat: <?= htmlspecialchars($u->nom_Habitat, ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="card-text">Avis véto: <?= htmlspecialchars($u->status, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>