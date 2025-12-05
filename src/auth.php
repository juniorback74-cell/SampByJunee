<?php
session_start();
include('./config/db_config.php');

$name = $_POST['name'];
$password = $_POST['password'];

$_SESSION['name'] = $name;

if(!empty($name) && !empty($password)){

    $cache = mysqli_query($conexion, "SELECT salt FROM player WHERE name = '$name';");

    if(!$cache){
        echo "Error en la base de datos.";
        exit;
    }

    if(mysqli_num_rows($cache) > 0){
        $result = mysqli_fetch_array($cache);
        $salt = $result['salt'];

        $hash = "$password$salt";
        $password = hash('sha256', $hash);

        $consulta = "SELECT * FROM player WHERE name='$name' AND pass='$password'";
        $resultado = mysqli_query($conexion, $consulta);
        $rows = mysqli_num_rows($resultado);

        if($rows){
            header("Location: ../dashboard.php");
            exit;
        }else{
            include("index.html");
            exit;
        }

    }else{
        include("index.html");
        exit;
    }

}else{
    include("index.html");
    exit;
}

if (isset($resultado)) {
    mysqli_free_result($resultado);
}

mysqli_close($conexion);
?>
