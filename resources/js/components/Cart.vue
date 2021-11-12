<template>
  <div class="container">
    <div class="restaurant-infos text-center">
      <h1>Nome ristorante: {{ this.restaurant.name }}</h1>
      <h3>Indirizzo: {{ this.restaurant.address }}</h3>
    </div>
    <div class="cards-container d-flex justify-content-center">
      <div
        v-for="plate in plates"
        :key="plate.id"
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
          <a @click="addPlateToCart(plate)">+</a>
        </div>
      </div>
    </div>

    <ModalCart v-if="showModal" :shoppingCart="shoppingCart" />
  </div>
</template>

<script>
import ModalCart from "./ModalCart.vue";
export default {
  name: "Cart",
  components: { ModalCart },
  data() {
    return {
      restaurant: [],
      plates: [],
      shoppingCart: [],
      showModal: false,
    };
  },
  methods: {
    getRestaurantAndPlatesFromApi() {
      axios
        .get("http://127.0.0.1:8000/api/restaurants/1")
        .then((res) => {
          this.restaurant = res.data.restaurant;
          this.plates = res.data.plates;
          // console.log(this.plates);
        })
        .catch();
    },
    addPlateToCart(plate) {
      if (!this.shoppingCart.includes(plate)) {
        this.shoppingCart.push(plate);
        // plate.quantity = 1;
      } else {
        plate.quantity++;
      }
      this.showModal = true;
      console.log(this.shoppingCart);
      // localStorage.setItem("cart", this.shoppingCart);
    },
    // Per cancellare la cache del browser MEMO
    /*   removeLocalStorage() {
      localStorage.removeItem("cart");
      console.log(this.shoppingCart);
    }, */
  },
  created() {
    this.getRestaurantAndPlatesFromApi();
  },
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
</style>