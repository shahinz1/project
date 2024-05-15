<?php
require_once ('config/ProductsData.php');
$adding = new ProductsData();
if(isset($_POST['submit-form'])) {
    if ($_POST['productType'] == 'Furniture') {
        if (isset($_POST['height']) && isset($_POST['width']) && isset($_POST['length'])) {
            $_POST['AttributeValue'] = sprintf("%sX%sX%s", $_POST['height'], $_POST['width'], $_POST['length']);
        } else {
            echo "Please submit required data.";
        }
    }

    if (empty($_POST['SKU']) || empty($_POST['name']) || empty($_POST['price'])) {
        echo "Please submit required data";

    } elseif ($_POST['price'] <= 0 || is_numeric($_POST['name'])) {
        echo "Please provide the data of indicated type";

    } elseif (empty($_POST['productType']) || empty($_POST['AttributeValue'])) {
        echo "Please provide the data of indicated type , Choose product from menu";

    }
    else {
        $sku = $_POST['SKU'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $productType = $_POST['productType'];
        $attributeValue = $_POST['AttributeValue'];

        $adding->SetSku($sku);
        $adding->SetName($name);
        $adding->SetPrice($price);
        $adding->SetproductType($productType);
        $adding->SetAttributeValue($attributeValue);

        $result = $adding->insertData();
        echo "success";
    }
}
?>
