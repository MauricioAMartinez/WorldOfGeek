<?php
//Iniciar session
session_start();
require_once('interfaz/db.php'); 
$pdo=getPdo();
//solicitar productos y ejecutar
$sql="select * from productos";
$consulta= $pdo ->prepare ($sql);
$consulta->execute();
$productos=$consulta->fetchALL(PDO::FETCH_ASSOC);
//solicitar imagenes y ejecutar
$sqlimg="select * from imagenes" ;
$consultaimg=$pdo ->prepare ($sqlimg);
$consultaimg->execute();
$imagenes=$consultaimg->fetchALL(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Red store | Ecommerce Website Design</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <div class="header">
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <a href="index.php">
              <img src="images/logo1.png" alt="" width="70"
            /></a>
          </div>
          <nav>
            <ul id="MenuItems">
              <li><a href="index.php">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="error404.php">About</a></li>
              <li><a href="error404.php">Contact</a></li>
              <li><?php
              if (isset($_SESSION['logueado'])&& isset($_SESSION['username'])){
                  $userLogueado=$_SESSION['username'];
                  $userName=$userLogueado['nombre'];
                  echo "<a href='profile.php'>Hola $userName </a>";
              echo "<li><a href='interfaz/logout.php'>Logout</a></li> ";
              }
              else {
                echo "<a href='account.php'>Account</a>";
              }
                  ?>
              </li>
              
            </ul>
          </nav>
          <a href="cart.php?id=<?php echo $idSeleccion;?>&cantidad=<?php echo $cantidad;?>"
            ><img src="images/cart.png" alt="" width="30px" height="30px"
          /><?php
          if (isset($_SESSION['cart'])){
             echo count($_SESSION['cart']);
            }
            else {
              echo "";
            }
               ?></a>
               <a href="interfaz/deletecart.php"><img src="images/delete.png" alt="" width="30px" height="30px"
               /></a> 
          <img
            src="images/menu.png"
            alt=""
            class="menu-icon"
            onclick="menutoggle()"
          />
        </div>
        <div class="row">
          <div class="col-2">
            <h1>
            Pagina  <br />
            No encontrada
            </h1>
            <p>
            La página esta sufriendo anciedad,porfavor vuelva intentarlo <?php if (isset($_SESSION['logueado'])&& isset($_SESSION['username'])){
                  $userLogueado=$_SESSION['username'];
                  $userName=$userLogueado['nombre'];
                  echo " $userName ";
              
              }
              else {
                echo "";
              }
                  ?>
            </p>
            <a href="index.php" class="btn">Volver a donde es &#8594;</a>
          </div>
          <div class="col-2">
            <img src="images/Nofunciona.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
    
   

    <!-- Brands -->

    <div class="brands">
      <div class="small-container">
        <div class="row">
          <div class="col-5">
            <img src="images/logo-godrej.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-oppo.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-paypal.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-philips.png" alt="" />
          </div>
          <div class="col-5">
            <img src="images/logo-coca-cola.png" alt="" />
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
            <h3>Download Our App</h3>
            <p>
              Download App for Android <br />
              and ios mobile phone
            </p>
            <div class="app-logo">
              <img src="images/play-store.png" alt="" />
              <img src="images/app-store.png" alt="" />
            </div>
          </div>
          <div class="footer-col-2">
            <img src="images/logo1.PNG" alt="" />
            <p>
            «Miedo, ira, agresividad, el lado oscuro ellos son. Si algún día rigen tu vida, para siempre tu destino dominarán.»<br />
            (Yoda a Luke Skywalker. STAR WARS, episodio V, El Imperio Contrataca) 
            </p>
          </div>
          <div class="footer-col-3">
            <h3>Useful Links</h3>
            <ul>
              <li>Coupons</li>
              <li>Blog Post</li>
              <li>Return Policy</li>
              <li>Join Affiliate</li>
            </ul>
          </div>

          <div class="footer-col-4">
            <h3>Follow us</h3>
            <ul>
              <li>Facebook</li>
              <li>Twitter</li>
              <li>Instagram</li>
              <li>YouTube</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2020 - introidx</p>
      </div>
    </div>
    <!-- JS for Toggle menu -->
    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>
  </body>
</html>
