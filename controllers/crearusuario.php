<?php

    require_once __DIR__ . '/../database/database.php';
    require __DIR__ . '/../models/usuario.php';

    session_start(); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $nombreCompleto = $_POST['nombreCompleto'];
        $contrasena = $_POST['contrasena'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];

        try {
            $usuarioModel = new Usuario($db);

            $usuarioModel->crearUsuario($usuario, $correo, $nombreCompleto, $contrasena, $edad, $telefono);

            $_SESSION['Mensaje'] = 'Usuario creado exitosamente!';
            header("Location: /pages/login.php");
            exit;
        } catch (Exception $e) {
            echo $e->getMessage(); 
        }
    }
    //con PDO

//     require __DIR__ . '/../database/database.php';
//     $pdo = new Conexion();
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $usuario = $_POST['usuario'];
//         $correo = $_POST['correo'];
//         $nombreCompleto = $_POST['nombreCompleto'];
//         $contrasena = $_POST['contrasena'];
//         $edad = $_POST['edad'];
//         $telefono = $_POST['telefono'];

//         // Validar que todos los campos estén completos
//         if (!empty($usuario) && !empty($correo) && !empty($nombreCompleto) && !empty($contrasena) && !empty($edad) && !empty($telefono)) {
            
//             // Preparar la consulta SQL con placeholders
//             $sql = 'INSERT INTO usuarios (username, nombre, edad, email, clave, fecha_creacion, numero_telefono)
//                     VALUES (:usuario, :nombreCompleto, :edad, :correo, :contrasena, NOW(), :telefono)';
            
//             // Preparar la consulta
//             $stmt = $pdo->prepare($sql);
            
//             // Bind de los parámetros usando el nombre de los placeholders
//             $stmt->bindParam(':usuario', $usuario);
//             $stmt->bindParam(':nombreCompleto', $nombreCompleto);
//             $stmt->bindParam(':edad', $edad);
//             $stmt->bindParam(':correo', $correo);
//             $stmt->bindParam(':contrasena', $contrasena);
//             $stmt->bindParam(':telefono', $telefono);
            
//             $stmt->execute();

//             echo "usuario creado";
//         }
//     }
// ?>

<!-- documentacion 
https://www.php.net/manual/es/mysqli-stmt.bind-param.php -->





