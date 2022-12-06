<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Home';
include_once __DIR__ . '/../../_components/header.php';
?>
<?php include_once __DIR__ . '/../../_components/adminabar.php'; ?>

<br><br>
<!-- <main class="main"> -->
    <div>
        <?php $title = 'Create Recipes';?>
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
                    <h1></h1>
                </div>
            </div>
            <div>
                <div>
                    <div>
                    <div>
                        <form action="<?php echo site_url(); ?>/_includes/process-create-recipes.php" method="POST">
                        <br><br>
                            <div class="block">
                                <label for="">Recipe Title</label> <pre></pre>
                                <input type="text" name="recipe_title" size="40" placeholder="Type your Recipe">
                            </div>
                            <br>
                            <div class="block">
                                <label for="">Images</label> <pre></pre>
                                <input type="text" name="image_path"  size="40" placeholder="/dist/images/IMAGE NAME HERE.png">
                            </div>
                            <br>
                            <div class="block">
                                <label for="">Ingredients</label> <pre></pre>
                                <textarea class="js-tinymce" name="ingredients" id="" cols="45" rows="10" placeholder="Type your Ingredients"></textarea>
                            </div>
                            <br>
                            <div class="block">
                                <label for="">Instructions</label>
                                <textarea class="js-tinymce" name="instructions" id="" cols="30" rows="10"></textarea>
                            </div>
                            <br>
                            <input class="bto bto-mary" type="submit" value="submit">
                            
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    </div>

    <br><br>
<!-- </main> -->
<?php include_once __DIR__ . '/../../_components/footer.php';