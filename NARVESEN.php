<?php

$productsJson = file_get_contents('products.json');
$products = json_decode($productsJson, true);
foreach ($products as $product) {
    echo "{$product['id']}: {$product['name']} - {$product['price']} EUR\n";
}
$selectedItems = [];
$done = false;
while (!$done) {
    $input = readline("Enter product ID to add to cart, or 'done' to checkout: ");
    if ($input === 'done') {
        $done = true;
        break;
    }
    $productId = intval($input);
    $amount = readline("Enter amount: ");
    $selectedItems[] = ['id' => $productId, 'amount' => $amount];
}
$totalPrice = 0;
echo "Cart:\n";
foreach ($selectedItems as $item) {
    $productId = $item['id'];
    $amount = $item['amount'];
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            echo "{$product['name']} - x{$amount}\n";
            $totalPrice += $product['price'] * $amount;
            break;
        }
    }
}
echo "Receipt: {$totalPrice} EUR\n";

