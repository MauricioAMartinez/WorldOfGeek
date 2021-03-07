<?php
//Generar Conexion 
require('db.php');
$pdo =getPdo();
//Guardar datosen variables
$username= $_POST['username'];
$password= $_POST['password'];
//Validar si usuario existe y guardar nombre usuario
$sql = "select nombre,username from usuarios where username = ? and password = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$username,$password]);
$contador = $consulta->rowCount();
//sacar el usuario nombre 
$name=$consulta->fetch(PDO::FETCH_ASSOC);

if($contador>0){
    //inicio session
    session_start();
    $_SESSION['logueado']=true;
    $_SESSION['username']=$name;

    //redireccion
    header('location:../index.php');
  

}else {
    //mensaje si usuario o contraseña no son correctos
    echo "<script>alert('Usuario O Contraseña erronea'); 
    window.location.href='../account.php'; 
    </script>"; 
}

?>