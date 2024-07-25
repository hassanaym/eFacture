<?php
require_once('Classes.php');

if (isset($_GET['id'])) {
    $cl = new Client();
    $cl->setId($_GET['id']);
    $cl->delete();
    header('Location: clientList.php');
}
