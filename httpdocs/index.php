<!DOCTYPE html>
<?php
require __DIR__ . '/../vendor/autoload.php';

session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Pokemon Test - Shakespearean description</title>
        <link href="icon_pms.ico" rel="shortcut icon">
        <meta name="author" content="Ioser Esoft Development">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!--<script src="style/js/jquery-3.5.1.slim.min.js"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <!--<script src="style/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="js/pmsGuiApp.js.php"></script> 
        <link rel="stylesheet" href="style/custom_styles.css">
    </head>
<body onload="initApp()">
    <header id="divHeader">
            <?php
            //include __DIR__ . "/../views/header.php";
            ?>
    </header>
    <div class="container-fluid" style="padding-bottom: 50px;">
        <div class="row">
        <?php
            if (isset($_SESSION["accountId"]))
            {
                include __DIR__ . "/../views/navigation.php";
                include __DIR__ . "/../views/main.php";
            } else
            {
                include __DIR__ . "/../views/loginform.php";
            }
        
        ?>
        </div>
    </div>
    <footer class="footer-content">
        All rights reserved <?php echo date("Y");?> <strong>, Ioser Esoft Development SRL</strong>
    </footer>
    
</body>
</html>
