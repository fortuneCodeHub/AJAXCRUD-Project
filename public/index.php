<?php
    require_once "../app/Products.php";

    $products = getProducts();
    $action = "create";

    if (isset($_GET["id"]) && isset($_GET["flag"])) {
        if ($_GET["flag"] == "edit") {
            $action = "edit";
            $product = getProductsById($_GET["id"]);

            if ($product == null) {
                header("Location: index.php?notExist");
            }
        }
    }
?>
<?php include_once "layouts/head.layout.php" ?>
    <div class="container">
        <?php include_once "components/shownotify.component.php" ?>
        <section class="d-lg-flex d-block align-items-center justify-content-center main-body" id="main-body">
            <?php
                if ($action == "create") {
                    include_once "partials/_createform.partial.php";
                } elseif ($action == "edit") {
                    include_once "partials/_updateform.partial.php";
                }
            ?>
            <?php include_once "components/table.component.php" ?>
        </section>
        <div class="lil-footer">
            Powered with PHP by CT Team &copy; 2024
        </div>
    </div>

    <script>
        <?php if (isset($_GET["notExist"])) { ?>
            const showMsg = document.querySelector("#showMsg")
            showMsg.innerHTML = `
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>This product does not exist<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>
            `
        <?php } elseif (isset($_GET["deleteSuccess"])) { ?>
            const showMsg = document.querySelector("#showMsg")
            showMsg.innerHTML = `
                <div class='alert alert-success alert-dismissible fade show' role='alert'>Product deleted successfully<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>
            `
        <?php } ?>
    </script>

<?php include_once "layouts/bottom.layout.php" ?>