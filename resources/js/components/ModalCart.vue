<template>
  <div>
    <div class="card" style="width: 18rem">
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
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
</style>