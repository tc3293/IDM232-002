<?php

/**
 * get all recipes from the database
 * @return object - mysqli_result
 */
function get_recipes()
{
    global $db_connection;
    $query = 'SELECT * FROM recipes';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

/**
 * Insert a recipe into the database
 * @param  string $recipe_title - title of the recipe
 * * @param  string $image_path - image of the recipe
 * @param  string $ingredients - ingredients of the recipe
 * @param  string $instructions - steps of the recipe
 * @return object - mysqli_result
 */
function add_recipe($recipe_title, $image_path, $ingredients, $instructions)
{
    global $db_connection;
    $query = 'INSERT INTO recipes';
    $query .= ' (recipe_title, image_path, ingredients, instructions)';
    $query .= " VALUES ('$recipe_title', '$image_path', '$ingredients', '$instructions')";

    $result = mysqli_query($db_connection, $query);
    return $result;
}