<?php
echo '<link rel="stylesheet" href="/Asset/css/pageConnexion.css">';
?>

<div class="vh-100 w-100 d-flex align-items-center justify-content-center first" id="mainBgn">
    <div class="formContainer">
        <div class="vide"></div>
        <form action="/connexionUser/connexion" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <div>
                <span class="inputLogo"><i class="fas fa-lock"></i></span>
                <input type="text" class="form-control rounded-pill" name="email" placeholder="example@email.com" required>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="my-2">
                <span class="inputLogo"><i class="fas fa-key"></i></span>
                <input type="password" class="form-control rounded-pill" name="pass" placeholder="password" required>
            </div>
            <button class="btn btn-accent rounded-pill w-100" type="submit">Login</button>
        </form>
    </div>
</div>