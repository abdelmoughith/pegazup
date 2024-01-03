<?php
include("config.php");
require_once "CardController.php";
require_once "Card.php";

if (!isUserConnected()){
    header('Location: login.php');
}
?>

<?php
include "xmonth.php";
template(19.99);
subscribe(1);

?>
