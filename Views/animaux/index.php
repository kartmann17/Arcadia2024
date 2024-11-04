<?php
echo '<link rel="stylesheet" href="/Asset/css/nosanimaux.css">';
?>

<div class="vide"></div>
<h1 class="text-center mb-5">Nos Animaux</h1>

<div class="row row-cols-1 row-cols-md-3 g-5 m-auto mb-5">
    <?php foreach ($animaux as $animal): ?>
        <div class="col">
            <div class="card m-auto w-75 h-100 d-flex flex-column">
                <img src="/Asset/Images/<?= htmlspecialchars($animal->img, ENT_QUOTES, 'UTF-8') ?>" class="card-img-top image" alt="Animal Image" />
                <div class="card-body overflow-auto text-center d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title"><?= htmlspecialchars($animal->nom, ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="card-text">Âge : <?= htmlspecialchars($animal->age, ENT_QUOTES, 'UTF-8'); ?> ans</p>

                        <?php foreach ($races as $race): if ($race->id == $animal->id_race): ?>
                                <p class="card-text">Race: <?= htmlspecialchars($race->race, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php break;
                            endif;
                        endforeach; ?>

                        <?php foreach ($univers as $univer): if ($univer->id == $animal->id_habitat): ?>
                                <p class="card-text">Habitat: <?= htmlspecialchars($univer->nom, ENT_QUOTES, 'UTF-8'); ?></p>
                        <?php break;
                            endif;
                        endforeach; ?>

                    </div>

                    <button class="btn btm mt-3 w-100 mt-auto"
                        data-animal-id="<?= htmlspecialchars($animal->id, ENT_QUOTES, 'UTF-8') ?>"
                        onclick='
                        showModal("<?= htmlspecialchars($animal->nom, ENT_QUOTES, 'UTF-8') ?>",
                        "<?= htmlspecialchars($animal->age, ENT_QUOTES, 'UTF-8') ?>",
                        "<?= isset($race->race) ? htmlspecialchars($race->race, ENT_QUOTES, 'UTF-8') : "Non défini" ?>",
                        "<?= isset($univer->nom) ? htmlspecialchars($univer->nom, ENT_QUOTES, 'UTF-8') : "Non défini" ?>",
                        "<?= htmlspecialchars($animal->description, ENT_QUOTES, 'UTF-8') ?>",
                        "/Asset/Images/<?= htmlspecialchars($animal->img, ENT_QUOTES, 'UTF-8') ?>");'>
                        Détails
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="animalModal" tabindex="-1" aria-labelledby="animalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100" id="animalModalLabel">Description de l'animal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modal-animal-img" src="" class="img-fluid mb-3" alt="Image de l'animal">
                <p><strong>Nom :</strong> <span id="modal-animal-name"></span></p>
                <p><strong>Âge :</strong> <span id="modal-animal-age"></span> Ans</p>
                <p><strong>Race :</strong> <span id="modal-animal-race"></span></p>
                <p><strong>Habitat :</strong> <span id="modal-animal-habitat"></span></p>
                <p><strong>Description :</strong> <span id="modal-animal-description"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script src="/Asset/Js/detailsanimaux.js"></script>
<script src="/Asset/Js/clicsvisite.js"></script>
