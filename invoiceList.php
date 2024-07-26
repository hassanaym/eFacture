<?php
require_once('Classes.php');

$f = new Facture();
if (isset($_POST["date"])) {
    $lst = $f->getByDate($_POST['date']);
} else {
    $lst = $f->getAll();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des factures</title>
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
                            <a class="nav-link active" aria-current="page" href="invoiceNewForm.php">Nouveau</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <section class="container">
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
                    <th scope="col">Montant total</th>
                    <th scope="col">Moyen de paiement</th>
                    <th scope="col">Commande</th>
                    <th scope="col">_</th>
                    <th scope="col">_</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lst as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->id_facture . "</td>";
                    echo "<td>" . $c->date . "</td>";
                    echo "<td>" . $c->statut_facture . "</td>";
                    echo "<td>" . $c->montant_total . "</td>";
                    echo "<td>" . $c->moyen_paiement . "</td>";
                    echo "<td>" . $c->id_commande . " " . $c->date_commande . "(" . $c->nom . ' ' . $c->prenom . ")" . "</td>";
                    echo "<td><a href=" . "invoiceDelete.php?id=" . $c->id_facture . "><i class='fas fa-folder-minus'></i></a></td>";
                    echo "<td><a href=" . "invoiceUpdateForm.php?id=" . $c->id_facture . "><i class='fas fa-edit'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>