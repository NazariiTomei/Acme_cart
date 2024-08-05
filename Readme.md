### Function Overview

The `calcCartPrice` function calculates the total price of products in a cart, applying a discount for a specific product and adding shipping costs based on the total price. 

### Code Breakdown

```php
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
            $countRed++;
            // Apply discount if more than 2 red products
            $totalPrice += $countRed > 2 ? $prices[$product] / 2 : $prices[$product];
        } else {
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
```

### Key Points

1. **Price List**: An associative array `$prices` is used to store the prices of different products. Note that "G01" has its price as a string, but PHP will handle this correctly by converting it to a float.

2. **Product Splitting**: The `explode(", ", $products)` function splits the input string into an array of product codes based on the delimiter `", "`.

3. **Red Product Discount**: The `$countRed` variable counts how many times the product "R01" appears. If there are more than 2 "R01" products, each additional one gets a 50% discount.

4. **Shipping Costs**: Depending on the total price, different shipping costs are added:
   - If less than $50: $4.95 shipping cost.
   - If between $50 and $90: $2.95 shipping cost.
   - If $90 or more: No additional shipping cost.

### Examples

- `calcCartPrice("B01, G01")`: Returns the total price of products "B01" and "G01" with appropriate shipping costs.
- `calcCartPrice("R01, R01")`: Calculates the price for two "R01" products (no discount applied).
- `calcCartPrice("R01, G01")`: Calculates the price for one "R01" and one "G01".
- `calcCartPrice("B01, B01, R01, R01, R01")`: Applies the discount to the third "R01" and adds prices for other products, then calculates shipping.

    The `print_r` statements will display the calculated prices for each test case.