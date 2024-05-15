<?php
require_once ("config/ProductsData.php");
print_r($_POST);

$selectedSKUs = $_POST['delete'];
$deleteProducts = new ProductsData();
if (count($selectedSKUs) > 0) {

    if($deleteProducts -> deleteData($selectedSKUs)){
        header("location:viewproduct.php?delete");
        exit();
    }
    }
else {
    header("location:viewproduct.php?error=no_skus_selected");
    exit();
}

?>