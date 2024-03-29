<?php
    //Start session
    session_start();

    //Check if title and desc variable is set
    if(!isset($title)){
        $title = "none";
    }
    if(!isset($desc)){
        $desc = "none";
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="img/homeIcon.png"/>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?> | FancyClothes.dk</title>
    <meta name="description" content="<?php echo $desc ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Oswald" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/slider.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="top container">
        <div class="language">
            <div class="flag">
                <img src="img/ikon.png" alt="Dansk ikon">
                <span>Dansk</span>
            </div>
            <span>DKK</span>
        </div>
        <div class="search">
            <input type="text" placeholder="Indtast søgning"><input type="submit" value="Søg">
        </div>
    </div>
    <hr>
    <div class="container home">
        <a href="index.php"><img src="img/homeIcon.png" alt="Forside ikon"></a>
        <!-- Velkomstbesked -->
        <h2>
            <?php
            if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
                echo $_SESSION['username'];
            }
            ?>
        </h2>
    </div>
    <hr>
    <div class="container navbar">
        <nav>
            <ul>
                <li class="<?php echo $title === "Forside" ? "active" : "" ?>"><a href="index.php">Forside</a></li>
                <li class="<?php echo $title === "Produkter" ? "active" : "" ?>"><a href="products.php">Produkter</a></li>
                <li class="<?php echo $title === "Nyheder" ? "active" : "" ?>"><a href="news.php">Nyheder</a></li>
                <li class="<?php echo $title === "Handelsbetingelser" ? "active" : "" ?>"><a href="conditions.php">Handelsbetingelser</a></li>
                <li class="<?php echo $title === "Om os" ? "active" : "" ?>"><a href="about.php">Om os</a></li>
                <?php
                    if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
                        echo "<li><a href='logout.php' class='Logout'>Log ud</a></li>";
                    }
                    else{
                        echo "<li><a href='#' class='loginBtn'>Log ind</a></li>";
                        //echo "<li class=' " . $title === "Opret bruger" ? "active" : "" . " '><a href='register.php'>Opret bruger</a></li>";
                        echo "<li class='";
                        echo $title === "Opret bruger" ? "active" : "" ;
                        echo "'><a href='register.php'>Opret bruger</a></li>";
                    }
                
                ?>
            </ul>
        </nav>
        <div class="basket">
            <div class="basketContent">
                <p>Din indkøbskurv er tom</p>
            </div>
            <div class="shopIcon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <!-- Login -->
    <div class="login container">
        <form action="login.php" method="post">
            <label for="formUsername">Bruger:</label>
            <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
            <label for="formPassword">Password:</label>
            <input type="password" id="formPassword" name="formPassword" placeholder="Password" required>
            <input type="submit" value="Log ind">
        </form>
        <a id="newUser" href="register.php">Ny bruger?</a>
    </div>
    <hr>
    <?php
        if(isset($_GET['msg'])){
            echo '<h3 class="errorMsg center">' . $_GET['msg'] . '</h3>';
        }