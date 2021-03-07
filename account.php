<?php
//Generar Conexion 
session_start();
require('interfaz/db.php');
$pdo =getPdo();


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Products - Red store</title>
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
              <img src="images/logo1.png" alt="" width="75" 
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
                echo "<a href='interfaz/account.php'>Account</a>";
              }
                  ?>
              </li>
              
            </ul>
          </nav>
          <a href="cart.php?id=<?php echo $idSeleccion;?>&cantidad=<?php echo $cantidad;?>"
            ><img src="images/cart.png" alt="" width="30px" height="30px"
          />
          <?php
          if (isset($_SESSION['cart'])){
             echo count($_SESSION['cart']);
            }
            else {
              echo "";
            }
               ?>
               </a><a href="interfaz/deletecart.php"><img src="images/delete.png" alt="" width="30px" height="30px"
               /></a>
          <img
            src="images/menu.png"
            alt=""
            class="menu-icon"
            onclick="menutoggle()"
          />
        </div>
    <!-- Navigation ends here -->
    <!-- Account Page -->

    <div class="account-page">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="images/yu.png" width="80%" />
          </div>
          <div class="col-2">
            <div class="form-container">
              <div class="form-btn">
                <span onclick="login()">Login</span>
                <span onclick="register()">Register</span>
                <hr id="indicator" />
              </div>
              <form action="interfaz/login.php" method="POST" id="LoginForm">
                <input name ="username" type="text" placeholder="Username" />
                <input name ="password" type="password" placeholder="Password" />

                <button type="submit" class="btn">Login</button>
                <a href="formulariocontr.php">Forgot Password</a>
              </form>
              <form action="interfaz/registro.php" method="POST" id="RegForm">
                <input name="name" type="text" placeholder="Name" />
                <input name ="username" type="text" placeholder="Username" />
                <input name ="email" type="email" placeholder="Email" />
                <input name ="password" type="password" placeholder="Password" />

                <button type="submit" class="btn">Register</button>
              </form>
            </div>
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
    <!-- 
js for toggle form -->
    <script>
      var LoginForm = document.getElementById("LoginForm");
      var RegForm = document.getElementById("RegForm");
      var indicator = document.getElementById("indicator");

      function register() {
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(100px)";
      }

      function login() {
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        indicator.style.transform = "translateX(0px)";
      }
    </script>
  </body>
</html>
