<?php
include("config.php");
if (!isUserConnected()){
    header('Location: login.php');
}
?>

<?php
include "xmonth.php";
template(79.99);
subscribe(2);
?>