<?php
include_once __DIR__ . '/app.php';
$page_title = 'Home';
include_once __DIR__ . '/_components/header.php';
?>
<?php include_once __DIR__ . '/_components/navbar.php';
?>

<?php include_once __DIR__ . '/_components/search-bar.php';
$recipes = get_recipes();
?>
<?php
    // get recipes data from database
    $query = 'SELECT * FROM recipes LIMIT 6'; //fix out how to do limit php on home page, need help
    $result = mysqli_query($db_connection, $query);
?>

<br><br><br>
<div class="container">
    <h2 class="text-center">Recipe List</h2>
<br><br><br>

<?php include __DIR__ . '/_components/recipe_card.php'; ?>

 

<?php include_once __DIR__ . '/_components/footer.php';
?>




    <!-- <a href="index.php">  -->
        <!--EDIT THIS HREF TO direct to recipe page-->
    <!-- <div class="box-3 float-container">
        <img src="images/taiyaki.png" alt="dora" class="img-resp img-curve">
        <h3 class="float-text text-inside">Taiyaki</h3>
        </a>
    </div> -->

  