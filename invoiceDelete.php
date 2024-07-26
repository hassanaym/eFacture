<?php
require_once('Classes.php');

if (isset($_GET['id'])) {
    $facture = new Facture();
    $facture->setId($_GET['id']);
    $facture->delete();
    header('Location: invoiceList.php');
}
