<form id="post-form" class="p-5 me-3">
    <div class="row g-3 mb-3">
        <h2 class="fw-bold">Create Product</h2>
        <div class="col-12">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" placeholder="Product Name">
            <div id="productErr" class="text-danger error-handler"></div>
        </div>
        <div class="col-12">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" placeholder="Quantity In Stock">
            <div id="quantityErr" class="text-danger error-handler"></div>
        </div>
        <div class="col-12">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Price of Product">
            <div id="priceErr" class="text-danger error-handler"></div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
</form>