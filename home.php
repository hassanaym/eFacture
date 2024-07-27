<?php
require_once 'session.php';
require_once('Classes.php');

$cl = new Client();
if (isset($_POST["name"])) {
    $lst = $cl->getByName($_POST['name']);
} else {
    $lst = $cl->getAll();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <title>Liste des clients</title>
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
                            <a class="nav-link" aria-current="page" href="clientList.php">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="orderList.php">Commandes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="invoiceList.php">Factures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="settings.php">Paramètres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="users.php">Utilisateurs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="logout.php">logout</a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>
    </header>


</body>

</html>