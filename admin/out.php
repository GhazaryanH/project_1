<?php
    session_start();
    unset($_SESSION['ad_in']);
    header('location: index.php');