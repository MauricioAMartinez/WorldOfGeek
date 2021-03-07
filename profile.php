<?php
//Generar Conexion 
require('interfaz/db.php');
$pdo =getPdo();
session_start();

//Llamar la base 
$sql = "SELECT * FROM usuarios ";
$consulta = $pdo->prepare($sql);
$consulta->execute();
$usuarios=$consulta->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
              <li><a href="">About</a></li>
              <li><a href="">Contact</a></li>
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
    <!-- Navigation ends here -->
    <!-- Account Page -->

   
            
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="./images/geek.jpg" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                    <?php
                       foreach ($usuarios as $usuario) { ?>

                        <h4>
                        <?php echo $usuario['nombre'] ?></h4>
                        <small><cite title="San Francisco, USA">Bogota, Colombia <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $usuario['Email'] ?>
                            <br />
                            <i class="glyphicon glyphicon-user"></i><?php echo $usuario['username'] ?>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="select" class="btn btn-primary">
                            <a href="interfaz/deleteaccount.php?id=<?php echo $usuario['id'];?>&nombre=<?php echo $usuario['nombre'];?>&email=<?php echo $usuario['Email'];?>"><option value="">Eliminar Cuenta</option></button></a>
                                
                                <button type="select" class="btn btn-primary">
                                <a href="interfaz/edicion.php"><option value="">Editar Datos</option></button></a>
                                
                            
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
