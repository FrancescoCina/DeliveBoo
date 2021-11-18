<template>
  <div>
    <div class="card shopping-cart">
      <div class="card-header">Carrello</div>
      <ul
        v-for="item in shoppingCart"
        :key="item.id"
        class="list-group list-group-flush"
      >
        <li v-if="item.quantity" class="list-group-item">
          {{ item.name }}
        </li>
        <li v-if="item.quantity" class="list-group-item">
          {{ item.quantity }}
        </li>
        <!-- <li class="list-group-item">A third item</li> -->
      </ul>
      <div class="card-header">Totale: € {{ totalPrice }}</div>
    </div>

    <!--  <div class="card">
      <div class="card-body">
        <h5 class="card-title">Carrello</h5>
        <h6 class="card-subtitle mb-2 text-muted">Nome Ristorante:</h6>
        <div v-for="item in shoppingCart" :key="item.id" class="item-cart">
          <p class="card-text">{{ item.name }}</p>
          <p class="card-text">{{ item.quantity }}</p>
        </div>
        <h6>Totale: € {{ totalPrice }}</h6>
      </div>
    </div> -->
  </div>
</template>

<script>
export default {
  name: "ModalCart",
  props: ["shoppingCart", "totalPrice"],
  /*   methods: {
      removePlateToCart(plate, index) {
      if (this.shoppingCart.includes(plate) && plate.quantity > 0) {
        plate.quantity--;
        this.totalPrice = this.totalPrice - plate.price;
        this.shoppingCart.split(1, 1);
      } else if (plate.quantity == 0) {
        // console.log("rimosso" + this.shoppingCart);
        this.shoppingCart.split(index, 1);
        this.totalPrice = this.totalPrice - plate.price;
        console.log(this.shoppingCart.length);
      } else if (this.shoppingCart.length == 0) {
        this.totalPrice = 0;
        console.log(this.totalPrice);
        console.log(this.shoppingCart);
        // this.showModal = false;
      }
    },
  }, */
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
.shopping-cart{
  width: 100%;
  max-width: 100%;
}
</style>