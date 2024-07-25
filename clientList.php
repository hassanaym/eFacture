<?php
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
                            <a class="nav-link active" aria-current="page" href="clientNewForm.php">Nouveau</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <section class="container">
        <form action="clientList.php" method="post">
            <div class="input-group mt-4 ">
                <input type="search" class="form-control rounded" placeholder="Nom" aria-label="Search" aria-describedby="search-addon" name="name" />
                <button type="submit" class="btn btn-outline-primary">Chercher</button>
            </div>
        </form>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Tél</th>
                    <th scope="col">Email</th>
                    <th scope="col">_</th>
                    <th scope="col">_</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lst as $c) {
                    echo "<tr>";
                    echo "<td>" . $c->id . "</td>";
                    echo "<td>" . $c->nom . "</td>";
                    echo "<td>" . $c->prenom . "</td>";
                    echo "<td>" . $c->adresse . "</td>";
                    echo "<td>" . $c->tel . "</td>";
                    echo "<td>" . $c->email . "</td>";
                    echo "<td><a href=" . "clientDelete.php?id=" . $c->id . "><i class='fas fa-folder-minus'></i></a></td>";
                    echo "<td><a href=" . "clientUpdateForm.php?id=" . $c->id . "><i class='fas fa-edit'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>