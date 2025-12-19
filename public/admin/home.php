<?php
session_start();

echo "welcome " .htmlspecialchars($_SESSION['username']);

?>
