<?php
echo '<link rel="stylesheet" href="/Asset/css/nosunivers.css">';
?>

<div class="vide"></div>

<?php foreach ($univers as $univer): ?>
    <section class="container my-5">
        <div class="text-center mb-4">
            <a href="/Univers/showAnimaux/<?= htmlspecialchars($univer->id, ENT_QUOTES, 'UTF-8') ?>">
                <h2 class="mt-3 mb-5">Notre espace <?= htmlspecialchars($univer->nom, ENT_QUOTES, 'UTF-8') ?></h2>
            </a>
        </div>
        <div class="row">
            <!-- partie image -->
            <div class="col-12 mb-4 d-flex justify-content-center">
                <img class="w-75 img-fluid" src="/Asset/Images/<?= htmlspecialchars($univer->img, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($univer->nom, ENT_QUOTES, 'UTF-8') ?> " loading="lazy">
            </div>
        </div>
    </section>
<?php endforeach; ?>