<?php
//Generar Conexion 
require('db.php');
$pdo =getPdo();
//Agregar datos a variables
$name= $_POST['name'];
$username= $_POST['username'];
$password= $_POST['password'];
$email= $_POST['email'];


//Validar si usuario existe 
$sql = "select * from usuarios where nombre = ? OR email = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$username,$email]);
$contador = $consulta->rowCount();


if($contador>0){
    //mensaje si usuario o correo son existentes
    echo "<script>alert('Usuario O Correo ya se encuentran registrados'); 
    window.location.href='../account.php'; 
    </script>"; 

   
}else {
//Insertar valores en la tabla
$sql = "INSERT 
INTO `ecommerce`.`usuarios` ( `nombre`, `username`, `password`, `email`)
VALUES ( ?, ?, ?, ?);";
//parametros
$consulta = $pdo->prepare($sql);
$consulta->execute([$name,$username,$password,$email]);
//mensaje de registro
echo "<script>alert('Usuario registrado correctamente, valida tu correo'); 
window.location.href='../account.php'; 
</script>"; 
//Correo de registro

$asunto="Hola $name gracias por entrar el mundo GEEK";
$mensaje="Este es un mensaje de confirmacion de tu registro en nuestra pagina tu usuario es $username";
$enviarCorreo = mail($email,$asunto,$mensaje); //enviar el correo atravez de mail

   
}

?>