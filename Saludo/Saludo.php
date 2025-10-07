<?php

// Interfaz para saludos
interface Saludable {
    public function saludar();
    public function despedir();
    public function getNombreIdioma();
}

// Clase abstracta para idiomas
abstract class Idioma implements Saludable {
    protected $nombreUsuario;
    
    public function __construct($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }
    
    // Método concreto compartido
    public function presentacion() {
        echo "Idioma seleccionado: " . $this->getNombreIdioma() . "\n";
    }
    
    public function setNombreUsuario($nombre) {
        $this->nombreUsuario = $nombre;
    }
    
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
}

// Clase para español
class Espanol extends Idioma {
    
    public function saludar() {
        echo "¡Hola, {$this->nombreUsuario}! ¿Cómo estás?\n";
    }
    
    public function despedir() {
        echo "¡Adiós, {$this->nombreUsuario}! Que tengas un buen día.\n";
    }
    
    public function getNombreIdioma() {
        return "Español";
    }
    
    public function saludoFormal() {
        echo "Buenos días, Sr./Sra. {$this->nombreUsuario}.\n";
    }
    
    public function preguntarEstado() {
        echo "¿Cómo te encuentras hoy, {$this->nombreUsuario}?\n";
    }
}

// Clase para inglés
class Ingles extends Idioma {
    
    public function saludar() {
        echo "Hello, {$this->nombreUsuario}! How are you?\n";
    }
    
    public function despedir() {
        echo "Goodbye, {$this->nombreUsuario}! Have a nice day.\n";
    }
    
    public function getNombreIdioma() {
        return "English";
    }
    
    public function saludoFormal() {
        echo "Good morning, Mr./Ms. {$this->nombreUsuario}.\n";
    }
    
    public function preguntarEstado() {
        echo "How are you feeling today, {$this->nombreUsuario}?\n";
    }
}

// Clase para francés (extra)
class Frances extends Idioma {
    
    public function saludar() {
        echo "Bonjour, {$this->nombreUsuario}! Comment allez-vous?\n";
    }
    
    public function despedir() {
        echo "Au revoir, {$this->nombreUsuario}! Bonne journée.\n";
    }
    
    public function getNombreIdioma() {
        return "Français";
    }
    
    public function saludoFormal() {
        echo "Bonjour, Monsieur/Madame {$this->nombreUsuario}.\n";
    }
}

// Función para detectar idioma preferido del navegador
function detectarIdioma() {
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        return $lang;
    }
    return 'es';
}

// Programa principal
echo "=== SISTEMA DE SALUDOS MULTI-IDIOMA ===\n\n";

// Simulación con nombre predefinido (en producción vendría de formulario)
$nombre = "Juan";
echo "Usuario: $nombre\n\n";

echo "Selecciona un idioma:\n";
echo "1. Español\n";
echo "2. English\n";
echo "3. Français\n";
echo "Opción seleccionada: ";

// Simulación de selección (en CLI usar readline, en web usar $_POST)
$opcion = 1; // Cambiar este valor para probar: 1, 2 o 3

$idioma = null;

switch($opcion) {
    case 1:
        $idioma = new Espanol($nombre);
        break;
    case 2:
        $idioma = new Ingles($nombre);
        break;
    case 3:
        $idioma = new Frances($nombre);
        break;
    default:
        echo "Opción inválida. Usando español por defecto.\n";
        $idioma = new Espanol($nombre);
}

echo "$opcion\n\n";
echo str_repeat("=", 40) . "\n";
$idioma->presentacion();
echo str_repeat("=", 40) . "\n";
$idioma->saludar();

// Saludo formal si es español o inglés
if ($idioma instanceof Espanol) {
    $idioma->saludoFormal();
    $idioma->preguntarEstado();
} elseif ($idioma instanceof Ingles) {
    $idioma->saludoFormal();
    $idioma->preguntarEstado();
} elseif ($idioma instanceof Frances) {
    $idioma->saludoFormal();
}

echo "\n";
$idioma->despedir();

// Demostración de polimorfismo
echo "\n=== DEMOSTRACIÓN DE POLIMORFISMO ===\n";
$idiomas = [
    new Espanol($nombre),
    new Ingles($nombre),
    new Frances($nombre)
];

foreach ($idiomas as $i) {
    echo "\n--- " . $i->getNombreIdioma() . " ---\n";
    $i->saludar();
    $i->despedir();
}

echo "\n=== CAMBIO DE USUARIO ===\n";
$idioma->setNombreUsuario("María");
echo "Nuevo usuario: " . $idioma->getNombreUsuario() . "\n";
$idioma->saludar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema de Saludos Multi-Idioma</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🌍 Sistema de Saludos Multi-Idioma</h1>

<div class="contenedor">
<div class="tarjeta">
<?php
$nombre = "Juan";
$opcion = 1; // 1=Español, 2=Inglés, 3=Francés
switch ($opcion) {
    case 1: $idioma = new Espanol($nombre); break;
    case 2: $idioma = new Ingles($nombre); break;
    case 3: $idioma = new Frances($nombre); break;
    default: $idioma = new Espanol($nombre);
}

$idioma->presentacion();
$idioma->saludar();

if ($idioma instanceof Espanol || $idioma instanceof Ingles) {
    $idioma->saludoFormal();
    $idioma->preguntarEstado();
} elseif ($idioma instanceof Frances) {
    $idioma->saludoFormal();
}

$idioma->despedir();

echo "<hr><h3>Demostración de Polimorfismo</h3>";

$idiomas = [
    new Espanol($nombre),
    new Ingles($nombre),
    new Frances($nombre)
];

foreach ($idiomas as $i) {
    echo "<div class='idioma-demo'>";
    echo "<h4>" . $i->getNombreIdioma() . "</h4>";
    $i->saludar();
    $i->despedir();
    echo "</div>";
}
?>
</div>
</div>

<footer>Ejemplo educativo de POO en PHP 🌐</footer>
</body>
</html>