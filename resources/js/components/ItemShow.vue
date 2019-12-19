<template>
  <div>
    <div id="logo-mobile">
      <img src="https://sv1.picz.in.th/images/2019/12/18/i6x4A9.png" />
    </div>
    <div class="box mt-4" style="text-align:center;">
      <div id="btnactive">
        <button class="btnlang active">
          <img src="https://sv1.picz.in.th/images/2019/12/19/iniVWR.png" />
        </button>
        <button class="btnlang">
          <img src="https://sv1.picz.in.th/images/2019/12/19/inirxz.png" />
        </button>
        <button class="btnlang">
          <img src="https://sv1.picz.in.th/images/2019/12/19/inipeZ.png" />
        </button>
      </div>
      <div class="sound mt-4">
        <button class="img">
          <img src="https://sv1.picz.in.th/images/2019/12/19/inRp02.png" style="width:30px" />
        </button>
      </div>
    </div>
    <img :src="item.image_url" width="200" />
    <h2>{{ item.name }}</h2>
    <hr />
    <audio controls v-if="item.sound" ref="player">
      <source :src="item.sound.file_url" type="audio/mpeg" />Your browser does not support the audio element.
    </audio>
    <!-- <pre>
    {{ item }}
    </pre>-->
  </div>
</template>

<script>
export default {
  props: ["item"],
  mounted: function() {
    this.$watch("item.sound.file_url", () => {
      this.$refs.player.load();
    });
  }
};
</script>


<style lang="scss">
@media screen and (max-width: 600px) {
  .navbar {
    display: none;
  }
  .container {
    padding-left: 0px;
    padding-right: 0px;
  }
}
#logo-mobile {
  text-align: center;
}
.box {
  height: 800px;
  background-color: #c9def7;
}
.btnlang {
  border: none;
  border-radius: 5px;
  outline: none;
  // padding: 10px 16px;
  margin-top: 40px;
  background-color: #c9def7;
  cursor: pointer;
}
.btnlang img {
  width: 38px;
}
.active,
.btn:hover {
  background-color: #305a9a;
  color: white;
}
.sound .img {
  background-color: #305a9a;
  border: none;
  border-radius: 99px;
  outline: none;
  padding: 10px 16px;
}
</style>
