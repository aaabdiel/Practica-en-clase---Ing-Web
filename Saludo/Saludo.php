<?php

// ====================================
// INTERFAZ: Contrato que deben cumplir todos los idiomas
// ====================================
interface Saludable {
    public function saludar();
    public function despedir();
    public function getNombreIdioma();
}

// ====================================
// CLASE ABSTRACTA: Plantilla base para idiomas
// ====================================
abstract class Idioma implements Saludable {
    protected $nombreUsuario;
    
    public function __construct($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }
    
    // Método concreto compartido por todos los idiomas
    public function presentacion() {
        echo "Idioma seleccionado: " . $this->getNombreIdioma() . "\n";
    }
    
    public function setNombreUsuario($nombre) {
        $this->nombreUsuario = $nombre;
    }
    
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    
    // Método abstracto que cada idioma puede implementar
    abstract public function getBandera();
}

// ====================================
// CLASE CONCRETA: Español
// ====================================
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
    
    public function getBandera() {
        return "🇪🇸";
    }
    
    public function saludoFormal() {
        echo "Buenos días, Sr./Sra. {$this->nombreUsuario}.\n";
    }
    
    public function preguntarEstado() {
        echo "¿Cómo te encuentras hoy, {$this->nombreUsuario}?\n";
    }
}

// ====================================
// CLASE CONCRETA: Inglés
// ====================================
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
    
    public function getBandera() {
        return "🇬🇧";
    }
    
    public function saludoFormal() {
        echo "Good morning, Mr./Ms. {$this->nombreUsuario}.\n";
    }
    
    public function preguntarEstado() {
        echo "How are you feeling today, {$this->nombreUsuario}?\n";
    }
}

// ====================================
// CLASE CONCRETA: Francés
// ====================================
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
    
    public function getBandera() {
        return "🇫🇷";
    }
    
    public function saludoFormal() {
        echo "Bonjour, Monsieur/Madame {$this->nombreUsuario}.\n";
    }
}

// ====================================
// CLASE CONCRETA: Alemán (NUEVO)
// ====================================
class Aleman extends Idioma {
    
    public function saludar() {
        echo "Hallo, {$this->nombreUsuario}! Wie geht es dir?\n";
    }
    
    public function despedir() {
        echo "Auf Wiedersehen, {$this->nombreUsuario}! Einen schönen Tag noch.\n";
    }
    
    public function getNombreIdioma() {
        return "Deutsch";
    }
    
    public function getBandera() {
        return "🇩🇪";
    }
    
    public function saludoFormal() {
        echo "Guten Morgen, Herr/Frau {$this->nombreUsuario}.\n";
    }
    
    public function preguntarEstado() {
        echo "Wie fühlst du dich heute, {$this->nombreUsuario}?\n";
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

// ====================================
// DETECTAR SI SE EJECUTA EN CONSOLA O WEB
// ====================================
$esConsola = php_sapi_name() === 'cli';

// ====================================
// PROGRAMA PRINCIPAL - MODO CONSOLA
// (Solo se ejecuta si se corre desde terminal)
// ====================================
if ($esConsola) {
    echo "=== SISTEMA DE SALUDOS MULTI-IDIOMA ===\n\n";

    // Simulación con nombre predefinido
    $nombre = "Juan";
    echo "Usuario: $nombre\n\n";

    echo "Selecciona un idioma:\n";
    echo "1. Español\n";
    echo "2. English\n";
    echo "3. Français\n";
    echo "4. Deutsch\n";
    echo "Opción seleccionada: ";

    // Cambiar este valor para probar: 1, 2, 3 o 4
    $opcion = 1;

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
        case 4:
            $idioma = new Aleman($nombre);
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

    // Saludo formal si el idioma lo tiene
    if ($idioma instanceof Espanol || $idioma instanceof Ingles || $idioma instanceof Aleman) {
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
        new Frances($nombre),
        new Aleman($nombre)
    ];

    foreach ($idiomas as $i) {
        echo "\n--- " . $i->getBandera() . " " . $i->getNombreIdioma() . " ---\n";
        $i->saludar();
        $i->despedir();
    }

    echo "\n=== CAMBIO DE USUARIO ===\n";
    $idioma->setNombreUsuario("María");
    echo "Nuevo usuario: " . $idioma->getNombreUsuario() . "\n";
    $idioma->saludar();
    
    // Terminar aquí en modo consola (no mostrar HTML)
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema de Saludos Multi-Idioma</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1>🌍 Sistema de Saludos Multi-Idioma</h1>

<div class="contenedor">
<div class="tarjeta">
<?php
// ====================================
// MODO WEB - Cambiar $opcion para probar
// ====================================
$nombre = "Juan";
$opcion = 1; // 1=Español, 2=Inglés, 3=Francés, 4=Alemán

switch ($opcion) {
    case 1: $idioma = new Espanol($nombre); break;
    case 2: $idioma = new Ingles($nombre); break;
    case 3: $idioma = new Frances($nombre); break;
    case 4: $idioma = new Aleman($nombre); break;
    default: $idioma = new Espanol($nombre);
}

// Mostrar bandera y presentación
echo "<div style='text-align: center; margin-bottom: 30px;'>";
echo "<span style='font-size: 4rem;'>" . $idioma->getBandera() . "</span>";
echo "<h3 style='color: var(--burgundy); margin-top: 10px;'>";
$idioma->presentacion();
echo "</h3>";
echo "</div>";

// Saludo informal
echo "<div class='saludo-box'>";
echo "<h4>👋 Saludo Informal</h4>";
echo "<p>";
$idioma->saludar();
echo "</p>";
echo "</div>";

// Saludo formal
if (method_exists($idioma, 'saludoFormal')) {
    echo "<div class='saludo-box'>";
    echo "<h4>🎩 Saludo Formal</h4>";
    echo "<p>";
    $idioma->saludoFormal();
    echo "</p>";
    echo "</div>";
}

// Pregunta
if (method_exists($idioma, 'preguntarEstado')) {
    echo "<div class='saludo-box'>";
    echo "<h4>❓ Pregunta</h4>";
    echo "<p>";
    $idioma->preguntarEstado();
    echo "</p>";
    echo "</div>";
}

// Despedida
echo "<div class='saludo-box'>";
echo "<h4>👋 Despedida</h4>";
echo "<p>";
$idioma->despedir();
echo "</p>";
echo "</div>";

echo "<hr>";
echo "<h3 style='text-align: center; color: var(--burgundy); margin: 30px 0;'>📚 Demostración de Polimorfismo</h3>";
echo "<p style='text-align: center; color: #666; margin-bottom: 20px;'>Los mismos métodos, diferentes comportamientos según el idioma</p>";

// Demostración con todos los idiomas
$idiomas = [
    new Espanol($nombre),
    new Ingles($nombre),
    new Frances($nombre),
    new Aleman($nombre)
];

foreach ($idiomas as $i) {
    echo "<div class='idioma-demo'>";
    echo "<h4>" . $i->getBandera() . " " . $i->getNombreIdioma() . "</h4>";
    echo "<p><strong>Saludo:</strong> ";
    $i->saludar();
    echo "</p>";
    echo "<p><strong>Despedida:</strong> ";
    $i->despedir();
    echo "</p>";
    echo "</div>";
}
?>
</div>
</div>

<footer>
    🌐 Ejemplo educativo de POO en PHP<br>
    ✨ Conceptos: Interfaces + Clases Abstractas + Polimorfismo + Herencia
</footer>

</body>
</html>