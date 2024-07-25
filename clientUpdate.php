<?php
require_once('Classes.php');
if (isset($_POST['update-client'])) {
    $client = new Client();
    $client->setId($_GET['id']);
    $client->setNom($_POST['nom']);
    $client->setPrenom($_POST['prenom']);
    $client->setAdresse($_POST['adresse']);
    $client->setTel($_POST['tel']);
    $client->setEmail($_POST['email']);
    $client->update();
    header('Location: clientList.php');
}
