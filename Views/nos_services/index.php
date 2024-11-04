<?php
echo '<link rel="stylesheet" href="/Asset/css/nosservices.css">';
?>

<div class="vide"></div>
<div class="title">
    <h1 class="text-center mt-5"> Tous Nos Services</h1>
</div>
<section class="services container-fluid">
    <div class="row g-4">
        <?php foreach ($services as $service): ?>
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="card h-100">
                    <div class="card-body presanimaux text-center">
                        <div class="buttonA mb-3">
                            <button>
                                <h3><?= $service->nom ?></h3>
                            </button>
                        </div>
                        <div class="images">
                            <img src="/Asset/Images/<?= $service->img ?>" class="img-fluid"
                                alt="service train, visite guidé, restauration" loading="lazy">
                        </div>
                        <div class="description w-100 m-auto mt-5 overflow-auto d-flex align-items-center">
                            <p class="text-center"><?= $service->description ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>