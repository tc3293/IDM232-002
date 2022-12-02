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
    $query = 'SELECT * FROM recipes LIMIT 6';
    $result = mysqli_query($db_connection, $query);
?>

<br><br><br>
<div class="container">
    <h2 class="text-center">Recipe List</h2>
<br><br><br>

<?php include __DIR__ . '/_components/recipe_card.php'; ?>

  <!---  <a href="index.php"> < EDIT THIS HREF TO direct to recipe page 
    <div class="box-3 float-container">
        <img src="images/taiyaki.png" alt="dora" class="img-resp img-curve">
        <h3 class="float-text text-inside">Taiyaki</h3>
        </a>
    </div>  ---->

    </div></div>
    <br><br><br>
<div class="view text-mid">
      <ul>
        <li>
          <a href="<?php echo site_url(); ?>/recipelist.php">View More Recipes</a>
</li>
        </ul>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div id="about">
    <div class="container">
        <div class="row">
            <div class="about-col-1">
                <h1 class="sub-title">Dorayaki</h1>
                <img src= "images/dorayaki.png" class="dora">
            </div>
            <div class="about-col-2">
            <h2>Ingredients</h2>
            <ul class="list">
                <li>4 large eggs (50 g each w/o shell)</li>
                <li>⅔ cup sugar (⅔ cup + ½ Tbsp to be precise, for 6 Dorayaki)</li>
                <li>2 Tbsp honey</li>
                <li>1⅓ cup all-purpose flour (plain flour)</li>
                <li>1 tsp baking powder</li>
                <li>1-2 Tbsp water</li>
                <li>neutral-flavored oil (vegetable, rice bran, canola, etc.)</li>
                <li>1.1 lb sweet red bean paste or white cream (anko)</li>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <div class="about-col-2">
            <h2>Instructions</h2>
            <ul class="list">
                <li>Gather all the ingredients.</li>
                <li>In a large bowl, combine the eggs, sugar, and honey. Whisk well until the mixture becomes fluffy.</li>
                <li>Sift the flour and baking powder into the bowl with the egg mixture and mix until combined. Put the bowl in the refrigerator to rest the batter for 15 minutes.</li>
                <li>After resting, the batter should be relaxed and slightly smoother. Now, stir in half of the water and check the consistency. Add more of the measured water until you reach a pancake batter consistency. The consistency should be similar to pancake batter. Depending on the size of the eggs and how accurate your flour measurement is, the water amount may vary.</li>
                <li>Heat a large nonstick frying pan over low. It's best to take your time and heat the pan slowly; I keep the heat on the lowest setting for 5 minutes. When the pan is thoroughly heated (no hot spots), increase the heat to medium low. Dip a paper towel in the vegetable oil and coat the bottom of the pan with the oil. Then, use another paper towel to remove the oil completely (that's the key to evenly golden brown Dorayaki pancakes). With a ladle or a small measuring cup (I use a 4 Tbsp measuring cup), pour 3 Tbsp of the batter from 3 inches (8 cm) above the pan to create a pancake that's 3 inches (8 cm) in diameter. Cook one pancake at a time.</li>
                <li>When you see the surface of the batter starting to bubble, flip the pancake over and cook the other side. (With my stove and frying pan, it takes 1 minute and 15-30 seconds to cook one side and 20-30 seconds for the other side.) When done, transfer it to a plate and cover it with a damp towel to prevent it from drying out. Grease the pan between batches, as needed. Continue making the rest of the pancakes (you can make about 12 pancakes).</li>
                <li>Assemble the Dorayaki by making a sandwich using two pancakes and the sweet red bean paste as filling. Put more red bean paste in the center so the shape of the Dorayaki will be curved (the middle part should be thicker than the edges). Wrap the Dorayaki with plastic wrap until ready to serve.</li>
                <li>The leftovers can be wrapped in plastic and stored in a cool place for 2 days. They also can be put in a freezer bag and stored in the freezer for a month.</li>
            </ul>
       </div>


       <br><br><br><br><br><br><br>
      

        </div>
    </div>
</div>

<?php include_once __DIR__ . '/_components/footer.php';
?>