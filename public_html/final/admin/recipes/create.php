<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Home';
include_once __DIR__ . '/../../_components/header.php';
?>
<?php include_once __DIR__ . '/../../_components/adminabar.php'; ?>

<br><br>
<!-- <main class="main"> -->
    <div>
        <?php $title = 'Create A Recipes';?>
        <h1><?php echo $title; ?></h1>
    </div>

    <?php
    // get recipes data from database
    $query = 'SELECT * FROM recipes';
    $result = mysqli_query($db_connection, $query);

    ?>

    <div>
        <div>
            <div>
                <div>
                    <h1>Create recipe</h1>
                </div>
            </div>
            <div>
                <div>
                    <div>
                    <div>
                        <form action="<?php echo site_url(); ?>/_includes/process-create-recipes.php" method="POST">
                            <div class="block">
                                <label for="">Recipe Title</label>
                                <input type="text" name="recipe_title">
                            </div>
                            <div class="block">
                                <label for="">Images</label>
                                <input type="text" name="image_path">
                            </div>
                            <div class="block">
                                <label for="">Ingredients</label>
                                <textarea class="js-tinymce" name="ingredients" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="block">
                                <label for="">Instructions</label>
                                <textarea class="js-tinymce" name="instructions" id="" cols="30" rows="10"></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="submit">
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

<!-- </main> -->
<?php include_once __DIR__ . '/../../_components/footer.php';