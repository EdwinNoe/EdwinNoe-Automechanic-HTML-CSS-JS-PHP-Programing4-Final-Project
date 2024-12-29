<?php
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ .'/../models/usuario.php';

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['inputEmail'];
    $contrasena = $_POST['inputPassword'];

    $usuarioModel = new Usuario($db);
    $usuarioModel->autenticar($email , $contrasena);
 }
?>