<?php
$search_value = '';
// If Search exist, make that the search value
if (isset($_GET['search'])) {
    $search_value = $_GET['search'];
}
?>
<form class="searchbar text-center" action="<?php echo site_url(); ?>/admin/search" method="GET" class="block">
<div class="container">
  <label for=""></label> 
  <input class="border-black border-2" type="text" name="search" placeholder="Searchs for Recipe" value="<?php echo $search_value; ?>">
  <input type="submit" value="Search" class="btn btn-primary">
</form>
</div>



<!--<label for=""Search</label> -->