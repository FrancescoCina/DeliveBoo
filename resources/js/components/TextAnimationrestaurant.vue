<template>
  <!-- Text animation Restaurant -->
  <div class="swipe text-center">
    <h1>{{ this.restaurant.name }}</h1>

    <span class="swipe swipe--delay casa-tua">
      {{ this.restaurant.address }}</span
    >
  </div>
</template>

<script>
export default {
  name: "TextAnimationrestaurant",
  data() {
    return {
      baseUri: "http://127.0.0.1:8000/api",
      restaurant: [],
      prevRestaurant: [],
      plates: [],
      shoppingCart: [],
      showModal: false,
      isCheckout: false,
      isLoading: false,
      totalPrice: 0,
    };
  },
  methods: {
    getRestaurantAndPlatesFromApi(dinamicParam) {
      this.isLoading = true;
      axios
        .get(`${this.baseUri}${dinamicParam}`)
        .then((res) => {
          this.restaurant = res.data.restaurant;
          this.plates = res.data.plates;
          // console.log(this.plates);
          if (this.prevRestaurant.id !== this.restaurant.id) {
            this.clearLocalStorage();
          }
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
    addPlateToCart(plate) {
      if (!this.shoppingCart.includes(plate)) {
        this.shoppingCart.push(plate);
        plate.quantity = 1;
        this.totalPrice += plate.price;
      } else {
        plate.quantity++;
        this.totalPrice += plate.price;
      }
      this.showModal = true;
      // console.log(this.shoppingCart);
      this.saveCartInLocalStorage();
    },
    removePlateToCart(plate) {
      if (this.shoppingCart.includes(plate) && plate.quantity > 0) {
        plate.quantity--;
        this.totalPrice = this.totalPrice - plate.price;
      } else if (plate.quantity == 0) {
        // console.log("rimosso" + this.shoppingCart);
        this.totalPrice = this.totalPrice - plate.price;
      }
    },
    // LOCAL STORAGE
    saveCartInLocalStorage() {
      this.prevRestaurant = this.restaurant;
      let serializedShoppingCart = JSON.stringify(this.shoppingCart);
      let serializedTotalPrice = JSON.stringify(this.totalPrice);
      let serializedRestaurant = JSON.stringify(this.prevRestaurant);
      localStorage.setItem("cart", serializedShoppingCart);
      localStorage.setItem("amount", serializedTotalPrice);
      localStorage.setItem("restaurant", serializedRestaurant);
    },
    clearLocalStorage() {
      this.shoppingCart = [];
      this.totalPrice = 0;
      localStorage.setItem("cart", JSON.stringify(this.shoppingCart));
      localStorage.setItem("amount", JSON.stringify(this.totalPrice));
    },
    // Per cancellare la cache del browser MEMO
    /* clearLocalStorage() {
      localStorage.removeItem("cart");
      localStorage.removeItem("amount");
      console.log(this.shoppingCart);
    }, */
    showCheckoutComp() {
      if (this.shoppingCart.length > 0) {
        this.isCheckout = true;
      }
    },
  },
  created() {
    let url = window.location.href;
    url = new URL(url);
    let dinamicParam = url.pathname;
    this.getRestaurantAndPlatesFromApi(dinamicParam);
    this.prevRestaurant = JSON.parse(localStorage.getItem("restaurant"));
    if (this.shoppingCart !== null && this.totalPrice !== null) {
      this.shoppingCart = JSON.parse(localStorage.getItem("cart"));
      this.totalPrice = JSON.parse(localStorage.getItem("amount"));
      if (this.shoppingCart.length > 0) {
        this.showModal = true;
      }
    }
  },
};
</script>

<style scoped lang="scss">
/* Google Font CDN Link */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

/* format */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

/* TEXT ANIMATOR */
.swipe {
  position: relative;
  width: 100%;
  &::after {
    display: block;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 100%;
    width: 0%;
    height: 100%;
    background-color: #ff5858;
    animation: swipe 1.5s ease-out 1s forwards;
  }
  &--delay {
    &::after {
      background-color: #ff5858;
      animation-delay: 1.5s;
    }
  }
}

h1 {
  display: block;
  color: rgb(255, 255, 255);
  font-size: 72px;
  line-height: 1;
  font-weight: 900;
  text-transform: uppercase;
  padding-top: 20px;
  opacity: 0;
  animation: fade 0.01s ease-out 1.75s forwards;
}

.casa-tua {
  display: block;
  color: rgb(255, 255, 255);
  font-size: 32px;
  line-height: 1;
  font-weight: 900;
  text-transform: uppercase;
  padding-top: 40px;
  padding-bottom: 40px;
  animation: fade 0.01s ease-out 2.25s forwards;
}

@keyframes fade {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes swipe {
  0% {
    right: 100%;
    left: 0;
    width: 0%;
  }
  50% {
    right: 0;
    left: 0;
    width: 100%;
  }
  100% {
    right: 0;
    left: 100%;
    width: 0%;
  }
}
</style>