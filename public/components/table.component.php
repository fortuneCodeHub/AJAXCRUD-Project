<div id="table">
    <div class="preloader-div">
        <img src="assets/table-loader.gif" alt="">
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Datetime Created</th>
                <th scope="col">Total Value</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $key => $product) : ?>
                <tr>
                    <td><?=$product["productName"]?></td>
                    <td><?=$product["quantity"]?></td>
                    <td><?=$product["price"]?></td>
                    <td><?=$product["dateTime"]?></td>
                    <td><?=$product["quantity"] * $product["price"]?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="index.php?id=<?=$product["id"]?>&flag=edit" class="btn btn-outline-primary me-1 btn-sm">Edit</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>