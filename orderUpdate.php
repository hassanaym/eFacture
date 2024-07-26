<?php
require_once('Classes.php');
if (isset($_POST['update-order'])) {
    $commande = new Commande();
    $commande->setId($_GET['id']);
    $commande->setDate($_POST['date']);
    $commande->setStatut($_POST['statut']);
    $commande->setRemarques($_POST['remarques']);
    $commande->setClient($_POST['client']);
    $commande->setMontant($_POST['montant']);
    $commande->setAdresseLivraison($_POST['adresse-livraison']);
    $commande->update();
    header('Location: orderList.php');
}
