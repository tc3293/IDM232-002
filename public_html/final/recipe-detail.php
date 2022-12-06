<?php
// Make sure the path is correct for each include on this page. Delete this comment once done
include_once __DIR__ . '/app.php';

// get recipes data from database
$query = "SELECT * FROM recipes WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $recipe variable;
    $recipe = mysqli_fetch_assoc($result);
} else {
    $error_message = 'Recipe does not exist';
    // redirect_to('/admin/recipes?error=' . $error_message);
}


$page_title = $recipe['recipe_title'];
include_once __DIR__ . '/_components/header.php';
?>
<?php include_once __DIR__ . '/_components/navbar.php'; 
// $recipes = get_recipes();
?>


   
          
<?php
    $site_url = site_url();
        echo "
        <main class='main'>
        <div class='container text-white'>
            <h1 class='text-center'>{$recipe['recipe_title']}</h1>
            <div class='recipe-detail-image'>
                <img src='{$site_url}{$recipe['image_path']}' class='detail-page-image-1'>
            </div>
            <div class='recipe-detail-ingredients'>
                <h2>Ingredients</h2>
                <div>{$recipe['ingredients']}</div>
            </div>
            <div class='recipe-detail-steps'>
                <h2>Instructions</h2>
                <p>{$recipe['instructions']}</p>
            </div>
        </div>
    </main>
        ";
    
?>

<?php include_once __DIR__ . '/_components/footer.php'; ?>
