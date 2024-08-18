<form id="update-form" class="p-5 me-3">
    <a href="index.php" class="btn btn-primary my-2 mb-4"><i class="bi bi-arrow-left-circle me-2"></i> Create Product</a>
    <div class="row g-3 mb-3">
        <h2 class="fw-bold">Update Product : <?=$product["productName"]?></h2>
        <input type="hidden" name="productId" id="productId" value="<?=$product["id"]?>">
        <div class="col-12">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" value="<?=$product["productName"]?>" placeholder="Product Name">
            <div id="productErr" class="text-danger error-handler"></div>
        </div>
        <div class="col-12">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" value="<?=$product["quantity"]?>" placeholder="Quantity In Stock">
            <div id="quantityErr" class="text-danger error-handler"></div>
        </div>
        <div class="col-12">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" value="<?=$product["price"]?>" placeholder="Price of Product">
            <div id="priceErr" class="text-danger error-handler"></div>
        </div>
    </div>
    <div class="d-flex align-items-center">
        <button type="submit" class="btn btn-outline-primary me-2" id="update">Update</button>
        <button class="btn btn-danger me-2" id="delete">Delete</button> <br>
    </div>
</form>