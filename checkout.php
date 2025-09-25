<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Bever's Clothing Shop</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .checkout-cart {
      margin-top: 20px;
      border: 1px solid #ccc;
      padding: 15px;
      border-radius: 8px;
    }
    .checkout-cart h3 {
      text-align: center;
    }
    .checkout-cart ul {
      list-style: none;
      padding: 0;
    }
    .checkout-cart li {
      margin: 5px 0;
    }
    .checkout-total {
      font-weight: bold;
      margin-top: 10px;
      text-align: right;
    }
  </style>
</head>
<body>
  <h1>Checkout Page 🛒</h1>

  <!-- Cart Summary -->
  <div class="checkout-cart">
    <h3>Your Cart</h3>
    <ul id="checkout-items"></ul>
    <p class="checkout-total" id="checkout-total"></p>
  </div>

  <!-- Customer Details -->
  <h3>Your Details</h3>
  <form action="process_order.php" method="POST">
    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Address:</label>
    <textarea name="address" required></textarea><br><br>

    <input type="hidden" name="cart" id="checkout-cart-input">

    <button type="submit">Confirm Order</button>
  </form>

  <script>
    // Load cart from localStorage
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    const itemsList = document.getElementById("checkout-items");
    const totalElem = document.getElementById("checkout-total");
    const hiddenCart = document.getElementById("checkout-cart-input");

    let total = 0;

    cart.forEach(item => {
      const li = document.createElement("li");
      li.textContent = `${item.name} (x${item.qty}) - $${(item.price * item.qty).toFixed(2)}`;
      itemsList.appendChild(li);

      total += item.price * item.qty;
    });

    totalElem.textContent = "Total: $" + total.toFixed(2);
    hiddenCart.value = JSON.stringify(cart); // pass cart to PHP
  </script>
</body>
</html>
