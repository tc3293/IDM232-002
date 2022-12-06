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



 
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
<br>
<?php include_once __DIR__ . '/_components/footer.php'; ?>