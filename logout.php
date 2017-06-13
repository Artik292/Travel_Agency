<?php

/* logout user and send him to first page */
session_start();
unset($_SESSION['try_admin']);
header('Location: index.php');
