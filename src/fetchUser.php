<?php
session_start();
header('Content-Type: application/json');
include('./config/db_config.php');

if(!isset($_SESSION['name'])) {
    echo json_encode(['error' => 'Usuario no logueado']);
    exit;
}

$name = $_SESSION['name'];

// Consulta al jugador
$query = "SELECT username, coins, dinero, level, hungry, thirst, health, armour, skin 
          FROM player 
          WHERE name = ?";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "s", $name);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 0){
    echo json_encode(['error' => 'Jugador no encontrado']);
    exit;
}

$datos = mysqli_fetch_assoc($result);

$response = [
    'username' => $datos['username'],
    'coins' => $datos['coins'],
    'dinero' => $datos['dinero'],
    'level' => $datos['level'],
    'hambre' => $datos['hungry'],
    'sed' => $datos['thirst'],
    'vida' => $datos['health'],
    'armadura' => $datos['armour'],
    'skin' => $datos['skin']
];

echo json_encode($response);

// Cerrar conexión
mysqli_free_result($result);
mysqli_close($conexion);
