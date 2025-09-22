// script.js

// Load cart from localStorage or start empty
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Add item to cart
function addToCart(id, name, price) {
  let item = cart.find(product => product.id === id);
  if (item) {
    item.quantity += 1;
  } else {
    cart.push({ id, name, price, quantity: 1 });
  }
  saveCart();
  updateCart();
}

// Remove item from cart
function removeFromCart(id, name, price) {
  let itemIndex = cart.findIndex(product => product.id === id);
  if (itemIndex > -1) {
    cart[itemIndex].quantity -= 1;
    if (cart[itemIndex].quantity <= 0) {
      cart.splice(itemIndex, 1);
    }
  }
  saveCart();
  updateCart();
}

// Save cart to localStorage
function saveCart() {
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Update cart display
function updateCart() {
  const cartList = document.getElementById('cart-list');
  const cartTotal = document.getElementById('cart-total');

  if (!cartList || !cartTotal) return; // Prevent errors if cart area doesn't exist

  cartList.innerHTML = '';
  let total = 0;

  cart.forEach(item => {
    const li = document.createElement('li');
    li.textContent = `${item.name} - $${item.price} x ${item.quantity}`;
    cartList.appendChild(li);
    total += item.price * item.quantity;
  });

  cartTotal.textContent = `Total: $${total.toFixed(2)}`;
}

// Toggle cart visibility
document.getElementById('view_cart').addEventListener('click', () => {
  const cartArea = document.getElementById('cart-area');
  if (cartArea.style.display === 'none' || cartArea.style.display === '') {
    cartArea.style.display = 'block';
  } else {
    cartArea.style.display = 'none';
  }
});

// Initialize cart display on page load
document.addEventListener('DOMContentLoaded', updateCart);


