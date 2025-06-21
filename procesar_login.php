<?php
session_start();
require 'conexion.php'; // Asegúrate que este archivo existe

// 1. Validar método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = 'Método no permitido';
    header('Location: login.php');
    exit;
}

// 2. Obtener y limpiar datos del formulario
$usuario = trim($_POST['usuario'] ?? ''); // Cambia 'admin' por 'usuario'
$password = $_POST['password'] ?? '';     // Cambia 'ImperioPeru2025+' por 'password'

// 3. Validaciones básicas
if (empty($usuario) || empty($password)) {
    $_SESSION['error'] = 'Usuario y contraseña son obligatorios';
    header('Location: login.php');
    exit;
}

// Validación adicional de formato de usuario (opcional)
if (!preg_match('/^[a-zA-Z0-9_]+$/', $usuario)) {
    $_SESSION['error'] = 'El usuario solo puede contener letras, números y guiones bajos';
    header('Location: login.php');
    exit;
}

// 4. Consulta preparada para evitar SQL Injection
try {
    $sql = "SELECT id, usuario, password, nombre, rol 
            FROM Usuarios 
            WHERE usuario = ?";
    
    $params = array($usuario);
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        $errors = sqlsrv_errors();
        error_log("Error SQL: " . print_r($errors, true));
        throw new Exception("Error en la consulta a la base de datos");
    }
    
    // 5. Obtener resultados
    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    
    if (!$user) {
        $_SESSION['error'] = 'Usuario no encontrado';
        header('Location: login.php');
        exit;
    }

        // 6. Verificar contraseña
    if (password_verify($password, $user['password'])) {
        // 7. Crear sesión segura
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_role'] = $user['rol'];
        $_SESSION['last_login'] = time();
        
        // 8. Regenerar ID de sesión para evitar fixation
        session_regenerate_id(true);
        
        // 9. Redirección según rol
        if ($user['rol'] === 'admin') {
            header('Location: panel_rrhh.php');
        } else {
            header('Location: perfil.php');
        }
        exit;
    } else {
        $_SESSION['error'] = 'Contraseña incorrecta';
        header('Location: login.php');
        exit;
    }
    
} catch (Exception $e) {
    error_log("Error en login: " . $e->getMessage());
    $_SESSION['error'] = 'Error en el sistema. Intente más tarde.';
    header('Location: login.php');
    exit;
}
?>