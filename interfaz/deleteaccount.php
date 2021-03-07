<?php
//Generar Conexion 
require('db.php');
$pdo =getPdo();
session_start();

//Llamar la base 
$sql = "SELECT * FROM usuarios ";
$consulta = $pdo->prepare($sql);
$consulta->execute();
$usuarios=$consulta->fetchALL(PDO::FETCH_ASSOC);


//id o tarea a borrar
$idBorrar = $_GET['id'];

//borrar
$sql = "delete from usuarios where id= ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$idBorrar]);
//romper sesion y direccionar+mensaje
session_destroy();
echo "<script>alert('Usuario Eliminado'); 
    window.location.href='../account.php'; 
    </script>"; 
//trar datos pasados por url get
$nombre= $_GET['nombre'];
$email=$_GET['email'];
//Email de eliminacion
$asunto="Hola $nombre se a eliminado tu cuenta ";
$mensaje="Lamentamos que allas cerrado tu cuenta, si deseas volver aqui estaremos ";
$enviarCorreo = mail($email,$asunto,$mensaje); //enviar el correo atravez de mail    

?>
