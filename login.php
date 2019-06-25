<?php
    ob_start();

    //Start Session
    session_start();

    //Connect to database
    require "assets/connect.php";

    //Page variables
    //$title = "login";
    //$desc = "Fancy Clothes Login";

    //Catch user login data
    $formUsername = $_POST['formUsername'];
    $formPassword = $_POST['formPassword'];

    //Get user with mysql code
    $statement = $dbh->prepare("SELECT *FROM users WHERE userName = ? AND userPassword = ?");

    //Bind parameters
    $statement->bindParam(1, $formUsername);
    $statement->bindParam(2, $formPassword);

    //Execute statement
    $statement->execute();

    //Check if login is valid
    if(empty($row = $statement->fetch())){
        //invalid login
        echo '<p class="errorMsg">Incorrect username or/and password!</p>';
        header('Refresh:5; url=index.php', true, 303);
    } else{
        //Start session
        // if()
        $_SESSION['username'] = $row['userName'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        $_SESSION['id'] = $row['userId'];
        header('location: index.php');
    }


    //Close database connection
    $dbh = null;
?>