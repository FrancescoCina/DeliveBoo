<template>
  <div>
    <div class="img-bg-restaurant">
      <TextAnimationrestaurant />
    </div>
  </div>
</template>

<script>
import TextAnimationrestaurant from "./TextAnimationrestaurant.vue";

export default {
  name: "Jambotron",
  components: {
    TextAnimationrestaurant,
  },
};
</script>

<style scoped lang="scss">
@import "../../sass/app.scss";
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
.img-bg-restaurant {
  margin-top: 0;
  margin-left: -8px;
  margin-right: 0;
  background-image: url("/img/bg-restaurant.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  height: 200px;
  width: 100vw;
  background-position: bottom;
}
</style>