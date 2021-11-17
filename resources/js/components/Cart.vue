<template>
  <div>
    <HeaderRestaurant />
    <Jambotron />
    <div class="container-fluid px-5">
      <Loader v-if="isLoading" />
      <div v-else>
        <div v-if="!isCheckout" class="container-fluid">
          <div class="row">

            <div class="col-9 d-flex justify-content-around flex-wrap">
              <div
              class="card col-5 d-flex flex-wrap justify-content-around"
              v-for="(plate, index) in plates"
              :key="plate.id + index"
              >
                <div
                class="pro-pic"
                v-bind:style="{
                  'background-image': 'url(' + imgURL + plate.image + ')',
                }"
                ></div>
                <div class="description-wrap">
                  <div class="description">
                    <h5>{{ plate.name }}</h5>
                    <p>{{ plate.description }}</p>
                    <p>{{ plate.quantity }}</p>
                    <p>{{ plate.price }} €</p>
                    <a class="btn btn-success" @click="addPlateToCart(plate)">+</a>
                    <a
                      class="btn btn-danger"
                      v-if="plate.quantity"
                      @click="removePlateToCart(plate, index)"
                    >
                      Rimuovi
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-3">
              <div class="mt-5 pt-5">
                <ModalCart
                v-if="showModal"
                :shoppingCart="shoppingCart"
                :totalPrice="totalPrice"
                />
                <a class="btn btn-success" @click="showCheckoutComp">
                  Vai al Checkout
                </a>
              </div>
            </div>

          </div>
          <div>
            <Checkout
              v-if="isCheckout"
              :shoppingCart="shoppingCart"
              :totalPrice="totalPrice"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ModalCart from "./ModalCart.vue";
import Checkout from "./Checkout.vue";
import Loader from "./Loader.vue";
import HeaderRestaurant from "./HeaderRestaurant.vue";
import Jambotron from "./Jambotron.vue";
export default {
  name: "Cart",
  components: {
    ModalCart,
    Checkout,
    Loader,
    HeaderRestaurant,
    Jambotron,
  },
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
      imgURL: "../storage/",
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
@import "../../sass/app.scss";

.card {
  margin-top: 100px;
  height: 500px;
  position: relative;
  background: #ff5858;
  transition: all 0.3s ease-out;
}
.card .description-wrap {
  padding: 105px 30px;
  position: relative;
  overflow: hidden;
}
.card .description {
  color: black;
  text-align: center;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  align-content: center;
  flex-wrap: wrap;
  font-size: 20px;
  line-height: 1.4;
  transition: all 0.5s ease-out;
  overflow-x: auto;
  transform: translateY(100%);
  opacity: 0;
}
.card .description > * {
  width: 100%;
}
.card .description h3 {
  margin: 0;
  font-size: 26px;
}
.card .description h4 {
  margin: 0;
}
.pro-pic {
  position: absolute;
  left: 50%;
  top: 0;
  width: 100%;
  height: 100%;
  transform: translatex(-50%);
  background-size: cover;
  background-position: center center;
  transition: all 0.5s ease-out;
}
.card:hover .pro-pic {
  transform: translate(-50%, -50%);
  width: 150px;
  height: 150px;
  border-radius: 50%;
  border: 3px solid;
}
.card:hover {
  border-radius: 50px;
}
.card:hover .description {
  transform: translateY(0%);
  opacity: 1;
}
</style>