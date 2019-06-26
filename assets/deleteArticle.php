<?php 

    //Url of previous page
    //$url = $_GET['url'];

    //Add function to delete image

    //Start session
    session_start();

    //Connect to the database
    require "connect.php";

    if(isset($_GET['productId'])){
        //Set variable
        $productId = $_GET['productId'];

        //Pull data from products table
        $statement = $dbh->prepare("SELECT * FROM products where productId = ? LIMIT 1");
        $statement->bindParam(1, $productId);
        $statement->execute();
        $row = $statement->fetch();

        //Check if logged in
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            //Access Level
            if($_SESSION['accessLevel'] == 1){
                //Level 1 users can delete any article
                $statement = $dbh->prepare("DELETE FROM products WHERE productId = ? LIMIT 1");
                $statement-> bindParam(1, $productId, PDO::PARAM_INT);
                $statement->execute();
                echo $productId;
                echo "<p>User level 1</p>";


            } else if($_SESSION['accessLevel'] == 2 && $_SESSION['id'] == $row['authorId']){
                //Level 2 users can only delete their own articles
                $statement = $dbh->prepare("DELETE FROM products WHERE productId = ? LIMIT 1");
                $statement-> bindParam(1, $productId, PDO::PARAM_INT);
                $statement->execute();
                echo "<p>User level 2</p>";
            }
            else{
                echo "<p>User level 3</p>";  
            }
        }

    }
    //return suer to page
    header("location: ../index.php")
    

?>