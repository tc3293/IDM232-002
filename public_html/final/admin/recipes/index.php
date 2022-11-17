<?php
include_once __DIR__ . '/../../app.php';
$page_title = 'Home';
include_once __DIR__ . '/../../_components/header.php';
?>
<?php include_once __DIR__ . '/../../_components/navbar.php'; 
$recipes = get_recipes();
?>

<main class="main">
    <div>
        <?php $title = 'Admin';?>
        <h1 class="text-center text-white"><?php echo $title; ?></h1>
    </div>

  <div class="mx-auto my-16 max-w-7xl px-4">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
        <div class="text-white">
          <h1>Recipes</h1>
          <p>A list of all the recipes including their title, ingredients and steps</p>
          <?php
            // If error query param exist, show error message
              if (isset($_GET['error'])) {
                  echo '<p class="text-red-500">' . $_GET['error'] . '</p>';
              }
          ?>
        </div>
        <div>
        <button class="btn btn-primary">
          <a class="text-white" href="<?php echo site_url(); ?>/admin/recipes/create.php" style="text-decoration: none;">Create Recipe</a>
        </button>
        </div>
      </div>
      <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
              <?php include __DIR__ . '/../../_components/table-recipes.php'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


<?php include_once __DIR__ . '/../../_components/footer.php';