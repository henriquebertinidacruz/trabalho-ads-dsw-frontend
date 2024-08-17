<?php

if (!isset($_SESSION)) {
    session_start();

    if (!isset($_SESSION['username'])) header("location:" . '/trabalho-ads-dsw-frontend/views/Login.php');
}
