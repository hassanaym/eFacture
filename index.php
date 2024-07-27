<?php
session_start();
if (isset($_SESSION['iduser'])) {
    header('location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">

    <title>eFacture</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="./images/auth-image.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="auth.php">
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Entrer votre nom d'utilisateur" value="<?php if (isset($_COOKIE['username'])) echo $_COOKIE['username']; ?>" />
                            <label class="form-label" for="form3Example3">Username</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Entrer le mot de passe" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>" />
                            <label class="form-label" for="form3Example4">Mot de passe</label>
                        </div>

                        <div class="erreur">
                            <?php
                            if (isset($_GET['err'])) {
                                if ($_GET['err'] == 1) {
                                    echo "Veuillez saisir un login correct.";
                                } else {
                                    echo "Le mot de passe ne correspond pas au login saisi.";
                                }
                            }
                            ?>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" id="form2Example3" value="1" checked name="rememberMe" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>

                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary ">
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2024. eFacture
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>