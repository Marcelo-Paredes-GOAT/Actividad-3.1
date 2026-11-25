<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 04</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 04: Validador de contraseñas y MD5</h1>
<?php
$resultado = '';
$tipo = '';
$faltantes = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    if (mb_strlen($password) < 8) $faltantes[] = 'Mínimo 8 caracteres';
    if (!preg_match('/[A-ZÁÉÍÓÚÑ]/u', $password)) $faltantes[] = 'Al menos una letra mayúscula';
    if (!preg_match('/[a-záéíóúñ]/u', $password)) $faltantes[] = 'Al menos una letra minúscula';
    if (!preg_match('/[0-9]/', $password)) $faltantes[] = 'Al menos un número';
    if (!preg_match('/[^A-Za-z0-9ÁÉÍÓÚáéíóúÑñ\s]/u', $password)) $faltantes[] = 'Al menos un carácter especial';
    if (empty($faltantes)) {
        $resultado = 'Contraseña válida.';
        $tipo = 'exito';
        $hash = md5($password);
    } else {
        $tipo = 'error';
    }
}
?>
<form class="formulario" method="post">
    <label for="password">Contraseña</label><input id="password" name="password" type="password" required>
    <button type="submit">Validar contraseña</button>
</form>
<?php if ($resultado): ?><div class="resultado <?= $tipo ?>"><?= htmlspecialchars($resultado) ?><br><strong>Hash MD5:</strong> <?= htmlspecialchars($hash) ?><br><small>MD5 se usa únicamente con fines académicos. Para contraseñas reales utilice password_hash().</small></div><?php endif; ?>
<?php if (!empty($faltantes)): ?><div class="resultado error"><strong>Requisitos faltantes:</strong><ul><?php foreach ($faltantes as $falta): ?><li><?= htmlspecialchars($falta) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
