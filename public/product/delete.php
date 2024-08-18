<?php
    require_once "../../app/Products.php";

    $products = getProducts();
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    // echo "Oya delete am";
    // $newProducts = [];
    $id = "";

    $success = "";
    $fail = "";

    if (!empty($_POST["id"])) {
        $id = $_POST["id"];

        $products = deleteProduct($id);
        if ($products) {
            $success = "Product deleted successfully";
        } else {
            $fail = "Product failed to delete";
        }
    }
?>

<!-- It's Up, Blue Green Red, Housekeeping Knows -->
<?php include_once "../components/tableresponse.component.php" ?>

<script>
    <?php if (!$success == "") { ?>
        setTimeout(() => {
            window.location.replace("index.php?deleteSuccess");
        }, 3000)
    <?php } elseif (!$fail == "") { ?>
        $("#showMsg").html(
        "<div class='alert alert-success alert-dismissible fade show' role='alert'><?=$fail?><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
        )
    <?php } ?>
</script>