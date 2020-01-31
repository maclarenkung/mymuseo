<template>
  <div class="main-layout" style="    background-color: #F9F9F9;">
    <navbar />

    <div>
      <child />
    </div>
    <footer style="background-color:white;">
      <hr style="background-color: #3E7A63" />
      <div class="container">
        <div class="row">
          <div class="col-6">
            <img
              src="https://sv1.picz.in.th/images/2020/01/08/RhJSDt.png"
              alt
              class="logo logo-mind"
            />
          </div>
          <div class="col-6 text-right">
            <h5 class="look">2020 MindMuse. All Right Reserved.</h5>
          </div>
        </div>
      </div>
    </footer>
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
body {
  font-family: "Mitr", sans-serif;
}
.actives {
  color: #2dcd7a;
}
.btn-mm {
  padding: 5px 20px;
  border: #305a9a 1px solid;
  color: #305a9a;
  border-radius: 20px;
}
.btn-mm-i {
  padding: 5px 20px;
  border: #305a9a 1px solid;
  color: #fff;
  background: #305a9a;
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
  color: #3e7a63;
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
    background: #3e7a63;
    color: #fff;
  }
  a:hover {
    color: #fff;
  }
}
footer {
  height: 110px;
  // margin-top: 100px;
}
.logo {
  margin-top: 10px;
  width: 40%;
}
.look {
  margin-top: 25px;
  color: #3e7a63;
}
</style>
