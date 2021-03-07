<?php
session_start();


if (isset($_SESSION['logueado'])==false){

    echo "<script>alert('Debes estar registrado para comprar'); 
window.location.href='../account.php'; 
</script>"; 
  
}
else {
    echo "<script>alert('Compra en validacion confirma el correo de pago'); 
    window.location.href='../index.php'; 
    </script>"; 
    unset( $_SESSION["cart"] ); 
}


?>