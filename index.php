<?php include 'header.php'; ?>
<body>
<!-- Header -->
<div class="container-fluid text-center">
    <div class="row mt-3">
        <div class="col-md-4">
            <h1 class="display-6">Adding product</h1>
        </div>
        <div class="col-md-4 ms-auto">
            <div class="row">
                <div class="col-6">
                    <label for="submit-form" class="btn btn-success">Save</label>
                </div>
                <div class="col-6">
                    <a href="../project/viewproduct.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Form part -->
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form id="#product_form">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="sku">SKU</span>
                    <input type="text" name="SKU" class="form-control" placeholder="should be unique" aria-label="SKU" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" name="name" class="form-control" placeholder="Name of the product" aria-label="name" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="price">Price ($)</span>
                    <input type="number" name="price" class="form-control" placeholder="should be number" aria-label="Price" aria-describedby="basic-addon1">
                </div>
                <select id="productType" name="productType" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
                <div id="ajax" class="mt-3"></div>
                <input type="hidden" name="submit-form">
                <input type="submit" name="submit-form" id="submit-form" class="d-none"/>
            </form>
            <div id="notification"></div>
        </div>
    </div>
    <hr>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submit-form').on('click', function(e) {
            $.ajax({
                type:'post',
                url: './processForm.php',
                data: $("#product_form").serialize(),
                success: function(response) {
                    console.log(response)
                    if (response == "success")
                        window.location = "./viewproduct.php";
                    else
                        $('#notification').html(response);

                },
                error: function() {
                    console.log()
                }
            })
            e.preventDefault();
        });
    });
</script>
</body>
</html>
