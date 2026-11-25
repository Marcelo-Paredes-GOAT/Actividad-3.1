<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 06</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 06: Contador de letras, vocales y espacios</h1>
<?php
function analizarFrase($frase) {
    $espacios = preg_match_all('/\s/u', $frase, $coincidencias);
    $letras = 0;
    $vocales = 0;
    $consonantes = 0;
    preg_match_all('/[[:alpha:]]/u', mb_strtolower($frase, 'UTF-8'), $todasLasLetras);
    foreach ($todasLasLetras[0] as $letra) {
        $letras++;
        if (mb_stripos('áéíóúàèìòùäëïöüaeiou', $letra, 0, 'UTF-8') !== false) $vocales++;
        else $consonantes++;
    }
    return ['letras' => $letras, 'vocales' => $vocales, 'consonantes' => $consonantes, 'espacios' => $espacios];
}
$analisis = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') $analisis = analizarFrase($_POST['frase'] ?? '');
?>
<form class="formulario" method="post">
    <label for="frase">Frase</label><input id="frase" name="frase" value="<?= isset($_POST['frase']) ? htmlspecialchars($_POST['frase']) : '' ?>" required>
    <button type="submit">Analizar</button>
</form>
<?php if ($analisis): ?><div class="resultado"><table><tr><th>Característica</th><th>Cantidad</th></tr>
<tr><td>Total de letras</td><td><?= $analisis['letras'] ?></td></tr><tr><td>Vocales</td><td><?= $analisis['vocales'] ?></td></tr>
<tr><td>Consonantes</td><td><?= $analisis['consonantes'] ?></td></tr><tr><td>Espacios</td><td><?= $analisis['espacios'] ?></td></tr></table></div><?php endif; ?>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
