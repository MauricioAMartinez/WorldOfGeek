<?php
//session
require('db.php');
$pdo =getPdo();
session_start();
//datos
$idcambio = $_GET['id'];
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
    window.location.href='../edicion.php'; 
    </script>"; 

   
}else {
//modificar  valores en la tabla
$sql = "update usuarios set nombre = ? , username= ?,password=?,Email=? where id = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$name,$username,$password,$email,$idcambio]);

//mensaje de modificacion de datos
echo "<script>alert('Datos modificados correctamente,ingresa nuevamente'); 
window.location.href='../account.php'; 
</script>"; 
//Correo de modificacion
$asunto="Hola $name has modificado tus datos";
$mensaje="Este es un mensaje de confirmacion de tu modificacion  en nuestra pagina tu usuario es $username";
$enviarCorreo = mail($email,$asunto,$mensaje); //enviar el correo atravez de mail
session_destroy();

   
}


?>