<?php
    session_start();

    //End session
    session_destroy();

    //Returns user to front page | may be updated later
    header("location: index.php");

?>