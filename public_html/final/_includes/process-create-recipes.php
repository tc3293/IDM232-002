<?php
include __DIR__ . '/../app.php';

if (!$_POST) {
    die('Unauthorized');
}

// Store $_POST data to variables for readability
$recipe_title = $_POST['recipe_title'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];

$result = add_recipe(
    $recipe_title,
    $ingredients,
    $instructions
);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/admin/recipes');
} else {
    $error_message = 'Sorry there was an error creating the recipe';
    redirect_to('/admin/recipes?error=' . $error_message);
}