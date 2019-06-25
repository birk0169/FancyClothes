    <?php require "header.php";?>
    <div class="container">
        <ul class="slider" id="slider">
            <li><img src="img/slide1.jpg" alt=""></li>
            <li><img src="img/slide2.jpg" alt=""></li>
            <li><img src="img/slide3.jpg" alt=""></li>
        </ul>
    </div>
    <hr class="hide400">
    <h1 class="tagline">FancyClothes.DK - tøj, kvalitet, simpelt!</h1>
    <hr>

    <div class="createArticle container">

        <h3 class="center errorMsg">Opret ny vare:</h3>
        <form action="includes/insertArticle.php" method="post">
            <div>
                <label for="imgSrc">Billede</label>
                <input type="text" id="imgSrc" name="imgSrc" placeholder="Vælg billede" required>
            </div>
            <div>
                <label for="imgAlt">Alt tekst</label>
                <input type="text" id="imgAlt" name="imgAlt" placeholder="Billedets alttekst..." required>
            </div>
            <div>
                <label for="heading">Overskrift</label>
                <input type="text" id="heading" name="heading" placeholder="Overskrift..." required>
            </div>
            <div>
                <label for="content">Brødtekst</label>
                <textarea name="content" id="content" cols="30" rows="10" placeholder="Brødtekst..."></textarea>
            </div>
            <div>
                <label for="stars">Antal stjerner</label>
                <select name="stars" id="stars">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="category">Kategori</label>
                <select name="category" id="category" required>
                    <option value="jakker">Jakker</option>
                    <option value="bukser">Bukser</option>
                    <option value="skjorter">Skjorter</option>
                    <option value="strik">Strik</option>
                    <option value="tshirts">T-shirts og tanktops</option>
                    <option value="tasker">Tasker</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Opret" name="value">
            </div>
        </form>

    </div>
    </div>
    <main class="container">
        <aside>
            <div class="categories">
                <div class="catTop">
                    <h4>Kategorier:</h4>
                </div>
                <div class="catMain">
                    <ul>
                        <li><a href="#">Jakker</a></li>
                        <li><a href="#">Bukser</a></li>
                        <li><a href="#">Skjorter</a></li>
                        <li><a href="#">Strik</a></li>
                        <li><a href="#">T-shirts & Tank tops</a></li>
                        <li><a href="#">Tasker</a></li>
                    </ul>
                </div>
            </div>

            <div class="newsletter">
                <div class="newsTop">
                    <h4>Tilmeld nyhedsbrev</h4>
                </div>
                <div class="newsMain">
                    <form action="">
                        <input type="text" placeholder="Navn">
                        <input type="email" placeholder="Email">
                </div>
                <div class="newsBottom">
                    <input type="submit" value="Tilmeld">
                    </form>
                </div>
            </div>
        </aside>
        <div class="products">
            <h3>INSPIRATION</h3>
            <hr>
            <div class="inspiration">
                <div class="catMen">
                    <img src="img/kategoriHerre.jpg" alt="">
                    <h5>Herretøj</h5>
                    <div class="action">Lær mere</div>
                </div>
                <div class="catWomen">
                    <img src="img/kategoriKvinde.jpg" alt="">
                    <h5>Kvindetøj</h5>
                    <div class="action">Lær mere</div>
                </div>
            </div>
            <div class="frontProducts">
                <article>
                    <img src="img/produkt1.jpg" alt="Lækker læderjakke>">
                    <div class="info">
                        <h3>Lækker læderjakke</h3>
                        <div class="stars">
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                        </div>
                    </div>
                    <div class="description">
                        <div class="published">
                            Oprettet: Mandag d. 24/6-2019 af Mark
                        </div>
                        <p>Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.
                            <a href="#">Læs mere...</a></p>
                        <!-- Mulighed for sletning herunder -->
                    </div>
                </article>
                <article>
                    <img src="img/produkt1.jpg" alt="Lækker læderjakke>">
                    <div class="info">
                        <h3>Lækker læderjakke</h3>
                        <div class="stars">
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                        </div>
                    </div>
                    <div class="description">
                        <div class="published">
                            Oprettet: Mandag d. 24/6-2019 af Mark
                        </div>
                        <p>Odd Molly er et svensk luksusbrand stiftet af Per Holknekt – tidligere pro skateboarder. Verdenseliten tiltrak dengang mange kvindelige fans, og de fleste af dem gjorde, hvad de kunne for at få fyrenes opmærksomhed. Alle undtagen én. Hun forblev tro mod sig selv - en unik, selvsikker og uforanderlig skønhed - hende, alle fyrene ville ha'. En Odd Molly! - som ikke er et koncept, men autentisk! – et brand, hvis kollektioner er vildt smukke og inderlige, som der altid vil være brug for - dengang, nu, såvel som i fremtiden.
                            <a href="#">Læs mere...</a></p>
                        <!-- Mulighed for sletning herunder -->
                    </div>
                </article>
            </div>
        </div>
    </main>
    <?php
    require "footer.php";
