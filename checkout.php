<?php
// checkout.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Checkout - Bever's Clothing Shop</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>🛒 Checkout</h1>

  <!-- Cart display -->
  <div id="checkout-cart">
    <ul id="checkout-cart-list"></ul>
    <p id="checkout-cart-total"></p>
  </div>

  <!-- User details form -->
  <h2>Enter Your Details</h2>
  <form id="checkout-form">
    <label>
      Name:<br>
      <input type="text" name="name" required>
    </label><br><br>

    <label>
      Email:<br>
      <input type="email" name="email" required>
    </label><br><br>

    <label>
      Address:<br>
      <textarea name="address" rows="3" required></textarea>
    </label><br><br>

    <button type="submit">Place Order</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="checkout.js"></script>
</body>
</html>
