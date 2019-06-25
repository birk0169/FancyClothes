<?php 
    //Start session
    session_start();

    if($_POST['heading']){
        try{
            $heading = $_POST['heading'];
            $imgSrc;
            $imgAlt  = $_POST['imgAlt'];
            $time = time();
            $content  = $_POST['content'];
            $author = $_SESSION['id'];
            $stars  = $_POST['stars'];
            $category  = $_POST['category'];

            //IMAGE HANDLING
                //Path to img folder
                $target_dir = "../img/";

                //Takes input image from FILES
                $target_file = $target_dir . basename($_FILES["imgSrc"]["name"]);
                //print_r($_FILES);

                //Ok to upload variable
                $uploadOk = 1;

                //Return extension : e.g (test.txt = txt, site.html = html)
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                //Test if submitted and get image size
                if(isset($_POST['submit'])){
                    $check = getimagesize($_FILES['imgSrc']['tmp_name']);
                    if($check !== false){
                        $uploadOk = 1;
                    } else{
                        $uploadOk = 0;
                    }
                }
                
                //Check if image Already exists
                if(file_exists($target_file)){
                    $uploadOk = 0;
                }

                //Check if file size is too big
                if($_FILES['imgSrc']['size'] > 500000){
                    $uploadOk = 0;
                }

                //Check if approved file type
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $uploadOk = 0;
                }

                //Check if Passed and move uploaded file
                if($uploadOk != 0){
                    if(move_uploaded_file($_FILES['imgSrc']['tmp_name'],$target_file)){
                        $imgSrc = $_FILES['imgSrc']['name'];
                    }
                }

            //Database connection
            require_once "connect.php";

            //Prepare statement
            $statement = $dbh->prepare("INSERT INTO products (heading, imgSrc, imgAlt, productTimestamp, content, authorId, stars, productCategory) values(?, ?, ?, ?, ?, ?, ?, ?)");
            //Bind Parameters
            $statement->bindParam(1, $heading);
            $statement->bindParam(2, $imgSrc);
            $statement->bindParam(3, $imgAlt);
            $statement->bindParam(4, $time);
            $statement->bindParam(5, $content);
            $statement->bindParam(6, $author);
            $statement->bindParam(7, $stars);
            $statement->bindParam(8, $category);
            //Execute statement
            $statement->execute();
            //Return user to the front page
            header('location:../index.php'); 



        } catch(PDOException $e){
            echo "An exception has occured: " . $e->getMessage();
        }
    } else{
        //Return user to the front page
        header('location:../index.php');   
    }
?>