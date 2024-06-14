const navbarNav = document.querySelector(".navbar-nav");
const searchForm = document.querySelector(".search-form");
const searchBox = document.querySelector("#search-box");
const shoppingCart = document.querySelector(".shopping-cart");

document.querySelector("#hamburger-menu").onclick = (e) => {
  navbarNav.classList.toggle("active");
  searchForm.classList.remove("active");
  shoppingCart.classList.remove("active");
  e.preventDefault();
};

document.querySelector("#search-button").onclick = (e) => {
  searchForm.classList.toggle("active");
  shoppingCart.classList.remove("active");
  navbarNav.classList.remove("active");
  searchBox.focus();
  e.preventDefault();
};

document.querySelector("#shopping-cart-button").onclick = (e) => {
  shoppingCart.classList.toggle("active");
  searchForm.classList.remove("active");
  navbarNav.classList.remove("active");
  e.preventDefault();
};

document.querySelector(".checkout-button").onclick = (e) => {
  shoppingCart.classList.toggle("active");
  e.preventDefault();
};

const itemDetailModal = document.querySelector("#item-detail-modal");

// window.onclick = (e) => {
//   if (!e.target.matches("#hamburger-menu") ||
//     !e.target.matches("#search-button") ||
//     !e.target.matches("#shopping-cart-button")) {
//     shoppingCart.classList.remove("active");
//     searchForm.classList.remove("active");
//     navbarNav.classList.remove("active");
//   }

// };
