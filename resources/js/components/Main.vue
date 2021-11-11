<template>
  <div>
    <div class="bg-secondary">
      <div class="container">
        <form class="form-inline my-2 my-lg-0 d-flex justify-content-center">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Cerca il tuo ristorante..."
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style scoped lang="scss">
@import "./resources/sass/app.scss";
.pippo {
  color: $yellow;
}
</style>