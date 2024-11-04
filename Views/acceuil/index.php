<?php
echo '<link rel="stylesheet" href="/Asset/css/mainaccueil.css">';
?>

<video id="videoAC" src="/Asset/Images/Videos/20079364-uhd_2560_1440_30fps.mp4" autoplay loop muted></video>
<div class="title d-flex justify-content-center">
  <h1>Découvrez les Merveilles du Monde <br> Animal: Une Journée Magique au Zoo!</h1>
</div>
<section class="preszoo">
  <h2> Le Zoo Arcadia</h2>
  <div class="font overflow-auto ">
    <p>Notre zoo fut fondée en 1960 et offre une immersion authentique dans le monde naturel avec une collection
      d'animaux exceptionnels répartis sur différents habitats, y compris la savane africaine vibrante,
      l'introspection dense de la jungle et les eaux tranquilles des marais.
      Notre engagement pour le bien-être animal est une priorité absolue, avec des équipes expertes qui se déplacent
      quotidiennement au zoo pour effectuer des contrôles médicaux préventifs et garantir un environnement sain.
      Nous avons également développé une approche de gestion financière solide, ce qui a permis à notre directeur
      éminent, José, d'acquérir l'ambition de nous rendre plus que seulement une attraction locale - c'est
      maintenant la porte vers un voyage sans limite dans le monde animal. Nous avons hâte de vous accueillir au zoo
      Arcadia pour une aventure épique, des rencontres inoubliables et des leçons d'écologie qui vont changer votre
      vie. Découvrez nos parcours animaliers avec nous aujourd'hui !</p>
  </div>

  <iframe
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10522.271462987312!2d-3.4074777!3d47.8122465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x481058961f2dd7e5%3A0x28874405b9bc370!2sLes%20Terres%20de%20Nata%C3%A9!5e1!3m2!1sfr!2sfr!4v1722681323943!5m2!1sfr!2sfr"
    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
    Maps Zoo</iframe>
</section>
<!-- fin section 1 prés du zoo-->

<!-- Début block univers-->
<section class="animaux">
  <h2>Nos Univers</h2>
  <div class="presanimaux">
    <!-- 1 er block image -->
    <div class="buttonA">
      <button>
        <h3><?= htmlspecialchars("Savane", ENT_QUOTES, 'UTF-8') ?></h3>
      </button>
    </div>
    <div class="images">
      <a href="<?= htmlspecialchars("Univers/showAnimaux/1", ENT_QUOTES, 'UTF-8') ?>">
        <img src="<?= htmlspecialchars("/Asset/Images/lion_paysage.webp", ENT_QUOTES, 'UTF-8') ?>" class="img-fluid" alt="<?= htmlspecialchars("lion", ENT_QUOTES, 'UTF-8') ?>">
      </a>
    </div>

    <!-- 2ème block image -->
    <div class="buttonA">
      <button>
        <h3><?= htmlspecialchars("Jungle", ENT_QUOTES, 'UTF-8') ?></h3>
      </button>
    </div>
    <div class="images">
      <a href="<?= htmlspecialchars("Univers/showAnimaux/2", ENT_QUOTES, 'UTF-8') ?>">
        <img src="<?= htmlspecialchars("/Asset/Images/perroquetpaysage2.webp", ENT_QUOTES, 'UTF-8') ?>" class="img-fluid" alt="<?= htmlspecialchars("perroquet", ENT_QUOTES, 'UTF-8') ?>">
      </a>
    </div>

    <!-- 3ème block image -->
    <div class="buttonA">
      <button>
        <h3><?= htmlspecialchars("Marais", ENT_QUOTES, 'UTF-8') ?></h3>
      </button>
    </div>
    <div class="images">
      <a href="<?= htmlspecialchars("Univers/showAnimaux/3", ENT_QUOTES, 'UTF-8') ?>">
        <img src="<?= htmlspecialchars("/Asset/Images/crocopaysge.webp", ENT_QUOTES, 'UTF-8') ?>" class="img-fluid" alt="<?= htmlspecialchars("croco", ENT_QUOTES, 'UTF-8') ?>">
      </a>
    </div>
  </div>
</section>
<!-- fin section block univers-->

<!-- Début section 3 horaires -->
<section class="container-fluid horaires py-5">
  <h2 class="text-center mb-5">Nos Horaires</h2>
  <div class="table-responsive">
    <?php if (isset($horaires) && !empty($horaires)): ?>
      <table class="table text-center table-custom mx-auto">
        <tbody>
          <?php foreach ($horaires as $horaire): ?>
            <tr>
              <td class="fw-bold"><?= htmlspecialchars($horaire['jour'], ENT_QUOTES, 'UTF-8') ?></td>
              <?php if ($horaire['ouverture'] !== 'Fermé'): ?>
                <td class="heure"><?= htmlspecialchars($horaire['ouverture'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="separateur">-</td>
                <td class="heure"><?= htmlspecialchars($horaire['fermeture'], ENT_QUOTES, 'UTF-8') ?></td>
              <?php else: ?>
                <td colspan="3" class="ferme">Fermé</td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>Aucun horaire disponible pour le moment.</p>
    <?php endif; ?>
  </div>
</section>
<!-- fin secion 3 horaires -->

<!-- Début section 4 avis -->
<section class="avis">
  <div class="buttonA d-flex justify-content-center mb-5">
    <button>
      <h3>Avis</h3>
    </button>
  </div>

  <!-- caroussel avis-->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php if (isset($Avis) && !empty($Avis)): ?>
        <?php
        // Filtrer les avis qui ont un champ 'valide' égal à 1
        $avisValides = array_filter($Avis, function ($avis) {
          return $avis->valide == 1;
        });

        // Vérifier s'il y a des avis valides après filtrage
        if (!empty($avisValides)) {
          // Séparation des avis valides en groupes de 3 pour le carousel
          $avisChunks = array_chunk($avisValides, 3);
          $activeClass = 'active'; // activation de la première feuille
          foreach ($avisChunks as $avisGroup): ?>
            <div class="carousel-item <?= $activeClass; ?>">
              <div class="row justify-content-center m-auto w-75">
                <?php foreach ($avisGroup as $valide): ?>
                  <div class="col-12 col-md-4 mb-3">
                    <div class="card text-bg-light mb-3">
                      <div class="card-header d-flex justify-content-center column-gap-4">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                          if ($i <= $valide->etoiles) {
                            echo '<span class="star-filled">&#9733;</span>';
                          }
                        }
                        ?>
                      </div>
                      <div class="card-body text-center overflow-auto">
                        <h5 class="card-title"><?= $valide->nom ?></h5>
                        <p class="card-text"><?= $valide->commentaire ?></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php $activeClass = ''; ?>
          <?php endforeach; ?>
        <?php } else { ?>
          <p>Aucun avis valide pour le moment.</p>
        <?php } ?>
      <?php else: ?>
        <p>Aucun avis pour le moment.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- partie bouton avis avec modal avis -->
  <div class="buttonb d-flex justify-content-center mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <h3>Laisser un avis</h3>
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Laisser un avis</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <!-- Formulaire d'avis -->
          <form id="avisForm" action="/Avis/ajoutAvis" method="POST">
          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <!-- Etoiles -->
            <div class="rating mb-3">
              <input type="radio" name="etoiles" value="5" id="5" required>
              <label for="5">☆</label>
              <input type="radio" name="etoiles" value="4" id="4" required>
              <label for="4">☆</label>
              <input type="radio" name="etoiles" value="3" id="3" required>
              <label for="3">☆</label>
              <input type="radio" name="etoiles" value="2" id="2" required>
              <label for="2">☆</label>
              <input type="radio" name="etoiles" value="1" id="1" required>
              <label for="1">☆</label>
            </div>

            <!--  date de visite -->
            <div class="controls mb-3">
              <label for="date" class="mb-1">Date de votre visite</label>
              <input id="date" class="datepicker form-control" type="date" name="date" max="<?= date('Y-m-d'); ?>" required>
            </div>

            <!--  nom -->
            <div class="mb-3">
              <label for="nom" class="form-label">Nom</label>
              <input id="nom" class="form-control" type="text" name="nom" placeholder="Nom" required />
            </div>

            <!--  commentaire -->
            <div class="mb-3">
              <label for="commentaire" class="form-label">Commentaire</label>
              <textarea id="commentaire" class="form-control" name="commentaire" rows="6" placeholder="Message" required></textarea>
            </div>

            <!-- Footer  -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



</section>
<script src="/Asset/Js/videomobile.js"></script>
<script src="/Asset/Js/req.js"></script>