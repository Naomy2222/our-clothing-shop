<?php
// process_order.php

// Get submitted form data
$payment = htmlspecialchars($_POST['payment']);
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$cart = json_decode($_POST['cart'], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation - Bever's Clothing Shop</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .order-summary {
      margin: 20px auto;
      max-width: 600px;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px;
    }
    .order-summary h2 {
      text-align: center;
    }
    .order-summary ul {
      list-style: none;
      padding: 0;
    }
    .order-summary li {
      margin: 5px 0;
    }
    .order-total {
      font-weight: bold;
      margin-top: 10px;
      text-align: right;
    }
    .customer-info {
      margin-top: 20px;
      padding: 10px;
      border-top: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <h1>Thank you for your order, <?= $name ?>! 🎉</h1>

  <div class="order-summary">
    <h2>Order Summary</h2>
    <ul>
      <?php
      $total = 0;
      foreach ($cart as $item):
        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
      ?>
        <li><?= htmlspecialchars($item['name']) ?> (x<?= $item['qty'] ?>) - $<?= number_format($subtotal, 2) ?></li>
      <?php endforeach; ?>
    </ul>
    <p class="order-total">Total: $<?= number_format($total, 2) ?></p>

    <div class="customer-info">
      <h3>Shipping Details</h3>
      <p><strong>Email:</strong> <?= $email ?></p>
      <p><strong>Address:</strong> <?= nl2br($address) ?></p>
    </div>
  </div>
</body>
</html>
