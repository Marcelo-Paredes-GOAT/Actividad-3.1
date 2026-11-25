<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 05</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 05: Conversor de frases a título</h1>
<?php
function convertirATitulo($oracion) {
    $oracion = trim(preg_replace('/\s+/u', ' ', $oracion));
    $oracion = mb_strtolower($oracion, 'UTF-8');
    return mb_convert_case($oracion, MB_CASE_TITLE, 'UTF-8');
}
$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = convertirATitulo($_POST['frase'] ?? '');
}
?>
<form class="formulario" method="post">
    <label for="frase">Oración</label><input id="frase" name="frase" value="<?= isset($_POST['frase']) ? htmlspecialchars($_POST['frase']) : '' ?>" required>
    <button type="submit">Convertir</button>
</form>
<?php if ($resultado !== ''): ?><div class="resultado"><strong>Resultado:</strong> <?= htmlspecialchars($resultado) ?></div><?php endif; ?>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
