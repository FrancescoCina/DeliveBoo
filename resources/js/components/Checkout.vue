<template>
  <div>
    <h3>Sono il Checkout</h3>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  props: ["shoppingCart", "totalPrice"],
  methods: {
    showConsoleLog(cart, amount) {
      console.log(cart);
      console.log(amount);
    },
  },
  created() {
    this.showConsoleLog(this.shoppingCart, this.totalPrice);
  },
};
</script>

<style>
</style>