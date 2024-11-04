<?php
echo '<link rel="stylesheet" href="/Asset/css/dashindex.css">';
?>

<div class="vide"></div>

<div class="container-fluid admin-container">
    <div class="admin-space">
        <h2 class="mb-4 text-center">Dashboard <?php echo $_SESSION['nom']; ?></h2>
        <div class="row">
            <!-- Colonne 1 -->

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashAnimaux" class="admin-link">Ajout d'animaux</a>
                </div>

                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashAnimaux/liste" class="admin-link">Liste des animaux</a>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashRace" class="admin-link">Ajout Race</a>
                </div>
            <?php endif; ?>

            <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                <a href="/DashRace/liste" class="admin-link">Liste Races</a>
            </div>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashUser" class="admin-link">Ajout d'utilisateur</a>
                </div>


                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashUser/liste" class="admin-link">Liste des utilisateurs</a>
                </div>


                <!-- Colonne 2 -->
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashUnivers" class="admin-link">Ajout Univers</a>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'vétérinaire' || $_SESSION['role'] === 'admin'): ?>
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashUnivers/liste" class="admin-link">Liste des univers</a>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')): ?>
                <!-- Colonne 3 -->
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashServices" class="admin-link">Ajout service</a>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employé')): ?>
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashServices/liste" class="admin-link">Liste des services</a>
                </div>
            <?php endif; ?>

            <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                <a href="/DashRapport" class="admin-link">Ajout Rapport Animaux</a>
            </div>


            <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                <a href="/DashRapport/liste" class="admin-link">Liste rapport Animaux</a>
            </div>

            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'employé')): ?>
                <!-- Colonne 4 -->
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashValideAvis" class="admin-link">Avis à valider</a>
                </div>

                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/Contacts/afficheMessage" class="admin-link">Liste contact</a>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'employé')): ?>

                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashValideAvis/liste" class="admin-link">Liste des avis</a>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'admin')): ?>
                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashHoraires" class="admin-link">Ajout Horaire</a>
                </div>

                <div class="col-12 col-sm-6 col-md-3 admin-link-container">
                    <a href="/DashHoraires/liste" class="admin-link">Liste des horaires</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>