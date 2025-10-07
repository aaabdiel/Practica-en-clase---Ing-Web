<?php

// ====================================
// INTERFAZ: Contrato para objetos dibujables
// ====================================
interface Dibujable {
    public function dibujar();
}

// ====================================
// CLASE ABSTRACTA: Plantilla base para todas las figuras
// ====================================
abstract class FiguraGeometrica implements Dibujable {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    // Métodos abstractos: cada figura DEBE implementarlos
    abstract public function calcularArea();
    abstract public function calcularPerimetro();
    
    // Método concreto: compartido por todas las figuras
    public function mostrarInfo() {
        echo "<div class='info-section'>";
        echo "<strong>Color:</strong> <span style='color: {$this->color};'>●</span> " . $this->color . "<br>";
        echo "<strong>Área:</strong> " . number_format($this->calcularArea(), 2) . " unidades²<br>";
        echo "<strong>Perímetro:</strong> " . number_format($this->calcularPerimetro(), 2) . " unidades";
        echo "</div>";
    }
    
    public function getColor() {
        return $this->color;
    }
}

// ====================================
// CLASE CONCRETA: Rectángulo
// ====================================
class Rectangulo extends FiguraGeometrica {
    private $base;
    private $altura;
    
    public function __construct($color, $base, $altura) {
        parent::__construct($color);
        $this->base = $base;
        $this->altura = $altura;
    }
    
    public function calcularArea() {
        return $this->base * $this->altura;
    }
    
    public function calcularPerimetro() {
        return 2 * ($this->base + $this->altura);
    }
    
    public function dibujar() {
        echo "<h3>📐 Rectángulo</h3>";
        echo "<div class='figura-visual'>";
        echo "<div class='rectangulo' style='background: {$this->color}; width: " . ($this->base * 30) . "px; height: " . ($this->altura * 30) . "px;'></div>";
        echo "</div>";
        echo "<p>Dimensiones: {$this->base} x {$this->altura}</p>";
    }
}

// ====================================
// CLASE CONCRETA: Triángulo
// ====================================
class Triangulo extends FiguraGeometrica {
    private $lado1;
    private $lado2;
    private $lado3;
    
    public function __construct($color, $lado1, $lado2, $lado3) {
        parent::__construct($color);
        $this->lado1 = $lado1;
        $this->lado2 = $lado2;
        $this->lado3 = $lado3;
    }
    
    public function calcularArea() {
        // Fórmula de Herón: A = √[s(s-a)(s-b)(s-c)]
        $s = $this->calcularPerimetro() / 2;
        return sqrt($s * ($s - $this->lado1) * ($s - $this->lado2) * ($s - $this->lado3));
    }
    
    public function calcularPerimetro() {
        return $this->lado1 + $this->lado2 + $this->lado3;
    }
    
    public function dibujar() {
        echo "<h3>🔺 Triángulo</h3>";
        echo "<div class='figura-visual'>";
        echo "<div class='triangulo' style='border-bottom-color: {$this->color};'></div>";
        echo "</div>";
        echo "<p>Lados: {$this->lado1}, {$this->lado2}, {$this->lado3}</p>";
    }
}

// ====================================
// CLASE CONCRETA: Círculo
// ====================================
class Circulo extends FiguraGeometrica {
    private $radio;
    
    public function __construct($color, $radio) {
        parent::__construct($color);
        $this->radio = $radio;
    }
    
    public function calcularArea() {
        return pi() * $this->radio * $this->radio;
    }
    
    public function calcularPerimetro() {
        return 2 * pi() * $this->radio;
    }
    
    public function dibujar() {
        echo "<h3>⭕ Círculo</h3>";
        echo "<div class='figura-visual'>";
        echo "<div class='circulo' style='background: {$this->color}; width: " . ($this->radio * 40) . "px; height: " . ($this->radio * 40) . "px;'></div>";
        echo "</div>";
        echo "<p>Radio: {$this->radio}</p>";
    }
}

// ====================================
// PROGRAMA PRINCIPAL
// ====================================

// Crear diferentes figuras con colores burgundy/rojizos
$figuras = [
    new Rectangulo("#800020", 5, 3),
    new Triangulo("#A0522D", 3, 4, 5),
    new Circulo("#8B0000", 4)
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Figuras Geométricas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>🎨 Sistema de Figuras Geométricas</h1>
    
    <!-- Formulario Interactivo -->
    <div class="panel">
        <h2 style="color: var(--burgundy); margin-bottom: 20px;">Crear Nueva Figura</h2>
        
        <div class="form-group">
            <label for="tipoFigura">Tipo de Figura:</label>
            <select id="tipoFigura" onchange="mostrarCampos()">
                <option value="">Selecciona una figura...</option>
                <option value="rectangulo">Rectángulo</option>
                <option value="triangulo">Triángulo</option>
                <option value="circulo">Círculo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="color" id="color" value="#800020">
        </div>

        <div id="camposRectangulo" style="display: none;">
            <div class="form-group">
                <label for="base">Base:</label>
                <input type="number" id="base" placeholder="Ejemplo: 5">
            </div>
            <div class="form-group">
                <label for="altura">Altura:</label>
                <input type="number" id="altura" placeholder="Ejemplo: 3">
            </div>
        </div>

        <div id="camposTriangulo" style="display: none;">
            <div class="form-group">
                <label for="lado1">Lado 1:</label>
                <input type="number" id="lado1" placeholder="Ejemplo: 3">
            </div>
            <div class="form-group">
                <label for="lado2">Lado 2:</label>
                <input type="number" id="lado2" placeholder="Ejemplo: 4">
            </div>
            <div class="form-group">
                <label for="lado3">Lado 3:</label>
                <input type="number" id="lado3" placeholder="Ejemplo: 5">
            </div>
        </div>

        <div id="camposCirculo" style="display: none;">
            <div class="form-group">
                <label for="radio">Radio:</label>
                <input type="number" id="radio" placeholder="Ejemplo: 4">
            </div>
        </div>

        <button onclick="crearFigura()">Crear Figura</button>
    </div>

    <div id="resultado" class="resultado">
        <h3 style="color: var(--burgundy); margin-bottom: 20px;">Resultado</h3>
        <div id="figuraVisual" class="figura-visual"></div>
        <div id="infoFigura"></div>
    </div>
</div>

<div class="contenedor">
    <?php
    // Mostrar cada figura en una tarjeta
    foreach ($figuras as $figura) {
        echo "<div class='tarjeta'>";
        $figura->dibujar();
        $figura->mostrarInfo();
        echo "</div>";
    }
    ?>
</div>

<div class="resumen">
    <h2>📊 Resumen de Áreas</h2>
    <?php
    $areaTotal = 0;
    foreach ($figuras as $indice => $figura) {
        $area = $figura->calcularArea();
        $areaTotal += $area;
        $tipo = get_class($figura);
        
        echo "<div class='resumen-item'>";
        echo "<strong>{$tipo}:</strong>";
        echo "<span>" . number_format($area, 2) . " u²</span>";
        echo "</div>";
    }
    
    echo "<div class='resumen-item' style='background: var(--burgundy); color: white; font-weight: bold;'>";
    echo "<strong>TOTAL:</strong>";
    echo "<span>" . number_format($areaTotal, 2) . " u²</span>";
    echo "</div>";
    ?>
</div>

<footer>
    💻 Desarrollado con PHP Orientado a Objetos<br>
    ✨ Conceptos: Interfaces, Clases Abstractas y Polimorfismo
</footer>

<script>
function mostrarCampos() {
    const tipo = document.getElementById('tipoFigura').value;
    
    document.getElementById('camposRectangulo').style.display = 'none';
    document.getElementById('camposTriangulo').style.display = 'none';
    document.getElementById('camposCirculo').style.display = 'none';
    
    if (tipo === 'rectangulo') {
        document.getElementById('camposRectangulo').style.display = 'block';
    } else if (tipo === 'triangulo') {
        document.getElementById('camposTriangulo').style.display = 'block';
    } else if (tipo === 'circulo') {
        document.getElementById('camposCirculo').style.display = 'block';
    }
}

function crearFigura() {
    const tipo = document.getElementById('tipoFigura').value;
    const color = document.getElementById('color').value;
    
    if (!tipo) {
        alert('Por favor selecciona un tipo de figura');
        return;
    }
    
    let area, perimetro, visual;
    
    if (tipo === 'rectangulo') {
        const base = parseFloat(document.getElementById('base').value);
        const altura = parseFloat(document.getElementById('altura').value);
        
        if (!base || !altura) {
            alert('Por favor completa todos los campos');
            return;
        }
        
        area = base * altura;
        perimetro = 2 * (base + altura);
        visual = `<div style="width: ${base * 30}px; height: ${altura * 30}px; background: ${color}; border-radius: 10px; box-shadow: 0 8px 20px rgba(128, 0, 32, 0.3);"></div>`;
        
    } else if (tipo === 'triangulo') {
        const l1 = parseFloat(document.getElementById('lado1').value);
        const l2 = parseFloat(document.getElementById('lado2').value);
        const l3 = parseFloat(document.getElementById('lado3').value);
        
        if (!l1 || !l2 || !l3) {
            alert('Por favor completa todos los campos');
            return;
        }
        
        perimetro = l1 + l2 + l3;
        const s = perimetro / 2;
        area = Math.sqrt(s * (s - l1) * (s - l2) * (s - l3));
        visual = `<div style="width: 0; height: 0; border-left: ${l1 * 20}px solid transparent; border-right: ${l2 * 20}px solid transparent; border-bottom: ${l3 * 20}px solid ${color}; filter: drop-shadow(0 8px 20px rgba(128, 0, 32, 0.3));"></div>`;
        
    } else if (tipo === 'circulo') {
        const radio = parseFloat(document.getElementById('radio').value);
        
        if (!radio) {
            alert('Por favor completa todos los campos');
            return;
        }
        
        area = Math.PI * radio * radio;
        perimetro = 2 * Math.PI * radio;
        visual = `<div style="width: ${radio * 40}px; height: ${radio * 40}px; background: ${color}; border-radius: 50%; box-shadow: 0 8px 20px rgba(128, 0, 32, 0.3);"></div>`;
    }
    
    document.getElementById('figuraVisual').innerHTML = visual;
    document.getElementById('infoFigura').innerHTML = `
        <div class="info-item">
        <strong>Tipo:</strong>
        <span>${tipo.charAt(0).toUpperCase() + tipo.slice(1)}</span>
        </div>
        <div class="info-item">
        <strong>Color:</strong>
        <span>${color}</span>
        </div>
        <div class="info-item">
        <strong>Área:</strong>
        <span>${area.toFixed(2)} unidades²</span>
        </div>
        <div class="info-item">
        <strong>Perímetro:</strong>
        <span>${perimetro.toFixed(2)} unidades</span>
        </div>
    `;
    
    document.getElementById('resultado').classList.add('activo');
}
</script>

</body>
</html>