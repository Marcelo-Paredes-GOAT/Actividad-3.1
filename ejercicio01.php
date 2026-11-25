<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 01</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 01: Arreglo de vocales</h1>
<?php
$arreglo = ['a', 'a', 'e', 'e', 'e', 'a', 'i', 'o', 'e', 'u'];
$conteo = array_count_values($arreglo);
$repetidas = [];
foreach ($conteo as $vocal => $cantidad) {
    if ($cantidad > 1) {
        $repetidas[$vocal] = $cantidad;
    }
}
?>
<div class="resultado">
    <p><strong>Arreglo original:</strong> [<?= htmlspecialchars(implode("', '", $arreglo)) ?>]</p>
    <p><strong>Vocales que se repiten:</strong></p>
    <ul>
    <?php if (empty($repetidas)): ?>
        <li>No hay vocales repetidas.</li>
    <?php else: foreach ($repetidas as $vocal => $cantidad): ?>
        <li><strong><?= htmlspecialchars($vocal) ?></strong>: <?= $cantidad ?> apariciones</li>
    <?php endforeach; endif; ?>
    </ul>
    <p><strong>Número total de vocales diferentes repetidas:</strong> <?= count($repetidas) ?></p>
</div>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
