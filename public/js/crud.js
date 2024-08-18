/**
 * Backend Js
 */

//Check for form changes
$("#post-form :input").change(function() {
    $("#post-form").data("changed", true)
})



// Delete product function
if (document.querySelector("#delete")) {
    const deleteBtn = document.querySelector("#delete")

    // Set all the input fields to variables
    let productId = $("#productId").val()
    let productName = $("#productName").val()

    // for (let i = 0; i < deleteBtns.length; i++) {
    deleteBtn.addEventListener("click", function(e) {
        e.preventDefault();
    
        if (confirm("Are you sure you want to delete product " + productName + "?")) {
                // Pass validated data to ajax in order to write in product table
            $.ajax({
                url: "product/delete.php",
                method: "post",
                data: {
                    id: productId
                },
                dataType: "text",
                success: function(response) {
                    $("#table").html(response)
                }
            })
        }
    })
    // }
    
}

// Create product
if (document.querySelector("#submit")) {
    const button = document.querySelector("#submit")
    button.addEventListener("click", addProduct)
}

function addProduct(e) {
    e.preventDefault()
    // Set all the input fields to variables
    let productName = $("#productName").val()
    let price = $("#price").val()
    let quantity = $("#quantity").val()

    $(".preloader-div").show();

    // validate the above data
    if (!validateForm(productName, price, quantity)) {
        $(".preloader-div").hide();
        return false
    }
    
    // Pass validated data to ajax in order to write in product table
    $.ajax({
        url: "product/create.php",
        method: "post",
        data: {
            productName: productName,
            price: price,
            quantity: quantity
        },
        dataType: "text",
        success: function(response) {
            // $(".preloader-div").hide();
            $("#table").html(response)
        }
    })
}

// Update Product
if (document.querySelector("#update")) {
    const update = document.querySelector("#update") 
    update.addEventListener("click", updateProduct)
}

function updateProduct(e) {
    e.preventDefault()
    // Set all the input fields to variables
    let productId = $("#productId").val()
    let productName = $("#productName").val()
    let price = $("#price").val()
    let quantity = $("#quantity").val()

    $(".preloader-div").show();

    // validate the above data
    if (!validateForm(productName, price, quantity)) {
        $(".preloader-div").hide();
        return false
    }

    // Pass validated data to ajax in order to write in product table
    if ($("#post-form").data("changed", true)) {
        $.ajax({
            url: "product/update.php",
            method: "post",
            data: {
                id: productId,
                productName: productName,
                price: price,
                quantity: quantity
            },
            dataType: "text",
            success: function(response) {
                $(".preloader-div").hide();
                $("#table").html(response)
            }
        })
    } else {
        alert("No changes to save")
        return false
    }
    
}

function validateForm(productName, price, quantity) {
    //Set the flag
    let valid = true

    // Set default values for all the variables
    let productErr = $("#productErr").html("")
    let priceErr = $("#priceErr").html("")
    let quantityErr = $("#quantityErr").html("")

    //Product field
    if (productName == "") {
        productErr.html("* product name is required")
        valid = false
    }

    // price field
    if (price == "" || price <= 0) {
        priceErr.html("* price should be positive")
        valid = false
    }

    // stock field 
    if (quantity == "" || quantity < 0) {
        quantityErr.html("* product quantity in stock should be zero or positive")
        valid = false
    }
    return valid
}

