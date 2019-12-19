<template>
  <div class="main-layout">
    <navbar v-if="user" />

    <div>
      <child />
    </div>
  </div>
</template>

<script>
import Navbar from "~/components/Navbar";

export default {
  name: "MainLayout",

  components: {
    Navbar
  }
};
</script>

<style lang="scss">
.mm-table {
  .label {
    color: #305a9a;
    min-width: 200px;
    padding: 10px 0;
    padding-right: 20px;
  }
  .text {
    color: #424242;
  }
  .btnlang {
    border: none;
    border-radius: 5px;
    outline: none;
    // padding: 10px 16px;
    // background-color: #c9def7;
    cursor: pointer;
  }
  .btnlang img {
    width: 38px;
  }
}
</style>
