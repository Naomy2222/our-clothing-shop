<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Clothing Shop</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .product { border: 1px solid #ddd; padding: 10px; margin: 10px; display: inline-block; width: 200px; }
    button { margin-top: 5px; }
    #cart { margin-top: 20px; border-top: 2px solid #333; padding-top: 10px; }
  </style>
</head>
<body>
  <h1>Welcome to My Clothing Shop 🛍</h1>

  <!-- Example Products -->
  <div class="product">
    <h3>T-shirt</h3>
    <p>Price: $10</p>
    <button class="add-to-cart" data-product="T-shirt" data-price="10">Add to Cart</button>
    <button class="remove-from-cart" data-product="T-shirt">Remove</button>
  </div>

  <div class="product">
    <h3>Jeans</h3>
    <p>Price: $25</p>
    <button class="add-to-cart" data-product="Jeans" data-price="25">Add to Cart</button>
    <button class="remove-from-cart" data-product="Jeans">Remove</button>
  </div>

  <div class="product">
    <h3>Dress</h3>
    <p>Price: $30</p>
    <button class="add-to-cart" data-product="Dress" data-price="30">Add to Cart</button>
    <button class="remove-from-cart" data-product="Dress">Remove</button>
  </div>

  <!-- Cart Display -->
  <h2>Your Cart</h2>
  <div id="cart"></div>

  <!-- Load jQuery + Your Script -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
</body>
</html>