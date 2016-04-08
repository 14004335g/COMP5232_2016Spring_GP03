<?php
include('db.php');
$username = $_COOKIE["username"];
$itemId = $_POST["itemid"];
$quantity = $_POST["quantity"];
$remark = $_POST["remark"];

global $mysqli;
$sql = "SELECT * FROM STOCK where ID = '$itemId'";
echo $sql;

$rc = $mysqli->query($sql);
if ($rc) {
    $itemObject = $rc->fetch_object();
    if ($itemObject->QUAN < $quantity) {
        header("Location: http://comp5232proj.mybluemix.net/desc?id=$itemId?state=quanfail");
        die();
    } else {
        // make an order
        $remainQUAN = $itemObject->QUAN - $quantity;
        $sql = "UPDATE STOCK SET QUAN='$remainQUAN' WHERE ID = '$itemId' ";
        $rc = $mysqli->query($sql);

        $sql = "INSERT INTO NEC_ORDER(USERNAME, STOCK_ID, QUANTITY, REMARK) VALUES ('$username', $itemId, $quantity, '$remark')";

        echo $sql;

        $rc2 = $mysqli->query($sql);

        if ($rc2) {
            header("Location: http://comp5232proj.mybluemix.net/?state=ordersuccess");
            die();
        }
    }

//    $username = $row->USERNAME;
//    if ($username == "") {
//        header("Location: http://comp5232proj.mybluemix.net/login?state=loginfail");
//        die();
//    } else {
//        setcookie("username", $username, time() + 3600);
//        header("Location: http://comp5232proj.mybluemix.net/");
//    }
//    echo $username;
//    print "Create user succeded. ";
} else {
    header("Location: http://comp5232proj.mybluemix.net/login?state=loginfail");
    die();
}

?>