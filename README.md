# Sistema Educativo de Programación Orientada a Objetos

## Descripción General

Este proyecto contiene dos sistemas educativos desarrollados en PHP que demuestran los principios fundamentales de la Programación Orientada a Objetos (POO) mediante ejemplos prácticos e interactivos.

## Sistemas Implementados

### 1. Sistema de Figuras Geométricas
**Conceptos POO demostrados:**
- **Interfaces** (Dibujable)
- **Clases Abstractas** (FiguraGeometrica)
- **Herencia** (Rectángulo, Triángulo, Círculo)
- **Polimorfismo** (métodos dibujar(), calcularArea(), calcularPerimetro())
- **Encapsulamiento** (propiedades protegidas/privadas)

#### Figuras Implementadas:
- **Rectángulo**: Cálculo de área y perímetro
- **Triángulo**: Fórmula de Herón para área
- **Círculo**: Cálculos con π

#### Características Interactivas:
- Visualización gráfica de figuras
- Cálculos automáticos de área y perímetro
- Formulario para crear figuras personalizadas
- Resumen dinámico de áreas totales

### 2. Sistema de Conversación Multi-Idioma
**Conceptos POO demostrados:**
- **Interfaces** (Saludable)
- **Clases Abstractas** (Idioma)
- **Herencia** (Español, Inglés, Francés, Alemán)
- **Polimorfismo** (métodos saludar(), despedir())
- **Métodos específicos** por idioma

#### Idiomas Implementados:
- **Español**: Saludos formales e informales
- **Inglés**: Conversaciones completas
- **Francés**: Expresiones idiomáticas
- **Alemán**: Estructuras gramaticales

#### Características Interactivas:
- Ejemplos de conversación completos
- Simulador de diálogos interactivos
- Aprendizaje de frases básicas
- Historial de conversaciones

## Tecnologías Utilizadas

### Backend:
- **PHP 7.4+** (Programación Orientada a Objetos)
- **Interfaces** y **Clases Abstractas**
- **Herencia** y **Polimorfismo**

### Frontend:
- **HTML5** semántico
- **CSS3** con variables personalizadas y Grid/Flexbox
- **JavaScript** ES6+ para interactividad
- **Diseño Responsive**

### Características de Diseño:
- Paleta de colores burgundy/rojizos
- Diseño completamente responsive
- Animaciones CSS suaves
- Efectos visuales atractivos

## Estructura del Proyecto

```
proyecto-poo/
│
├── index.html              # Sistema de Figuras Geométricas
├── idiomas.html           # Sistema Multi-Idioma
├── style.css              # Estilos unificados
│
├── README.md              # Este archivo
│
└── assets/                # Recursos (si existen)
    ├── images/
    └── fonts/
```

## Cómo Usar

### Sistema de Figuras Geométricas:
1. Abre `index.html` en tu navegador
2. Observa los ejemplos predefinidos
3. Usa el formulario para crear figuras personalizadas
4. Explora los cálculos automáticos

### Sistema Multi-Idioma:
1. Abre `idiomas.html` en tu navegador
2. Ingresa tu nombre y selecciona un idioma
3. Estudia los ejemplos de conversación
4. Practica con el simulador interactivo

## Conceptos POO Implementados

### Para Figuras Geométricas:
```php
// Interfaz
interface Dibujable {
    public function dibujar();
}

// Clase Abstracta
abstract class FiguraGeometrica implements Dibujable {
    // Métodos abstractos que deben implementarse
    abstract public function calcularArea();
    abstract public function calcularPerimetro();
}
```

### Para Sistema de Idiomas:
```php
// Interfaz
interface Saludable {
    public function saludar();
    public function despedir();
}

// Clase Abstracta  
abstract class Idioma implements Saludable {
    // Métodos abstractos para implementación específica
    abstract public function getBandera();
    abstract public function saludoFormal();
}
```

## Objetivos Educativos

### Para Estudiantes de POO:
- Comprender interfaces y su propósito
- Dominar clases abstractas vs concretas
- Aplicar herencia y polimorfismo
- Entender encapsulamiento

### Para Desarrolladores Web:
- Integración PHP + HTML + CSS + JavaScript
- Manejo de formularios interactivos
- Diseño responsive profesional
- Animaciones y transiciones CSS

## Características Destacadas

### Visualmente Atractivo:
- Gradientes y sombras elegantes
- Animaciones suaves al interactuar
- Iconos descriptivos
- Diseño de tarjetas moderno

### Educativamente Efectivo:
- Ejemplos claros y concisos
- Explicaciones paso a paso
- Práctica interactiva inmediata
- Retroalimentación visual

### Técnicamente Sólido:
- Código bien estructurado y comentado
- Separación de responsabilidades
- Reutilización de componentes
- Fácil de extender y mantener

## Requisitos del Sistema

- **Servidor Web**: Apache, Nginx, o servidor local integrado de PHP
- **PHP**: Versión 7.4 o superior
- **Navegador**: Chrome, Firefox, Safari, Edge (versiones modernas)
- **JavaScript**: Habilitado en el navegador

## Posibles Extensiones

### Para Figuras Geométricas:
- Agregar más figuras (pentágono, hexágono, elipse)
- Implementar figuras 3D
- Modo quiz para practicar cálculos

### Para Sistema de Idiomas:
- Agregar más idiomas (italiano, portugués, japonés)
- Funcionalidad de texto a voz
- Lecciones gramaticales avanzadas

## Información del Proyecto

Este laboratorio ha sido desarrollado por estudiantes de la Universidad Tecnológica de Panamá:

**Nathaly Bonilla Mcklean**  
Correos de contacto:  
Institucional: nathaly.bonilla1@utp.ac.pa  
GitHub: githubmcklean@gmail.com  
Profesional: nbmcklean@gmail.com

**Abdiel Abrego**  
Correos de contacto:  
Institucional: abdiel.abrego1@utp.ac.pa  
Profesional: aabdiel200412@gmail.com

**Curso**: Ingeniería Web  
**Instructora del Laboratorio**: Ing. Irina Fong

**Fecha de Ejecución**: 6 de octubre de 2025  
**Fecha de Entrega**: 6 de octubre de 2025  
**Última Modificación**: 6 de octubre de 2025

---

## Desarrollo

Este proyecto fue desarrollado como herramienta educativa para demostrar los conceptos fundamentales de la Programación Orientada a Objetos de manera práctica y visual.

---

**Universidad Tecnológica de Panamá**  
**Facultad de Ingeniería de Sistemas Computacionales**  
**Licenciatura en Ingeniería de Software**  
**II Semestre 2025**
