<?php 
    //Connect to database
    require "connect.php";

    //Pull data from products table
    $statement = $dbh->prepare("SELECT products.*, users.userName FROM products 
    JOIN users ON products.authorId = users.userId ORDER BY productId ASC");
    $statement->execute();

    //print_r($row = $statement->fetch(PDO::FETCH_ASSOC));

    //While there is rows remaining in $statement the loop continues
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $emptyStars = 5 - $row['stars'];
        ?>

        <article>
            <img src="img/<?php echo $row['imgSrc'] ?>" alt="<?php echo $row['imgAlt'] ?>">
            <div class="info">
                <h3><?php echo $row['heading'] ?></h3>
                <div class="stars">
                    <?php
                        for($x = 1; $x <= $row['stars']; $x++){
                            echo '<i class="fa fa-star" aria-hidden="true"></i>';
                        }
                        for($x = 1; $x <= $emptyStars; $x++){
                            echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                        }
                    ?>
                    
                </div>
            </div>
            <div class="description">
                <div class="published">
                    <?php echo date("Y-m-d",  $row['productTimestamp']) ?>
                </div>
                <p><?php echo $row['content'] ?><a href="#">Læs mere...</a></p>
                <!-- Muligheder for sletning her -->
            </div>
        </article>

        <?php
    }

    //End connection
    $dbh = null;

?>