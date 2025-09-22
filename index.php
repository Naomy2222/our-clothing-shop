<?php
// index.php (array-based products)
$products = [
  ["id"=>1, "name" => "Summer Dress", "price" => 25, "image" => "https://via.placeholder.com/300x300?text=Summer+Dress"],
  ["id"=>2, "name" => "Casual Hoodie", "price" => 40, "image" => "https://via.placeholder.com/300x300?text=Casual+Hoodie"],
  ["id"=>3, "name" => "Classic Jeans", "price" => 35, "image" => "https://via.placeholder.com/300x300?text=Classic+Jeans"],
  ["id"=>4, "name" => "T-Shirt", "price" => 10, "image" => "https://via.placeholder.com/300x300?text=T-Shirt"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Bever's Clothing Shop</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Welcome to Bever’s Clothing Shop 👗✨</h1>

  <div class="products">
    <?php foreach($products as $p): ?>
      <div class="product">
        <img src="<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
        <h3><?= htmlspecialchars($p['name']) ?></h3>
        <p>$<?= number_format($p['price'], 2) ?></p>
        <button onclick="addToCart(<?= $p['id'] ?>, '<?= addslashes($p['name']) ?>', <?= $p['price'] ?>)">Add to Cart</button>
        <button onclick="removeFromCart(<?= $p['id'] ?>, '<?= addslashes($p['name']) ?>', <?= $p['price'] ?>)">Remove from Cart</button>
      </div>
    <?php endforeach; ?>
  </div>

  <h2>🛒 Your Cart</h2>
  <div id="cart-area">
    <ul id="cart-list"></ul>
    <p id="cart-total"></p>
    <a href="checkout.php">Go to Checkout</a>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
</body>
</html>


