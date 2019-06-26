<?php
    //Set page variables
    $title = "Opret bruger";
    $desc = "Opret en bruger på FancyClothes.dk";

    require "header.php";
?>

<div class="createArticle container">

        <h3 class="center errorMsg">Opret Bruger:</h3>
        <form action="assets/insertUser.php" method="post">
            <div>
                <label for="formNewUserName">Bruger Navn</label>
                <input type="text" id="formNewUserName" name="formNewUserName" placeholder="Intast brugernavn..." required>
            </div>
            <div>
                <label for="formPassword1">Bruger Kode</label>
                <input type="password" id="formPassword1" name="formPassword1" placeholder="Intast kode..." required>
            </div>
            <div>
                <label for="formPassword2">Bekræft Kode</label>
                <input type="password" id="formPassword2" name="formPassword2" placeholder="Bekræft kode..." required>
            </div>
            <div>
                <input type="submit" value="Opret" name="value">
            </div>
        </form>

    </div>

<?php
    require "footer.php";