<?php

class Usuario {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function autenticar($email, $contrasena) {
        $sql = 'SELECT * FROM usuarios WHERE email = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = $result->fetch_assoc();
        $stmt->close();

        if ($datos) {
            if ($contrasena==$datos['clave']) {
                session_start();
                $_SESSION['user_id'] = $datos['id'];
                $_SESSION['nombre'] = $datos['nombre'];
                $_SESSION['roll'] = $datos['roll'];
                if($datos['roll']==1){
                    header("Location: /pages/dashboardadmin.php ");
                }else{
                    header("Location: /pages/dashboardusuario.php ");
                }
                
                exit;
            } else {
                session_start();
                $_SESSION['MensajeError'] = "Error , verifique contraseña";
                header("Location: /pages/login.php");
                exit;
            }
        } else {
            session_start();
            $_SESSION['MensajeError'] = "Error , verifique usuario";
            header("Location: /pages/login.php");
            exit;
        }
    }

    public function crearUsuario($usuario, $correo, $nombreCompleto, $contrasena, $edad, $telefono) {
        if (!empty($usuario) && !empty($correo) && !empty($nombreCompleto) && !empty($contrasena) && !empty($edad) && !empty($telefono)) {
            $sql = 'INSERT INTO usuarios (username, roll, nombre, edad, email, clave, fecha_creacion, numero_telefono)
                    VALUES (?, false, ?, ?, ?, ?, NOW(), ?)';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ssisss', $usuario, $nombreCompleto, $edad, $correo, $contrasena, $telefono);

            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                throw new Exception('Error al ejecutar la consulta SQL.');
            }
        } else {
            throw new Exception('Error: Todos los campos son obligatorios.');
        }
    }

    
    public function obtenerrUsuario($usuario = null) {
        if ($usuario !== null) {
            // Obtener un usuario específico
            $sql = 'SELECT * FROM usuarios WHERE username = ?';
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('s', $usuario);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $usuarioData = $result->fetch_assoc(); 
                $stmt->close();
                return $usuarioData;
            } else {
                $stmt->close();
                throw new Exception('Error: Usuario no encontrado.');
            }
        } else {
            // Obtener todos los usuarios
            $sql = 'SELECT * FROM usuarios';
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $usuarios = [];
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row; 
            }
    
            $stmt->close();
            return $usuarios; 
        }
    }
    
}