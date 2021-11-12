<template>
  <div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Carrello</h5>
        <h6 class="card-subtitle mb-2 text-muted">Nome Ristorante:</h6>
        <div v-for="item in shoppingCart" :key="item.id" class="item-cart">
          <p class="card-text">{{ item.name }}</p>
          <p class="card-text">{{ item.quantity }}</p>
        </div>
        <!-- <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ModalCart",
  props: ["shoppingCart"],
};
</script>

<style>
</style>