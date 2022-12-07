<?php
include_once __DIR__ . '/app.php';
$page_title = 'Home';
include_once __DIR__ . '/_components/header.php';
?>
<?php include_once __DIR__ . '/_components/navbar.php';
?>

<?php include_once __DIR__ . '/_components/search-bar.php';
 //**$recipes = get_recipes();* ///* this mean get all recipe, if not getting all and delete this */
?>

<?php
    // get recipes data from database
    $query = 'SELECT * FROM recipes LIMIT 6'; //fix out how to do limit php on home page, need help
    $recipes= mysqli_query($db_connection, $query); ///RENAME FROM recipe_card.php
?>

<br><br><br>
<section id="example" class="container-case container">
    <div class="script-1">
                <img src="/final/dist/images/cover.png">

        </div>
</section>
</div>


<br> <br><br>



<div class="container">
    <h2 class="text-center">Popular</h2>
<br><br><br>

<?php include __DIR__ . '/_components/recipe_card.php'; ?>

 


 
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
<br>
<?php include_once __DIR__ . '/_components/footer.php'; ?>