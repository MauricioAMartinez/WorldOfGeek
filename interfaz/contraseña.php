<?php

//llamar datos a editar
$email=$_POST['email'];
$username=$_POST['username'];
//llenar base 
require_once('db.php');
$pdo=getPdo();
//Validar si usuario existe y e lcorreo
$sql = "select password,username,email from usuarios where username = ? and email = ?";
$consulta = $pdo->prepare($sql);
$consulta->execute([$username,$email]);
$contador = $consulta->rowCount();
//sacar el usuario nombre 
$name=$consulta->fetch(PDO::FETCH_ASSOC);

if($contador>0){
    //generar clave aleatoria
    $password=substr(md5(time()), 0, 5);
    // buscar usuario y remplazar clave
    $sql = "update usuarios set  password= ? where username = ?";
    $consulta = $pdo->prepare($sql);
    $consulta->execute([$password,$username]);
    //Correo de cambio de clave 
    $asunto="Hola $username aqui esta tu nueva contraseña!!";
    $mensaje="Hola,$username tu nueva contraseña es $password, recuerda cambiarla en tu perfil tambien feliz dia.";
    $enviarCorreo = mail($email,$asunto,$mensaje); //enviar el correo atravez de mail
    //mensaje de confirmacion y redirigir
    echo "<script>alert('Contraseña restablecida, valida tu correo '); 
    window.location.href='../account.php'; 
    </script>"; 


  

}else {
    //mensaje si usuario o email no estan en la base
    echo "<script>alert('Usuario O Correo no existen'); 
    window.location.href='../formulariocontr.php'; 
    </script>"; 
}

?>



