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
    
    public function setNombreUsuario($nombre) {
        $this->nombreUsuario = $nombre;
    }
    
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }
    
    abstract public function getBandera();
    abstract public function saludoFormal();
}

// ====================================
// CLASE CONCRETA: Español
// ====================================
class Espanol extends Idioma {
    
    public function saludar() {
        echo "¡Hola, {$this->nombreUsuario}! ¿Cómo estás?";
    }
    
    public function despedir() {
        echo "¡Adiós, {$this->nombreUsuario}! Que tengas un buen día.";
    }
    
    public function getNombreIdioma() {
        return "Español";
    }
    
    public function getBandera() {
        return "🇪🇸";
    }
    
    public function saludoFormal() {
        echo "Buenos días, Sr./Sra. {$this->nombreUsuario}.";
    }
    
    public function preguntarEstado() {
        echo "¿Cómo te encuentras hoy?";
    }
    
    public function responderBien() {
        echo "¡Muy bien, gracias!";
    }
    
    public function ofrecer() {
        echo "¿En qué puedo ayudarte?";
    }
    
    public function agradecer() {
        echo "Muchas gracias por tu tiempo.";
    }
}

// ====================================
// CLASE CONCRETA: Inglés
// ====================================
class Ingles extends Idioma {
    
    public function saludar() {
        echo "Hello, {$this->nombreUsuario}! How are you?";
    }
    
    public function despedir() {
        echo "Goodbye, {$this->nombreUsuario}! Have a nice day.";
    }
    
    public function getNombreIdioma() {
        return "English";
    }
    
    public function getBandera() {
        return "🇬🇧";
    }
    
    public function saludoFormal() {
        echo "Good morning, Mr./Ms. {$this->nombreUsuario}.";
    }
    
    public function preguntarEstado() {
        echo "How are you feeling today?";
    }
    
    public function responderBien() {
        echo "I'm doing great, thanks!";
    }
    
    public function ofrecer() {
        echo "How can I help you?";
    }
    
    public function agradecer() {
        echo "Thank you very much for your time.";
    }
}

// ====================================
// CLASE CONCRETA: Francés
// ====================================
class Frances extends Idioma {
    
    public function saludar() {
        echo "Bonjour, {$this->nombreUsuario}! Comment allez-vous?";
    }
    
    public function despedir() {
        echo "Au revoir, {$this->nombreUsuario}! Bonne journée.";
    }
    
    public function getNombreIdioma() {
        return "Français";
    }
    
    public function getBandera() {
        return "🇫🇷";
    }
    
    public function saludoFormal() {
        echo "Bonjour, Monsieur/Madame {$this->nombreUsuario}.";
    }
    
    public function preguntarEstado() {
        echo "Comment vous sentez-vous aujourd'hui?";
    }
    
    public function responderBien() {
        echo "Très bien, merci!";
    }
    
    public function ofrecer() {
        echo "Comment puis-je vous aider?";
    }
    
    public function agradecer() {
        echo "Merci beaucoup pour votre temps.";
    }
}

// ====================================
// CLASE CONCRETA: Alemán
// ====================================
class Aleman extends Idioma {
    
    public function saludar() {
        echo "Hallo, {$this->nombreUsuario}! Wie geht es dir?";
    }
    
    public function despedir() {
        echo "Auf Wiedersehen, {$this->nombreUsuario}! Einen schönen Tag noch.";
    }
    
    public function getNombreIdioma() {
        return "Deutsch";
    }
    
    public function getBandera() {
        return "🇩🇪";
    }
    
    public function saludoFormal() {
        echo "Guten Morgen, Herr/Frau {$this->nombreUsuario}.";
    }
    
    public function preguntarEstado() {
        echo "Wie fühlst du dich heute?";
    }
    
    public function responderBien() {
        echo "Mir geht es sehr gut, danke!";
    }
    
    public function ofrecer() {
        echo "Wie kann ich dir helfen?";
    }
    
    public function agradecer() {
        echo "Vielen Dank für Ihre Zeit.";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Conversación Multi-Idioma</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>🌍 Sistema de Conversación Multi-Idioma</h1>
    <p style="text-align: center; color: rgba(255, 248, 220, 0.98); margin-bottom: 30px;">
        Selecciona un idioma y aprende a mantener conversaciones básicas
    </p>
</div>

<!-- PASO 1: Selección de Idioma -->
<div id="seccionSeleccion" class="container" style= "color: rgba(255, 248, 220, 0.98)">
    <div class="panel" style="max-width: 600px; margin: 0 auto;">
        <h2 style="color: rgba(255, 248, 220, 0.98); margin-bottom: 20px; text-align: center;">
            🎯 Paso 1: Selecciona tu Idioma
        </h2>
        
        <div class="form-group">
            <label for="nombreUsuario">Tu Nombre:</label>
            <input type="text" id="nombreUsuario" placeholder="Escribe tu nombre" value="María">
        </div>

        <div class="form-group">
            <label for="idiomaSeleccionado">Elige un Idioma:</label>
            <select id="idiomaSeleccionado">
                <option value="">Selecciona un idioma...</option>
                <option value="espanol">🇪🇸 Español</option>
                <option value="ingles">🇬🇧 English</option>
                <option value="frances">🇫🇷 Français</option>
                <option value="aleman">🇩🇪 Deutsch</option>
            </select>
        </div>

        <button onclick="seleccionarIdioma()" style="width: 100%;">Continuar →</button>
    </div>
</div>

<!-- PASO 2: Ejemplo de Conversación (Oculto inicialmente) -->
<div id="seccionEjemplo" style="display: none;">
    <div style="text-align: center; margin: 40px 0 20px 0;">
        <h2 style= "font-size: 2em;  color: rgba(255, 248, 220, 0.98)">
            <span id="banderaEjemplo"></span> Ejemplo de Conversación
        </h2>
        <p style="max-width: 800px; margin: 10px auto;  color: rgba(255, 248, 220, 0.98)">
            Observa cómo se desarrolla una conversación completa en <strong id="nombreIdiomaEjemplo"></strong>
        </p>
    </div>

    <div class="contenedor">
        <div class="tarjeta" style="max-width: 800px; margin: 0 auto;">
            <div id="conversacionEjemplo" class="conversacion-ejemplo">
                <!-- Se llenará dinámicamente -->
            </div>
        </div>
    </div>
</div>

<!-- PASO 3: Conversación Interactiva (Oculto inicialmente) -->
<div id="seccionConversacion" style="display: none;">
    <div class="container" style="margin-top: 50px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <h2 style="font-size: 2em; color: rgba(255, 248, 220, 0.98)">
                💬 Tu Conversación Interactiva
            </h2>
            <p>
                Practica enviando mensajes usando los botones de abajo
            </p>
        </div>

        <div class="panel" style="max-width: 900px; margin: 0 auto;)">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="margin: 0; color: rgba(255, 248, 220, 0.98)">
                    <span id="banderaActiva"></span> Conversación: <span id="nombreUsuarioActivo"></span>
                </h3>
                <button onclick="limpiarConversacion()" style="padding: 8px 15px; font-size: 0.9em;">
                    🗑️ Limpiar
                </button>
            </div>
            
            <div id="mensajesConversacion" style="max-height: 400px; overflow-y: auto; margin-bottom: 20px; padding: 15px; background: #f9f9f9; border-radius: 10px; min-height: 200px;">
                <p style="text-align: center; color: #999; padding: 20px;">
                    Usa los botones de abajo para comenzar tu conversación...
                </p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px;">
                <button onclick="enviarMensaje('saludo')" class="btn-conversacion">👋 Saludar</button>
                <button onclick="enviarMensaje('pregunta')" class="btn-conversacion">❓ Preguntar cómo está</button>
                <button onclick="enviarMensaje('respuesta')" class="btn-conversacion">😊 Responder que estás bien</button>
                <button onclick="enviarMensaje('ofrecer')" class="btn-conversacion">🤝 Ofrecer ayuda</button>
                <button onclick="enviarMensaje('agradecer')" class="btn-conversacion">🙏 Agradecer</button>
                <button onclick="enviarMensaje('despedida')" class="btn-conversacion">👋 Despedirse</button>
            </div>
        </div>
    </div>
</div>

<!-- Historial de Conversaciones -->
<div id="seccionHistorial" class="resumen" style="margin-top: 50px; display: none;">
    <h2>📊 Historial de tus Conversaciones</h2>
    <div id="historialConversaciones">
        <p style="color: #666; text-align: center; padding: 20px;">
            Aún no has enviado ningún mensaje.
        </p>
    </div>
</div>

<footer>
    🌐 Ejemplo educativo de POO en PHP<br>
    ✨ Conceptos: Interfaces + Clases Abstractas + Polimorfismo + Herencia
</footer>

<script>
// Definición de los idiomas en JavaScript
const idiomas = {
    espanol: {
        nombre: 'Español',
        bandera: '🇪🇸',
        mensajes: {
            saludo: (nombre) => `¡Hola, ${nombre}! ¿Cómo estás?`,
            pregunta: () => '¿Cómo te encuentras hoy?',
            respuesta: () => '¡Muy bien, gracias!',
            ofrecer: () => '¿En qué puedo ayudarte?',
            agradecer: () => 'Muchas gracias por tu tiempo.',
            despedida: (nombre) => `¡Adiós, ${nombre}! Que tengas un buen día.`
        }
    },
    ingles: {
        nombre: 'English',
        bandera: '🇬🇧',
        mensajes: {
            saludo: (nombre) => `Hello, ${nombre}! How are you?`,
            pregunta: () => 'How are you feeling today?',
            respuesta: () => "I'm doing great, thanks!",
            ofrecer: () => 'How can I help you?',
            agradecer: () => 'Thank you very much for your time.',
            despedida: (nombre) => `Goodbye, ${nombre}! Have a nice day.`
        }
    },
    frances: {
        nombre: 'Français',
        bandera: '🇫🇷',
        mensajes: {
            saludo: (nombre) => `Bonjour, ${nombre}! Comment allez-vous?`,
            pregunta: () => 'Comment vous sentez-vous aujourd\'hui?',
            respuesta: () => 'Très bien, merci!',
            ofrecer: () => 'Comment puis-je vous aider?',
            agradecer: () => 'Merci beaucoup pour votre temps.',
            despedida: (nombre) => `Au revoir, ${nombre}! Bonne journée.`
        }
    },
    aleman: {
        nombre: 'Deutsch',
        bandera: '🇩🇪',
        mensajes: {
            saludo: (nombre) => `Hallo, ${nombre}! Wie geht es dir?`,
            pregunta: () => 'Wie fühlst du dich heute?',
            respuesta: () => 'Mir geht es sehr gut, danke!',
            ofrecer: () => 'Wie kann ich dir helfen?',
            agradecer: () => 'Vielen Dank für Ihre Zeit.',
            despedida: (nombre) => `Auf Wiedersehen, ${nombre}! Einen schönen Tag noch.`
        }
    }
};

let idiomaActual = null;
let nombreActual = '';
let contadorMensajes = 0;
let historialMensajes = [];

function seleccionarIdioma() {
    const nombre = document.getElementById('nombreUsuario').value.trim();
    const idiomaKey = document.getElementById('idiomaSeleccionado').value;
    
    if (!nombre) {
        alert('Por favor ingresa tu nombre');
        return;
    }
    
    if (!idiomaKey) {
        alert('Por favor selecciona un idioma');
        return;
    }
    
    idiomaActual = idiomas[idiomaKey];
    nombreActual = nombre;
    
    // Ocultar sección de selección
    document.getElementById('seccionSeleccion').style.display = 'none';
    
    // Mostrar ejemplo
    mostrarEjemplo();
    
    // Mostrar sección de conversación
    document.getElementById('seccionConversacion').style.display = 'block';
    document.getElementById('seccionHistorial').style.display = 'block';
    
    // Actualizar información del usuario
    document.getElementById('banderaActiva').textContent = idiomaActual.bandera;
    document.getElementById('nombreUsuarioActivo').textContent = nombreActual;
    
    // Scroll suave
    setTimeout(() => {
        document.getElementById('seccionEjemplo').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }, 100);
}

function mostrarEjemplo() {
    document.getElementById('seccionEjemplo').style.display = 'block';
    document.getElementById('banderaEjemplo').textContent = idiomaActual.bandera;
    document.getElementById('nombreIdiomaEjemplo').textContent = idiomaActual.nombre;
    
    const ejemploHTML = `
        <div class="mensaje-persona1">
            <strong>👤 Persona A:</strong>
            <p>${idiomaActual.mensajes.saludo(nombreActual)}</p>
        </div>
        
        <div class="mensaje-persona2">
            <strong>👤 Persona B:</strong>
            <p>${idiomaActual.mensajes.respuesta()}</p>
        </div>
        
        <div class="mensaje-persona1">
            <strong>👤 Persona A:</strong>
            <p>${idiomaActual.mensajes.pregunta()}</p>
        </div>
        
        <div class="mensaje-persona2">
            <strong>👤 Persona B:</strong>
            <p>${idiomaActual.mensajes.respuesta()}</p>
        </div>
        
        <div class="mensaje-persona1">
            <strong>👤 Persona A:</strong>
            <p>${idiomaActual.mensajes.ofrecer()}</p>
        </div>
        
        <div class="mensaje-persona2">
            <strong>👤 Persona B:</strong>
            <p>${idiomaActual.mensajes.agradecer()}</p>
        </div>
        
        <div class="mensaje-persona1">
            <strong>👤 Persona A:</strong>
            <p>${idiomaActual.mensajes.despedida(nombreActual)}</p>
        </div>
    `;
    
    document.getElementById('conversacionEjemplo').innerHTML = ejemploHTML;
}


function enviarMensaje(tipo) {
    if (!idiomaActual) return;
    
    const contenedor = document.getElementById('mensajesConversacion');
    
    // Limpiar mensaje inicial si existe
    if (contadorMensajes === 0) {
        contenedor.innerHTML = '';
    }
    
    const mensaje = idiomaActual.mensajes[tipo](nombreActual);
    contadorMensajes++;
    
    const divMensaje = document.createElement('div');
    divMensaje.className = 'mensaje-chat';
    divMensaje.innerHTML = `
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
            <strong style="color: var(--burgundy);">Mensaje #${contadorMensajes}</strong>
            <span style="font-size: 0.85em; color: #999;">${new Date().toLocaleTimeString()}</span>
        </div>
        <p style="margin: 0; padding: 10px; background: white; border-radius: 8px; border-left: 3px solid var(--burgundy);">
            ${mensaje}
        </p>
    `;
    
    contenedor.appendChild(divMensaje);
    contenedor.scrollTop = contenedor.scrollHeight;
    
    // Guardar en historial
    historialMensajes.push({
        tipo: tipo,
        texto: mensaje,
        hora: new Date().toLocaleTimeString()
    });
    
    actualizarHistorial();
}

function limpiarConversacion() {
    if (confirm('¿Estás seguro de que quieres limpiar la conversación actual?')) {
        document.getElementById('mensajesConversacion').innerHTML = `
            <p style="text-align: center; color: #999; padding: 20px;">
                Usa los botones de abajo para comenzar tu conversación...
            </p>
        `;
        contadorMensajes = 0;
    }
}

function actualizarHistorial() {
    const historial = document.getElementById('historialConversaciones');
    
    if (historialMensajes.length === 0) {
        historial.innerHTML = `
            <p style="color: #666; text-align: center; padding: 20px;">
                Aún no has enviado ningún mensaje.
            </p>
        `;
        return;
    }
    
    let html = '';
    historialMensajes.forEach((msg, index) => {
        html += `
            <div class="resumen-item">
                <strong>Mensaje ${index + 1}:</strong>
                <span>${msg.texto}</span>
            </div>
        `;
    });
    
    html += `
        <div class="resumen-item" style="background: var(--burgundy); color: white; font-weight: bold;">
            <strong>TOTAL DE MENSAJES:</strong>
            <span>${historialMensajes.length}</span>
        </div>
    `;
    
    historial.innerHTML = html;
}
</script>

<style>
.conversacion-ejemplo {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 10px;
}

.mensaje-persona1, .mensaje-persona2 {
    margin: 15px 0;
    padding: 12px;
    border-radius: 8px;
    animation: slideIn 0.5s ease;
}

.mensaje-persona1 {
    background: #fff;
    border-left: 4px solid var(--burgundy);
}

.mensaje-persona2 {
    background: #fff;
    border-left: 4px solid #666;
    margin-left: 20px;
}

.mensaje-persona1 strong, .mensaje-persona2 strong {
    color: var(--burgundy);
    display: block;
    margin-bottom: 5px;
}

.mensaje-persona1 p, .mensaje-persona2 p {
    margin: 0;
    color: #333;
    font-size: 1.05em;
}

.btn-conversacion {
    padding: 12px 20px;
    background: var(--burgundy);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1em;
    transition: all 0.3s ease;
}

.btn-conversacion:hover {
    background: #600018;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(128, 0, 32, 0.3);
}

.mensaje-chat {
    margin-bottom: 15px;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

</body>
</html>