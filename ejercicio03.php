<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 03</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 03: Calculadora con funciones</h1>
<?php
$numero1 = isset($_POST['numero1']) ? (float) $_POST['numero1'] : null;
$numero2 = isset($_POST['numero2']) ? (float) $_POST['numero2'] : null;
$operacion = $_POST['operacion'] ?? '';
$ultimoMensaje = '';

function sumar() { global $numero1, $numero2; return $numero1 + $numero2; }
function restar() { global $numero1, $numero2; return $numero1 - $numero2; }
function multiplicar() { global $numero1, $numero2; return $numero1 * $numero2; }
function dividir() { global $numero1, $numero2; return $numero2 == 0 ? null : $numero1 / $numero2; }
function calcularModulo() { global $numero1, $numero2; return $numero2 == 0 ? null : fmod($numero1, $numero2); }
function sumaCuadrados() { global $numero1, $numero2; return pow($numero1, 2) + pow($numero2, 2); }
function sumaCubos() { global $numero1, $numero2; return pow($numero1, 3) + pow($numero2, 3); }
function calcularRaiz() { global $numero1; return $numero1 < 0 ? null : sqrt($numero1); }
function calcularPotencia() { global $numero1, $numero2; return pow($numero1, $numero2); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($numero1 === null || $numero2 === null) {
        $ultimoMensaje = 'Ingrese ambos números.';
    } elseif ($operacion === 'suma') { $resultado = sumar(); }
    elseif ($operacion === 'resta') { $resultado = restar(); }
    elseif ($operacion === 'multiplicacion') { $resultado = multiplicar(); }
    elseif ($operacion === 'division') { $resultado = dividir(); if ($resultado === null) $ultimoMensaje = 'No se puede dividir entre cero.'; }
    elseif ($operacion === 'modulo') { $resultado = calcularModulo(); if ($resultado === null) $ultimoMensaje = 'El módulo no admite divisor cero.'; }
    elseif ($operacion === 'cuadrados') { $resultado = sumaCuadrados(); }
    elseif ($operacion === 'cubos') { $resultado = sumaCubos(); }
    elseif ($operacion === 'raiz') { $resultado = calcularRaiz(); if ($resultado === null) $ultimoMensaje = 'No existe una raíz cuadrada real de un número negativo.'; }
    elseif ($operacion === 'potencia') { $resultado = calcularPotencia(); }
}
?>
<form class="formulario" method="post">
    <label for="numero1">Primer número</label><input id="numero1" name="numero1" type="number" step="any" value="<?= isset($_POST['numero1']) ? htmlspecialchars($_POST['numero1']) : '' ?>" required>
    <label for="numero2">Segundo número (también usado como exponente)</label><input id="numero2" name="numero2" type="number" step="any" value="<?= isset($_POST['numero2']) ? htmlspecialchars($_POST['numero2']) : '' ?>" required>
    <label for="operacion">Operación</label><select id="operacion" name="operacion">
        <option value="suma">Suma</option><option value="resta">Resta</option><option value="multiplicacion">Multiplicación</option>
        <option value="division">División</option><option value="modulo">Módulo</option><option value="cuadrados">Suma de cuadrados</option>
        <option value="cubos">Suma de cubos</option><option value="raiz">Raíz cuadrada del primer número</option><option value="potencia">Potencia</option>
    </select>
    <button type="submit">Calcular</button>
</form>
<?php if (isset($resultado)): ?><div class="resultado"><strong>Resultado:</strong> <?= htmlspecialchars((string) $resultado) ?></div><?php endif; ?>
<?php if ($ultimoMensaje): ?><div class="resultado error"><?= htmlspecialchars($ultimoMensaje) ?></div><?php endif; ?>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
