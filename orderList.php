<?php
require_once 'session.php';
require_once('Classes.php');

$cmd = new Commande();
if (isset($_POST["date"])) {
    $lst = $cmd->getByDate($_POST['date']);
} else {
    $lst = $cmd->getAll();
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
    <title>Liste des commandes</title>
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
                            <a class="nav-link active" aria-current="page" href="orderNewForm.php">Nouveau</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <section class="container">
        <h2 class="text-center mt-3">Liste des commandes</h2>
        <form action="orderList.php" method="post">
            <div class="input-group mt-4 ">
                <input type="date" class="form-control rounded" placeholder="Date" aria-label="Search" aria-describedby="search-addon" name="date" />
                <button type="submit" class="btn btn-outline-primary">Chercher</button>
            </div>
        </form>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Remarques</th>
                    <th scope="col">Montant</th>
                    <th scope="col">Adresse de livraison</th>
                    <th scope="col">Client</th>
                    <th scope="col">_</th>
                    <th scope="col">_</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lst as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->id_commande . "</td>";
                    echo "<td>" . $c->date . "</td>";
                    echo "<td>" . $c->statut . "</td>";
                    echo "<td>" . $c->remarques . "</td>";
                    echo "<td>" . $c->montant . "</td>";
                    echo "<td>" . $c->adresse_livraison . "</td>";
                    echo "<td>" . $c->nom . " " . $c->prenom . "(" . $c->id_client . ")" . "</td>";
                    echo "<td><a href=" . "orderDelete.php?id=" . $c->id_commande . "><i class='fas fa-folder-minus'></i></a></td>";
                    echo "<td><a href=" . "orderUpdateForm.php?id=" . $c->id_commande . "><i class='fas fa-edit'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>