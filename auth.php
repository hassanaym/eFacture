
<?php
require_once('dbaccess.php');

if ($_POST['rememberMe'] == "1") {
    setcookie('username', $_POST['username'], time() + 60);
    setcookie('password', $_POST['password'], time() + 60);
}

if (isset($_POST['username']) &&  isset($_POST['password'])) {
    $dba = new Dbaccess();
    $dba->query("Select * from user where username='" . $_POST['username'] . "'");
    $user = $dba->single();

    if ($user->username != "") {
        if ($user->password != $_POST['password']) {
            header('location:index.php?err=2');
        } else {
            session_start();
            $_SESSION['username'] = $user->username;
            $_SESSION['firstname'] = $user->firstname;
            $_SESSION['lastname'] = $user->lastname;
            $_SESSION['iduser'] = $user->id;
            header('location:home.php');
        }
    } else {
        header('location:index.php?err=1');
    }



    $conn = null;
}
?>