<?php
include('db.php');
$username = $_POST['username'];
$password = $_POST['pw'];
$email = $_POST['email'];
$shipping_address = $_POST['shipping_address'];

global $mysqli;
$sql = "INSERT INTO NEC_USER (USERNAME, PW, EMAIL, SHIPPING_ADDRESS) VALUES ( '$username', '$password', '$email', '$shipping_address')";
echo $sql;

$rc = $mysqli->query($sql);
if ($rc) {
    print "Create user succeded. ";
    header("Location: http://comp5232proj.mybluemix.net/login?state=regsuccess");
    die();
} else {
    print "Create user failed! ";
    header("Location: http://comp5232proj.mybluemix.net/registration?state=regerror");
    die();
}

?>