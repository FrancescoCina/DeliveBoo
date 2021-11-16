<template>
  <div>
    <form>
      <div class="mb-3">
        <label for="name">Nome</label>
        <input type="text" class="form-control" placeholder="Nome" id="name" v-model="customer_name">
      </div>
      <div class="mb-3">
        <label for="Surname">Cognome</label>
        <input type="text" class="form-control" placeholder="Cognome" id="Surname" v-model="customer_surname">
      </div>
      <div class="mb-3">
        <label for="phone_number">Numero di telefono</label>
        <input type="tel" id="phone_number" class="form-control" 
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" v-model="customer_phone_number">
      </div>
      <div class="mb-3">
        <label for="Address">Indirizzo</label>
        <input type="text" class="form-control" placeholder="Indirizzo" id="Address" v-model="customer_address">
      </div>
      <div class="mb-3">
        <label for="customer_email" class="form-label">Email</label>
        <input type="email" class="form-control" id="customer_email" aria-describedby="emailHelp" v-model="customer_email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="btn btn-primary" @click="createOrder">Crea Ordine</div>
    </form>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  props: ["shoppingCart", "totalPrice"],
  data(){
    return{
      token:'',
      order_id:'',
      customer_name: '',
      customer_surname:'',
      customer_phone_number:'',
      customer_email: '',
      customer_address:'',
      amount: 0,
      order: {},
    }
  },
  methods: {
    showConsoleLog(cart, amount) {
      console.log(cart);
      console.log(amount);
    },
    createOrder(){
      // user info 
        const order = {
        customer_name: this.customer_name,
        customer_surname: this.customer_surname,
        customer_address: this.customer_address,
        customer_phone_number: this.customer_phone_number,
        customer_email: this.customer_email,
        total: this.amount,
      };

      // order complete
      this.order = order;   
    }
  },
  created() {
    this.showConsoleLog(this.shoppingCart, this.totalPrice);
  },
};
</script>

<style lang="scss">
@import "../../sass/app.scss";
</style>