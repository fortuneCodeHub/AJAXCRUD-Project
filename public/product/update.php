<?php
    require_once "../../app/Products.php";

    $products = getProducts();
    $newProducts = [];

    $success = "";
    $fail = "";

    if (!empty($_POST)) {
        $newProducts = $_POST;

        $products = updateProductData($newProducts, $newProducts["id"]);
        if ($products) {
            $success = "Product updated successfully";
        } else {
            $fail = "Product failed to update";
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
    <?php } elseif (!$fail == "") { ?>
        $("#showMsg").html(
        "<div class='alert alert-success alert-dismissible fade show' role='alert'><?=$fail?><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
        )
    <?php } ?>
</script>