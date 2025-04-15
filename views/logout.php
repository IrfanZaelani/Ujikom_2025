<?php
session_start(); // Mulai session
session_destroy(); // Hancurkan session
header("Location: ../index.php"); // Arahkan ke halaman login
exit();
?>
