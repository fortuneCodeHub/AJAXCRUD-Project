<?php
    require_once "../../app/Products.php";

    $products = getProducts();
    $newProduct = [];

    $success = "";
    $fail = "";


    if (!empty($_POST["productName"])) {
        $newProduct = $_POST;
        $products = createProduct($newProduct);

        if ($products) {
            $success = "Product created successfully";
        } else {
            $fail = "Product failed to create";
        }
    }
?>

<!-- It's Up, Blue Green Red, Housekeeping Knows -->
<?php include_once "../components/tableresponse.component.php" ?>

<script>
    <?php if (!$success == "") { ?> 
        $("#showMsg").html(
        "<div class='alert alert-success alert-dismissible fade show' role='alert'><?=$success?><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
        )
        // to reset the form after a post
        $("#post-form")[0].reset();
    <?php } elseif (!$fail == "") { ?>
        $("#showMsg").html(
        "<div class='alert alert-success alert-dismissible fade show' role='alert'><?=$fail?><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
        )
    <?php } ?>
</script>