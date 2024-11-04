<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Découvrez notre site dédié aux animaux, leurs habitats, et tout ce qu'il faut savoir pour une visite inoubliable.">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <?php if (isset($link)) {
    echo $link;
  } ?>
  <link rel="icon" type="image/png" href="/Asset/Icones/favicon.ico">
  <link rel="stylesheet" href="/Asset/css/defaultNav.css">
  <link rel="stylesheet" href="/Asset/css/defaultFooter.css">
  <?php if (isset($script)) {
    echo $script;
  } ?>
  <title><?php if (isset($title)) {
            echo $title;
          } ?></title>
</head>

<body>
  <header>
    <div id="mainNavigation">
      <nav role="navigation">
        <div class="py-1 text-center border-bottom">
          <a href="/">
            <img class="logoA" src="/Asset/Icones/sansfond2.svg" alt="logo principal">
          </a>
        </div>
      </nav>
      <div class="navbar-expand-md">
        <div class="navbar-dark text-center my-2">
          <button class="navbar-toggler w-75  " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span> <span class="align-middle z-1">Menu</span>
          </button>
        </div>
        <div class="text-center mt-3 collapse navbar-collapse " id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto ">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">ARCADIA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/services">Nos Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/animaux">Nos Animaux</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/univers">Nos Univers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contacts">Contact</a>
            </li>
            <?php if (isset($_SESSION['id_User'])): ?>

              <li class="nav-item">
                <a class="nav-link" href="/ConnexionUser/deconnexion" onclick="return confirm('Voulez vous vous déconnecter ?');">Déconnexion</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="/ConnexionUser">connexion</a>
              </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'vétérinaire' || $_SESSION['role'] === 'employé')): ?>
              <li class="nav-item">
                <a class="nav-link " href="/dash">Dashboard</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>

  </header>

  <main><?= $contenu ?></main> <!--raccourci de echo en php-->

  <footer class="py-1 my-2">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="/" class="nav-link px-2">Arcadia</a></li>
      <li class="nav-item"><a href="/MentionLegales" class="nav-link px-2">Mentions légales</a></li>
      <li class="nav-item"><a href="/Rgpd" class="nav-link px-2">Rgpd</a></li>
      <li class="nav-item"><a href="/Cgu" class="nav-link px-2">Cgu</a></li>
    </ul>
  </footer>
  <div class="footer">
    <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
        class="bi bi-c-circle " viewBox="0 0 16 16">
        <path
          d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512" />
      </svg> Copyright 2024 Arcadia ZOO Lionel Blanchet</p>
  </div>
  <?php if (isset($script)) {
    echo $script;
  } ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>