<?php

// Interfaz para figuras que pueden ser dibujadas
interface Dibujable {
    public function dibujar();
}

// Clase abstracta para figuras geométricas
abstract class FiguraGeometrica implements Dibujable {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    // Métodos abstractos que deben implementar las subclases
    abstract public function calcularArea();
    abstract public function calcularPerimetro();
    
    // Método concreto compartido
    public function mostrarInfo() {
        echo "Color: " . $this->color . "\n";
        echo "Área: " . number_format($this->calcularArea(), 2) . "\n";
        echo "Perímetro: " . number_format($this->calcularPerimetro(), 2) . "\n";
    }
    
    public function getColor() {
        return $this->color;
    }
}

// Clase Rectángulo
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
        echo "Dibujando un rectángulo {$this->color} de {$this->base}x{$this->altura}\n";
    }
}

// Clase Triángulo
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
        // Fórmula de Herón
        $s = $this->calcularPerimetro() / 2;
        return sqrt($s * ($s - $this->lado1) * ($s - $this->lado2) * ($s - $this->lado3));
    }
    
    public function calcularPerimetro() {
        return $this->lado1 + $this->lado2 + $this->lado3;
    }
    
    public function dibujar() {
        echo "Dibujando un triángulo {$this->color} con lados: {$this->lado1}, {$this->lado2}, {$this->lado3}\n";
    }
}

// Clase Círculo
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
        echo "Dibujando un círculo {$this->color} con radio: {$this->radio}\n";
    }
}

// Programa principal
echo "=== SISTEMA DE FIGURAS GEOMÉTRICAS ===\n\n";

// Crear diferentes figuras
$rectangulo = new Rectangulo("rojo", 5.0, 3.0);
$triangulo = new Triangulo("azul", 3.0, 4.0, 5.0);
$circulo = new Circulo("verde", 4.0);

// Probar las figuras
echo "=== RECTÁNGULO ===\n";
$rectangulo->dibujar();
$rectangulo->mostrarInfo();

echo "\n=== TRIÁNGULO ===\n";
$triangulo->dibujar();
$triangulo->mostrarInfo();

echo "\n=== CÍRCULO ===\n";
$circulo->dibujar();
$circulo->mostrarInfo();

// Usar polimorfismo
echo "\n=== POLIMORFISMO ===\n";
$figuras = [$rectangulo, $triangulo, $circulo];
foreach ($figuras as $figura) {
    $figura->dibujar();
}

echo "\n=== CÁLCULO DE ÁREAS TOTALES ===\n";
$areaTotal = 0;
foreach ($figuras as $figura) {
    $areaTotal += $figura->calcularArea();
}
echo "Área total de todas las figuras: " . number_format($areaTotal, 2) . "\n";

?>