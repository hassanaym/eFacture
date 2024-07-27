<?php
require_once 'session.php';
require_once('Classes.php');

$cl = new Client();
$lst = $cl->getAll();


$commande = new Commande();
$commande->setId($_GET['id']);

$cmd = $commande->getOne();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <title>Modifier une commande</title>
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
                            <a class="nav-link active" aria-current="page" href="orderList.php">Liste des commandes</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <form method="post" action="orderUpdate.php?id=<?php echo $_GET['id']; ?>" class="mt-5">
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="date" id="date" class="form-control" name="date" value=<?php echo $cmd->date; ?> />
                        <label class="form-label" for="form6Example1">Date</label>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <select name="client" id="client" class="form-control">
                            <option value="" selected disabled hidden>--Choisir un client--</option>
                            <?php
                            foreach ($lst as $c) {
                                if ($c->id == $cmd->id_client) {
                                    echo '<option value="' . $c->id . '" selected>' . $c->nom . ' ' . $c->prenom . '</option>';
                                } else {
                                    echo '<option value="' . $c->id . '">' . $c->nom . ' ' . $c->prenom . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <label class="form-label" for="form6Example2">Client</label>
                    </div>
                </div>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <select name="statut" id="statut" class="form-control">
                    <option value="" selected disabled hidden>--Choisir un statut--</option>
                    <option value="En attente" <?php if ($cmd->statut == "En attente") echo "selected"; ?>>En attente</option>
                    <option value="Livré" <?php if ($cmd->statut == "Livré") echo "selected"; ?>>Livré</option>
                    <option value="Facturé" <?php if ($cmd->statut == "Facturé") echo "selected"; ?>>Facturé</option>
                    <option value="Réglé" <?php if ($cmd->statut == "Réglé") echo "selected"; ?>>Réglé</option>
                </select>
                <label class="form-label" for="form6Example3">Statut</label>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form6Example4" class="form-control" name="remarques" value=<?php echo $cmd->remarques ?> />
                <label class="form-label" for="form6Example4">Remarques</label>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" id="form6Example5" class="form-control" name="montant" value=<?php echo $cmd->montant ?> />
                <label class="form-label" for="form6Example5">Montant</label>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form6Example5" class="form-control" name="adresse-livraison" value=<?php echo $cmd->adresse_livraison ?> />
                <label class="form-label" for="form6Example5">Adresse de livraison</label>
            </div>


            <!-- Submit button -->
            <input type="submit" data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4" name="update-order" value="Sauvegarder" />
        </form>
    </div>
</body>

</html>