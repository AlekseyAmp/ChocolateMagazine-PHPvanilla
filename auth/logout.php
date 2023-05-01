<?php
session_start();

unset($_SESSION['number']);
unset($_SESSION['name']);

header("Location: /");
exit;
?>
