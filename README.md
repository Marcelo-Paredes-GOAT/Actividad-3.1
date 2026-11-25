# Actividad 3.1 - Ejercicios PHP

## Descripción
Proyecto académico compuesto por ocho ejercicios prácticos de PHP, con interfaces HTML sencillas y estilos compartidos.

## Tecnologías utilizadas
- PHP 8
- HTML5
- CSS3
- Git y GitHub

## Requisitos
- PHP 8 o superior
- Extensión mbstring habilitada (recomendada)
- Navegador web
- Git para la publicación

## Ejecución

### Servidor integrado de PHP
Desde la carpeta del proyecto:

```powershell
php -S localhost:8000
```

Abrir `http://localhost:8000/index.php` en el navegador.

### XAMPP
1. Copiar la carpeta del proyecto dentro de `htdocs`.
2. Iniciar Apache desde el panel de XAMPP.
3. Abrir `http://localhost/Actividad-3.1/index.php`.

## Ejercicios
1. **Arreglo de vocales:** cuenta vocales repetidas en un arreglo.
2. **Usuario y contraseña con rand():** genera un código de acceso aleatorio y valida un formulario.
3. **Calculadora:** realiza operaciones mediante funciones y variables globales.
4. **Validador de contraseñas:** verifica requisitos y genera el hash MD5 solicitado.
5. **Título de frase:** normaliza y convierte una oración a formato título.
6. **Contador de frase:** cuenta letras, vocales, consonantes y espacios.
7. **Dominios de correo:** extrae dominios y elimina repeticiones.
8. **Formulario POST:** limpia datos, valida correo educativo y muestra una confirmación.

> Nota: MD5 se utiliza únicamente por el requerimiento académico. No debe usarse para almacenar contraseñas reales; en sistemas reales se debe utilizar `password_hash()`.

## Repositorio
https://github.com/Marcelo-Paredes-GOAT/Actividad-3.1
