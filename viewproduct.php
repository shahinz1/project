<?php
include "header.php";
require_once ('config/ProductsData.php');
$selectedSKUs = [];
?>
<body>
<!-- Header -->
<div class="container-fluid text-center">
    <div class="row mt-3">
        <div class="col-md-4">
            <h1 id="ajax"></h1>
            <h1 class="display-6">Adding product</h1>
        </div>
        <div class="col-md-4 ms-auto">
            <div class="row">
                <div class="col-6">
                    <a class="btn btn-success" href="index.php">ADD</a>
                </div>
                <div class="col-6">
                    <label for="submit-form" class="btn btn-danger">Mass delete</label>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <form action="delete.php" method="post" enctype="multipart/form-data">
    <?php
    $products = new ProductsData();
    $count = 0;
    foreach ($products->getData() as $key => $value):
        if ($count % 4 == 0) {
            echo '<div class="row">';
        }
        ?>
        <div class="col-md-3 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="input-group mb-3">
                            <input class="form-check-input mt-0 delete-checkbox" type="checkbox" name="delete[]" value="<?php echo $value['SKU']; ?>">
                        </div>
                    <h5 class="card-title">SKU: <?php echo $value['SKU']?></h5>
                    <h6 class="card-text">name: <?php echo $value['name']?></h6>
                    <p class="card-text">price: <?php echo $value['price']?></p>
                    <?php if($value['AttributeName'] == "DVD"){
                        $data = 'MB';}
                        elseif ($value['AttributeName'] == "Book"){
                        $data = 'Kg';
                        }
                        else{
                            $data = "HxWxL";
                        }
                     ?>
                    <p class="card-text"><?php echo $value['AttributeName'].": ".$value['AttributeValue']." ". $data?></p>
                </div>
            </div>
        </div>
        <?php
        $count++;
        if ($count % 4 == 0) {
            echo '</div>';
        }
    endforeach;
    if ($count % 4 != 0) {
        echo '</div>';
    }
    ?>
        <input type="submit" id="submit-form" class="d-none" />
</div>

