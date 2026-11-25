<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Confirmación de registro</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Confirmación de registro</h1>
<?php
function esDominioEducativo($dominio) {
    $dominio = strtolower(trim($dominio));
    $sufijos = ['.edu', '.edu.pe', '.edu.ec', '.edu.co', '.edu.mx', '.edu.ar', '.edu.cl', '.edu.bo', '.edu.uy', '.edu.cr', '.edu.pa', '.ac.uk', '.ac.nz', '.ac.jp', '.ac.in', '.ac.za', '.ac.cr'];
    foreach ($sufijos as $sufijo) {
        if (substr($dominio, -strlen($sufijo)) === $sufijo) return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '<div class="resultado error">Acceso directo no permitido. Complete el formulario.</div>';
} else {
    $nombre = trim(preg_replace('/\s+/u', ' ', $_POST['nombre'] ?? ''));
    $nombre = mb_convert_case(mb_strtolower($nombre, 'UTF-8'), MB_CASE_TITLE, 'UTF-8');
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';
    $rol = $_POST['rol'] ?? '';
    $rolesPermitidos = ['Administrador', 'Docente', 'Estudiante'];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="resultado error">El correo electrónico no tiene un formato válido.</div>';
    } else {
        $partesCorreo = explode('@', $correo);
        $dominio = strtolower($partesCorreo[1]);
        if (!in_array($rol, $rolesPermitidos, true)) {
            echo '<div class="resultado error">El rol seleccionado no es válido.</div>';
        } elseif (!esDominioEducativo($dominio)) {
            echo '<div class="resultado error">El correo no pertenece a un dominio educativo reconocido.</div>';
        } else {
            echo '<div class="resultado exito"><strong>Registro exitoso</strong></div>';
            echo '<div class="resultado"><p><strong>Nombre completo:</strong> ' . htmlspecialchars($nombre) . '</p>';
            echo '<p><strong>Correo electrónico:</strong> ' . htmlspecialchars($correo) . '</p>';
            echo '<p><strong>Dominio:</strong> ' . htmlspecialchars($dominio) . '</p>';
            echo '<p><strong>Rol seleccionado:</strong> ' . htmlspecialchars($rol) . '</p></div>';
        }
    }
}
?>
<a class="volver" href="ejercicio08.html">← Volver al formulario</a><br><a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
