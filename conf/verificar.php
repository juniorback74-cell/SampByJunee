<?php
//Conexion a nuestra base de datos
  session_start();
  include('./config/db_config.php');

  $name = $_POST['name'];
  $password = $_POST['password'];
  
  $_SESSION['name']=$name;


  
  if(!empty($name) && !empty($password)){
    $cache = mysqli_query($conexion, "SELECT salt FROM player WHERE name = '$name';");
    if(!$cache){
    echo "Error en la base de datos.";
    exit;
}

    if(mysqli_num_rows($cache)>0){
        $result = mysqli_fetch_array($cache);
        $salt = $result['salt'];
        $hash = "$password$salt";
        $password = hash('sha256', $hash);
        $consulta="SELECT*FROM player where name='$name' and pass='$password'";
        $resultado=mysqli_query($conexion,$consulta);
        $rows=mysqli_num_rows($resultado);
        if($rows){
            header("location:dashboard.html");
        }else{
            include("login.html");
            exit;
        }
    }else{
        include("login.html");
        exit;
    }
}else{
    include("login.html");
    exit;
}

if (isset($resultado)) {
    mysqli_free_result($resultado);
}
mysqli_close($conexion);