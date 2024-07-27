<?php
require_once 'session.php';
require_once('Classes.php');

$cmd = new Commande();
$lst = $cmd->getAll();

$f = new Facture();
$f->setId($_GET['id']);
$f = $f->getOne();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">

    <title>Modifier une facture</title>
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
                            <a class="nav-link active" aria-current="page" href="invoiceList.php">Liste des factures</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <form method="post" action="invoiceSave.php" class="mt-5">
            <div class="row mb-4">
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="date" id="date" class="form-control" name="date" value=<?php echo $f->date; ?> />
                        <label class="form-label" for="form6Example1">Date</label>
                    </div>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <select name="commande" id="commande" class="form-control">
                            <option value="" selected disabled hidden>--Choisir un commande--</option>
                            <?php
                            foreach ($lst as $c) {
                                if ($c->id_commande == $f->id_commande) {
                                    echo '<option value="' . $c->id_commande . '" selected>' . $c->id_commande . ' (' . $c->prenom . ' ' . $c->nom . ') ' . '</option>';
                                } else {
                                    echo '<option value="' . $c->id_commande . '">' . $c->id_commande . ' (' . $c->prenom . ' ' . $c->nom . ') ' . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <label class="form-label" for="form6Example2">Commande</label>
                    </div>
                </div>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <select name="statut" id="statut" class="form-control">
                    <option value="">--Choisir un statut--</option>
                    <option value="Edité" <?php if ($f->statut == "Edité") echo "selected"; ?>>Edité</option>
                    <option value="Non réglé" <?php if ($f->statut == "Non réglé") echo "selected"; ?>>Non réglé</option>
                    <option value="Réglé" <?php if ($f->statut == "Réglé") echo "selected"; ?>>Réglé</option>
                </select>
                <label class="form-label" for="form6Example3">Statut</label>
            </div>

            <!-- Text input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="number" id="form6Example4" class="form-control" name="montant-total" value=<?php echo $f->montant_total; ?> />
                <label class="form-label" for="form6Example4">Montant total</label>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <select name="moyen-paiement" id="moyen-paiement" class="form-control">
                    <option value="">--Choisir un moyen de paiement--</option>
                    <option value="Chèque" <?php if ($f->moyen_paiement == "Chèque") echo "selected"; ?>>Chèque</option>
                    <option value="Virement" <?php if ($f->moyen_paiement == "Virement") echo "selected"; ?>>Virement</option>
                    <option value="Espèce" <?php if ($f->moyen_paiement == "Espèce") echo "selected"; ?>>Espèce</option>
                </select>
                <label class="form-label" for="form6Example3">Moyen de paiement</label>
            </div>




            <!-- Submit button -->
            <input type="submit" data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4" name="save-invoice" value="Sauvegarder" />
        </form>
    </div>
</body>

</html>