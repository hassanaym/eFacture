<?php
require_once('Classes.php');
if (isset($_POST['save-order'])) {
    $commande = new Commande();
    $commande->setDate($_POST['date']);
    $commande->setStatut($_POST['statut']);
    $commande->setRemarques($_POST['remarques']);
    $commande->setMontant($_POST['montant']);
    $commande->setAdresseLivraison($_POST['adresse-livraison']);
    $commande->setClient($_POST['client']);
    $commande->save();
    header('Location: orderList.php');
}
