<template>
  <div class="container">
    <Loader v-if="isLoading" />
    <div v-else>
      <div v-if="!isCheckout">
        <div class="restaurant-infos text-center">
          <h1>Nome ristorante: {{ this.restaurant.name }}</h1>
          <h3>Indirizzo: {{ this.restaurant.address }}</h3>
        </div>
        <div class="cards-container d-flex justify-content-center">
          <div
            v-for="(plate, index) in plates"
            :key="plate.id + index"
            class="card col-3 my-4"
            style="width: 18rem"
          >
            <img :src="plate.image" class="card-img-top" :alt="plate.name" />
            <div class="card-body">
              <h5 class="card-title">{{ plate.name }}</h5>
              <p class="card-text">
                {{ plate.description }}
              </p>
              <p class="card-text">
                {{ plate.quantity }}
              </p>
              <a class="btn btn-success" @click="addPlateToCart(plate)"
                >Aggiungi al Carrello</a
              >
              <br />
              <a
                class="btn btn-danger"
                v-if="plate.quantity"
                @click="removePlateToCart(plate, index)"
              >
                Rimuovi
              </a>
              <br />
              <!--     <a class="btn btn-info" @click="saveCartInLocalStorage">
                Local Storage
              </a> -->
              <a class="btn btn-info" @click="clearLocalStorage">
                Pulisci Tutto
              </a>
              <br />
              <a @click="toggleModal">Modale si/no</a>
            </div>
          </div>
        </div>
        <!--  -->
        <!-- <a href="http://127.0.0.1:8000/welcome">welcome page</a> -->
        <ModalCart
          v-if="showModal"
          :shoppingCart="shoppingCart"
          :totalPrice="totalPrice"
        />
        <a class="btn btn-success" @click="showCheckoutComp">Vai al Checkout</a>
      </div>
    </div>

    <Checkout v-if="isCheckout" />
  </div>
</template>

<script>
import ModalCart from "./ModalCart.vue";
import Checkout from "./Checkout.vue";
import Loader from "./Loader.vue";

export default {
  name: "Cart",
  components: { ModalCart, Checkout, Loader },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000/api",
      restaurant: [],
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
      let serializedShoppingCart = JSON.stringify(this.shoppingCart);
      let serializedTotalPrice = JSON.stringify(this.totalPrice);
      localStorage.setItem("cart", serializedShoppingCart);
      localStorage.setItem("amount", serializedTotalPrice);
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
    toggleModal() {
      this.showModal = !this.showModal;
      console.log(this.shoppingCart);
    },
    showCheckoutComp() {
      if (this.shoppingCart.length > 0) {
        this.isCheckout = true;
      }
    },
  },
  created() {
    let url = window.location.href;
    // console.log(url);
    url = new URL(url);
    // console.log(url.pathname);
    let dinamicParam = url.pathname;
    // console.log(dinamicParam);
    this.getRestaurantAndPlatesFromApi(dinamicParam);
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
@import "../../sass/app.scss";
</style>