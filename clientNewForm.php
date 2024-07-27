<?php
require_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">

    <title>Nouveau client</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">eFacture</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="clientList.php">Liste des clients</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <form method="post" action="./clientSave.php" class="mt-5">
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="nom" class="form-control" name="nom" />
                        <label class="form-label" for="form6Example1">Nom</label>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form6Example2" class="form-control" name="prenom" />
                        <label class="form-label" for="form6Example2">Prénom</label>
                    </div>
                </div>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form6Example3" class="form-control" name="adresse" />
                <label class="form-label" for="form6Example3">Adresse</label>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form6Example4" class="form-control" name="tel" />
                <label class="form-label" for="form6Example4">Tél</label>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="form6Example5" class="form-control" name="email" />
                <label class="form-label" for="form6Example5">Email</label>
            </div>


            <!-- Submit button -->
            <input type="submit" data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4" name="save-client" value="Sauvegarder" />
        </form>
    </div>
</body>

</html>