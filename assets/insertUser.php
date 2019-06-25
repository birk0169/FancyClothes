<?php
    ob_start();

    //If logged in return user to front page
    if(isset($_SESSION['username'])){
        header("location: index.php");
    }

    //Save data from post in variables
    $fromUsername = $_POST['formNewUserName'];
    $formPassword1 = $_POST['formPassword1'];
    $formPassword2 = $_POST['formPassword2'];

    //Connect to database
    require "connect.php";

    //check database for any existing users who has the same username
    $statement = $dbh->prepare("SELECT * FROM users WHERE userName = ?");
    $statement->bindParam(1, $fromUsername);
    $statement->execute();

    if($row = $statement->fetch()){
        //Username is already in use
        echo "<p class='errorMsg'>ERROR - A user is already using that username!</p>";
        //For later updates make it so that it returns to the register page with information about what went wrong using GET
    } else if($formPassword1 != $formPassword2){
        //Password not confirmed
        echo "<p class='errorMsg'>ERROR - Password not confirmed!</p>";
    } else{
        //Passed - Create new user
        echo "<p class='errorMsg'>ERROR - Password not confirmed!</p>";

        //Prepare statement
        $statement = $dbh->prepare("INSERT INTO users(userName, userPassword) VALUES(?, ?)");

        //Hash password
        $hashedPassword = password_hash($formPassword1, PASSWORD_DEFAULT);

        //Bind parameters
        $statement->bindParam(1, $fromUsername);
        $statement->bindParam(2, $hashedPassword);

        $statement->execute();

        header('location:../index.php');


    }

?>