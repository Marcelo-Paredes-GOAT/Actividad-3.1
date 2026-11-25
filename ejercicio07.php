<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 07</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 07: Extraer dominios de correos</h1>
<?php
$correos = ['marcelo@universidad.edu.pe', 'ana@gmail.com', 'lucia@universidad.edu.pe', 'carlos@colegio.edu.ec', 'pedro@empresa.com'];
$dominios = [];
foreach ($correos as $correo) {
    $partes = explode('@', $correo);
    if (count($partes) === 2) $dominios[] = strtolower($partes[1]);
}
$dominiosUnicos = array_values(array_unique($dominios));
?>
<div class="resultado"><p><strong>Correos originales:</strong></p><ul><?php foreach ($correos as $correo): ?><li><?= htmlspecialchars($correo) ?></li><?php endforeach; ?></ul></div>
<div class="resultado"><p><strong>Dominios sin repeticiones:</strong></p><ul><?php foreach ($dominiosUnicos as $dominio): ?><li><?= htmlspecialchars($dominio) ?></li><?php endforeach; ?></ul></div>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
