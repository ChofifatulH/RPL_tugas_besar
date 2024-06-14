document.addEventListener("alpine:init", () => {
  Alpine.data("products", () => ({
    items: [
      { id: 1, name: "Tenda 2 Orang", img: "tenda.png", price: 30000, description: "Ini adalah Tenda 2 Orang" },
      { id: 2, name: "Tenda 4 Orang", img: "tenda.png", price: 35000, description: "Ini adalah Tenda 4 Orang"},
      { id: 3, name: "Tenda 5 Orang", img: "tenda.png", price: 40000, description: "Ini adalah Tenda 5 Orang" },
      { id: 1, name: "Tenda 2 Orang", img: "tenda.png", price: 30000, description: "Ini adalah Tenda 2 Orang" },
      { id: 2, name: "Tenda 4 Orang", img: "tenda.png", price: 35000, description: "Ini adalah Tenda 4 Orang"},
      { id: 3, name: "Tenda 5 Orang", img: "tenda.png", price: 40000, description: "Ini adalah Tenda 5 Orang" },
      { id: 4, name: "Tenda 7 Orang", img: "tenda.png", price: 50000 },
      { id: 5, name: "Carrier 20-30L", img: "backpack.jpg", price: 10000 },
      { id: 6, name: "Carrier 40-50L", img: "backpack.jpg", price: 15000 },
      { id: 7, name: "Carrier 60L", img: "backpack.jpg", price: 17000 },
      { id: 8, name: "Carrier 80L", img: "backpack.jpg", price: 20000 },
      { id: 9, name: "Kompor", img: "kompor.jpg", price: 6000 },
      { id: 10, name: "Cooking Set", img: "cookingSet.jpg", price: 6000 },
      { id: 11, name: "Gas", img: "gas.jpg", price: 8000 },
      { id: 12, name: "Sepatu", img: "sepatu.jpg", price: 15000 },
      { id: 13, name: "Jaket", img: "jaket.jpg", price: 15000 },
      { id: 14, name: "Matras", img: "matras.jpg", price: 3000 },
      { id: 15, name: "Matras Foil", img: "matras_foil.jpg", price: 10000 },
      { id: 16, name: "Senter", img: "senter.jpg", price: 8000 },
      { id: 17, name: "Headlamp", img: "headlamp.jpg", price: 5000 },
      { id: 18, name: "Flysheet", img: "flysheet.jpg", price: 10000 },
      { id: 19, name: "Tracking Pole", img: "trackingPole.jpg", price: 10000 },
      { id: 20, name: "Hammock", img: "hammock.jpg", price: 10000 },
      { id: 21, name: "Sarung Tangan", img: "sarungTangan.jpg", price: 10000 },
      { id: 22, name: "Sleeping Bag", img: "sleepingBag.png", price: 8000 },
      { id: 23, name: "Handy Talky", img: "ht.jpg", price: 15000 },
    ],
    get previewItems() {
      return this.items.slice(0, 3);
    },
    get allItems() {
      return this.items;
    }
  }));

  Alpine.store("box", {
    items: [],
    showProductModal(id) {
      const selectedItem = this.items.find((item) => item.id === id);

      if (this.items.length > 0) {
        this.items = [];
      }

      if (!selectedItem) {
        this.items.push({ ...id });
      }
      const modal = document.querySelector("#item-detail-modal");
      modal.style.display = "flex";
    },
    hideProductModal() {
      this.startDate = "";
      this.endDate = "";
      this.quantity = "1";
      const modal = document.querySelector("#item-detail-modal");
      modal.style.display = "none";
    },
    getTodayDate() {
      const today = new Date().toISOString().split("T")[0];
      return today;
    },
    getMinEndDate(startDate) {
      if (startDate) {
        const minEndDate = new Date(startDate);
        minEndDate.setDate(minEndDate.getDate() + 1);
        return minEndDate.toISOString().split("T")[0];
      }
      return null;
    },

    calculateSewa(startDate, endDate) {
      const start = new Date(startDate);
      const end = new Date(endDate);
      const diffTime = Math.abs(end - start);
      const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
      return diffDays;
    },
    total(price, quantity, startDate, endDate) {
      const sewa = this.calculateSewa(startDate, endDate);
      const totalHarga = sewa * quantity * price;
      return totalHarga;
    },
  });

  Alpine.store("cart", {
    items: [],
    totalBarang: 0,
    totalHarga: 0,
    add(newItem, quantity, startDate, endDate, total) {
      if (endDate.trim() !== "") {
        const cartItem = this.items.find((item) => item.id === newItem.id);
        this.items.push({ ...newItem, quantity, startDate, endDate, total });
        this.totalHarga += total;
        this.totalBarang += parseInt(quantity);
        console.log(this.totalBarang);
      }
    },
  });

  Alpine.store("pesan", {
    showPesan() {
      const pesan = document.querySelector("#pesan-penjual");
      pesan.style.display = "flex";
    },
    hidePesan() {
      const pesan = document.querySelector("#pesan-penjual");
      pesan.style.display = "none";
    },
  });

  // Logika untuk menyembunyikan/menampilkan navbar saat di-scroll
  const navbar = document.querySelector('.navbar');
  let lastScrollTop = 0;

  window.addEventListener('scroll', function() {
    let currentScroll = window.scrollY;

    if (currentScroll > lastScrollTop) {
      // Scroll ke bawah
      if (currentScroll > 100) {
        navbar.style.transition = 'transform 0.3s ease';
        navbar.style.transform = 'translateY(-100%)';
      }
    } else {
      // Scroll ke atas
      navbar.style.transform = 'translateY(0)';
    }

    lastScrollTop = currentScroll;
  });
});

const rupiah = (number) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(number);
};


