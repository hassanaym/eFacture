<?php
require_once('Classes.php');
if (isset($_POST['save-client'])) {
    $client = new Client();
    $client->setNom($_POST['nom']);
    $client->setPrenom($_POST['prenom']);
    $client->setAdresse($_POST['adresse']);
    $client->setTel($_POST['tel']);
    $client->setEmail($_POST['email']);
    $client->save();
    header('Location: clientList.php');
}
