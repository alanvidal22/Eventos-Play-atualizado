<?php
session_start();
require_once 'database.php';
// Destruir sessão do usuário
session_destroy();
header('Location: menu.php');
exit;
