<?php
session_start();
function isUserConnected() {
    return isset($_SESSION['id']);
}