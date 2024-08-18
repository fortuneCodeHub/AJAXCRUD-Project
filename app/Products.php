<?php 

function getProducts()
{
    $jsonData = json_decode(file_get_contents(__DIR__."/product.json"), associative:true);

    usort($jsonData, function($a, $b) {
        return strtotime($b['dateTime']) - strtotime($a['dateTime']);
    });

    return $jsonData;
}

function getProductsFormat()
{
    return json_decode(file_get_contents(__DIR__."/product.json"), associative:true);
}

function getProductsById($id) 
{
    $products = getProductsFormat();

    foreach ($products as $product) {
        if ($product["id"] == $id) {
            return $product;
        }
    }
    
    return null;
}

function createProduct($data) 
{
    $products = getProductsFormat();

    if (!empty($data["productName"])) {
        $id = rand(1000000, 9999999);
        $dateTime = date('Y-m-d H:i:s');

        // Ensure id is unique
        foreach ($products as $product) {
            if ($product["id"] == $id) {
                $id = rand(1000000, 9999999);
            }
        }

        // Remove id and dateTime from the $data array if they exist
        unset($data["id"], $data["dateTime"]);

        // Add id at the top and dateTime at the end
        $data = array_merge(["id" => $id], $data, ["dateTime" => $dateTime]);

        $products[] = $data;

        file_put_contents(__DIR__."/product.json", json_encode($products));

        $products = getProducts();

        return $products;
    }
}


function updateProductData($data, $id)
{
    $products = getProductsFormat();
    // if (!empty($data)) {
        
        foreach ($products as $key => $product) {
            if ($product["id"] == $id) {
                $products[$key] = array_merge($product, $data);
            }
        }

        file_put_contents(__DIR__."/product.json", json_encode($products));

        $products = getProducts();
        return $products;
    // }
}

function deleteProduct($id) 
{
    $products = getProductsFormat();

    if (!empty($id)) {
        foreach ($products as $key => $product) {
            if ($product["id"] == $id) {
                array_splice($products, $key, 1);
            }
        }
    }

    file_put_contents(__DIR__."/product.json", json_encode($products));

    $products = getProducts();
    return $products;
}