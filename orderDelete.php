<?php
require_once('Classes.php');

if (isset($_GET['id'])) {
    $commande = new Commande();
    $commande->setId($_GET['id']);
    $commande->delete();
    header('Location: orderList.php');
}
