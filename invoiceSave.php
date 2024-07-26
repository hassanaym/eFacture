<?php
require_once('Classes.php');
if (isset($_POST['save-invoice'])) {
    $facture = new Facture();
    $facture->setDate($_POST['date']);
    $facture->setStatut($_POST['statut']);
    $facture->setMoyenPaiement($_POST['moyen-paiement']);
    $facture->setMontantTotal($_POST['montant-total']);
    $facture->setCommande($_POST['commande']);
    $facture->save();
    header('Location: invoiceList.php');
}
