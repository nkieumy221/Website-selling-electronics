<?php 
    include('lib/session.php'); 
    Session::init();
?>
<?php 
    include_once('lib/database.php');
    include_once('helpers/format.php');

    spl_autoload_register(function ($className) {
        include_once("classes/" .$className. ".php");
    });
    
    $db = new Database();
    $fm = new Format();
    $cartClass = new cart();
    $userClass = new user();
    $categoryClass = new category();
    $productClass = new product();
    $customerClass = new customer();
    $recommendation = new recommendation();
    $commentClass = new comment();
?>