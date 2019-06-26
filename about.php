<?php
    //Set page variables
    $title = "Om os";
    $desc = "Om FancyClothes.dk";

    //Load header
    require "header.php";

?>
    <!-- js slideshow--> 
<div class="container slideshow-container">
    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img/slide1.jpg" style="width:100%">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img/slide2.jpg" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="img/slide3.jpg" style="width:100%">
        <div class="text">Caption Three</div>
    </div>
</div>
<main class="container">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis atque, doloremque cum hic quisquam iste dolorum eum exercitationem aspernatur? Dignissimos labore tempora at vero possimus illum recusandae delectus nobis sint!</p>
</main>
<!--<script src="js/aboutSlide.js"></script>-->
<?php
    //Load Footer
    require "footer.php";