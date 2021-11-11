<template>
  <div id="app">
    <Header />
    <Main />
  </div>
</template>

<script>
import Header from "./Header.vue";
import Main from "./Main.vue";

export default {
  name: "App",
  data() {},
  components: {
    Header: Header,
    Main: Main,
  },
};
</script>
