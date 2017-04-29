<?php
session_start();
unset($_SESSION['log_in']);
header('location: ../');
