<?php
include('db.php');
$username = $_POST['username'];
$password = $_POST['pw'];

global $mysqli;
$sql = "SELECT * FROM NEC_USER where username = '$username' AND PW = '$password'";
echo $sql;

$rc = $mysqli->query($sql);
if ($rc) {
    $row = $rc->fetch_object();
    $username = $row->USERNAME;
    if ($username == "") {
        header("Location: http://comp5232proj.mybluemix.net/login?state=loginfail");
        die();
    } else {
        setcookie("username", $username, time() + 3600);
        header("Location: http://comp5232proj.mybluemix.net/");
    }
    echo $username;
    print "Create user succeded. ";
} else {
    header("Location: http://comp5232proj.mybluemix.net/login?state=loginfail");
    die();
}

?>