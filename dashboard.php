<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PCU del Usuario</title>
<link rel="stylesheet" href="./assets/CSS/dash.css">
</head>
<body>

<header class="header">
    <img src="img/logo.png" alt="Logo" class="logo">
    <button class="menu-toggle" id="menu-toggle">&#9776;</button>
</header>

<div class="container-dashboard">
    <nav class="sidebar" id="sidebar">
        <ul>
            <li><button>Inicio</button></li>
            <li><button>Perfil</button></li>
            <li><button>Tienda</button></li>
            <li><button>Mis Items</button></li>
            <li><button>Configuración</button></li>
            <li><button>Cerrar Sesión</button></li>
        </ul>
    </nav>

 <main class="main-content">
    <!-- Imagen de la skin del jugador -->
    <div class="player-skin">
        <img id="skin-img" src="skins/default.png" alt="Skin del jugador">
    </div>

    <h1>Estadisticas
    </h1>

    <div class="container">
        <div class="left">
            <h2 id="upname">Nombre</h2>
            <h2 id="nombre">Nombre del Jugador: Junee Roleplay</h2>
            <h2 id="registro">Fecha de Registro: --</h2>
            <h2 id="tiempo">Tiempo Jugado: --</h2>
            <h2 id="vip">VIP: --</h2>
            <h2 id="coins">Monedas: --</h2>
        </div>
        <div class="right">
            <h2 id="dinero">Dinero en Mano: --</h2>
            <h2 id="banco">Dinero en Banco: --</h2>
            <h2 id="telefono">Número de Teléfono: --</h2>
            <h2 id="nivel">Nivel: --</h2>
            <h2 id="genero">Género: --</h2>
        </div>
    </div>

    <div class="progress-container">
        <!-- tus progress bars aquí -->
    </div>
</main>
