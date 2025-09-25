let cart = [];

// Add product to cart
function addToCart(id, name, price) {
  // Make sure price is treated as a number
  price = parseFloat(price);

  // Check if item already exists
  let item = cart.find(p => p.id === id);

  if (item) {
    item.qty++;
  } else {
    cart.push({ id, name, price, qty: 1 });
  }

  updateCart();
}

// Update cart display
function updateCart() {
  let cartList = document.getElementById("cart");
  let cartTotal = document.getElementById("cart-total");

  cartList.innerHTML = "";
  let total = 0;

  cart.forEach(item => {
    let li = document.createElement("li");
    li.textContent = `${item.name} (x${item.qty}) - $${(item.price * item.qty).toFixed(2)}`;

    // remove button
    let btn = document.createElement("button");
    btn.textContent = "Remove";
    btn.onclick = function () {
      removeFromCart(item.id);
    };

    li.appendChild(btn);
    cartList.appendChild(li);

    total += item.price * item.qty;
  });

  cartTotal.textContent = "Total: $" + total.toFixed(2);
}

// Remove item
function removeFromCart(id) {
  cart = cart.filter(item => item.id !== id);
  updateCart();
}

// Checkout (for now just an alert, you can link a real checkout page later)
function goToCheckout() {
  if (cart.length === 0) {
    alert("Your cart is empty!");
  } else {
    let total = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
    alert("Proceeding to checkout. Total: $" + total.toFixed(2));
  }
}

// Toggle cart view
function viewCart() {
  let container = document.getElementById("cart-container");
  container.style.display = container.style.display === "none" ? "block" : "none";
}

function goToCheckout() {
  if (cart.length === 0) {
    alert("Your cart is empty!");
  } else {
    // save cart in localStorage so checkout.php can access it
    localStorage.setItem("cart", JSON.stringify(cart));
    window.location.href = "checkout.php"; // redirect to checkout page
  }
}
