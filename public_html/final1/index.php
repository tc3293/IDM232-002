<?php include('component-user/header.php')?>


    <!--Search Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Recipe" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Search Ends Here -->

    <!-- Category Starts Here -->
      <!-- <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Recipe</h2>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/dorared.png" alt="Dora" class="img-responsive img-curve">

                <h3 class="float-text text-white">Dora</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/Dango3.png" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Dango</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/taiyaki2.png" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Taiyaki</h3>
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section> 
   ---- Category Section Ends Here -->

    <!--MenuStarts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Recipe Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dango.png" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dango.png" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dango.png" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dango.png" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dango.png" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/dango.png" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">View Recipe</a>
                </div>
            </div>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!--  Menu  Ends Here -->


<?php include('component-user/footer.php')?>

   