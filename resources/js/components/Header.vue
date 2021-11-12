<template>
  <div>
    <nav class="bg-primary d-flex align-items-center">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h1 class="pippo mt-2">logo</h1>
          <div>
            <a class="text-decoration-none text-white m-3" href="./login"
              >Login</a
            >
            <a class="text-decoration-none text-white" href="./register"
              >Register</a
            >
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style scoped lang="scss">
@import "./resources/sass/app.scss";
.pippo {
  color: $yellow;
}
</style>