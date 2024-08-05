<?php

function calcCartPrice($products) {
	// Associative array of product prices
	$prices = array("R01" => 32.95, "G01" => '24.95', "B01" => 7.95);
	
	// Initialize total price
	$totalPrice = 0.0;
	
	// Split the products string into an array
	$products = explode(", ", $products);
	
	// Initialize counter for red products (R01)
	$countRed = 0;
	
	// Loop through each product
	foreach($products as $product) {
		// Check if the product is "R01"
		if($product === "R01") {
			$countRed ++;
			// Apply discount if more than 2 red products
			$totalPrice += $countRed > 2 ? $prices[$product] / 2 : $prices[$product];
		} 
		else { 
			// Add price for other products
			$totalPrice += $prices[$product];
		}
	}
	
	// Apply shipping cost based on the total price
	if($totalPrice < 50)
		return $totalPrice + 4.95;
	else if ($totalPrice < 90)
		return $totalPrice + 2.95;
	else 
		return $totalPrice;
}

print_r(calcCartPrice("B01, G01"));
print_r(calcCartPrice("R01, R01"));
print_r(calcCartPrice("R01, G01"));
print_r(calcCartPrice("B01, B01, R01, R01, R01"));

?>