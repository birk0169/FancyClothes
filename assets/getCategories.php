<?php 
    //Connect to database
    require "connect.php";

    //Pull data from products table
    $statement = $dbh->prepare("SELECT * FROM categories ORDER BY categoryId ASC");
    $statement->execute();

    //While there is rows remaining in the $statement the loop continues
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        echo '<option value="'.$row['categoryName'].'">'.$row['categoryName'].'</option>';
    }

    //Close connection
    $dbh = null;
?>