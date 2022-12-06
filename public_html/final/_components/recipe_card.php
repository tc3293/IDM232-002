<?php
if (!isset($recipes)) {
    echo '$recipes variable is not defined. Please check the code.';
}
?>
       
<?php
    $site_url = site_url();
    while ($recipe = mysqli_fetch_array($recipes)) {
        echo "
        <a class='box-recipes-link' href='{$site_url}/recipe-detail.php?id={$recipe['id']}'>
            <div class='box-3 float-container'>
                
                    
                        <img class='img-resp img-curve' src='{$site_url}/{$recipe['image_path']}'>
                        <h3 class='float-text text-inside'>{$recipe['recipe_title']}</h3>
                    
                
            </div>
            </a>
        ";
    }
?>