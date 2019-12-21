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
.actives {
  color: #2dcd7a;
}
.btn-mm {
  padding: 5px 20px;
  border: #305a9a 1px solid;
  color: #305a9a;
  border-radius: 20px;
}
.round-mm {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: #305a9a;
  color: #fff;
}
.text-mm {
  color: #305a9a;
}
.bg-mm {
  background-color: #305a9a;
}
img {
  object-fit: cover;
}
.el-button.el-button--warning {
  background: #f5d108;
  border-color: #f5d108;
}
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
.mm-thead {
  color: #305a9a;
  margin-bottom: 20px;
  font-weight: bold;
}
.mm-tbody tr td {
  padding: 10px;
  transition: 0.5s;
}
.mm-tbody {
  tr {
    margin: 10px 0;
  }
  tr:hover {
    background: #4f95ff;
    color: #fff;
  }
  a:hover {
    color: #fff;
  }
}
</style>
