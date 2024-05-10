<?php
$productsJson = file_get_contents('products.json');
$products = json_decode($productsJson, true);
foreach ($products as $product) {
    echo "{$product['id']}: {$product['name']} - {$product['price']}". " EUR \n";
}
$selectedItems = [];
$done = false;
while ($done === false)
{
    $input = readline("enter product ID to add to cart, or 'done' to checkout: ");
    if ($input === 'done')
    {
        $done = true;
    }
    $productId = intval($input);
    $selectedItems[] = $productId;
}
$totalPrice = 0;
echo "items:\n";
foreach ($selectedItems as $productId) {
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            echo "{$product['name']} - {$product['price']}". " EUR \n";
            $totalPrice += $product['price'];
            break;
        }
    }
}
echo "receipt: " . $totalPrice . " EUR";

