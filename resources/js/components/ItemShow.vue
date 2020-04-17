<template>
  <div>

      <div class="head text-center">

          <div class="top-bar text-center">
            <h4 class="head-text">พิพิธภัณฑ์ ชาวบางกอก</h4>
          </div>
      </div>
      <div class="content text-center">
        <div class="container" style="overflow-x:scroll;">
            <div class="slide">
              <div class="row">
                  <div
                  class="Image-36 sm-img pl-5"
                  v-for="(image, index) in item.images"
                  :key="image.id"
                  v-if="index > 0"
                >
                  <div class="pr-3">
                    <img :src="image.image_url"  width="100%"  style="max-width:300px" class=" item-pic"/>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="head-text-content">

          <h4><p>{{ item.translation.name }}</p></h4>
        </div>
         <div class="y">
        <div class="detail-sound">
        </div>

        <div class="link-lang" style="font-size:20px; margin-top: 20px;">
          <a href="?lang=th">TH</a>
          |
          <a href="?lang=en">ENG</a>
          |
          <a href="?lang=cn">CN</a>
        </div>
        <div class="speaker">
          <div class="col-12 text-center ">
                <div class="col-4 offset-4">
                  <i class="flaticon-speaker dot2" @click="playAudio()"></i>
                </div>
              </div>
              <!-- <audio controls v-if="show.translation" ref="player">
                <source :src="show.translation.audio_url" type="audio/mpeg" />
              </audio> -->
        </div>
         </div>
        <div class="detail-content">
         <div class="pl-4 pr-4 pt-4">
            <p>{{ item.translation.description }}</p>

         </div>

        </div>
        <div class="detail-sound2">
          <div class="locate">
             <p>ตำแหน่งของคุณ</p>
         </div>
          <focus-point v-model="item.focus">
                <template slot="pin">
                  <i class="fas fa-map-marker-alt" style="color: #C70039; font-size:30px;"></i>
                </template>
                <div class="container">
                  <img :src="item.room.floor.museum.locate_image_url" width="70%" class="item-pic"/>
                </div>
              </focus-point>
              <hr />
              <div class="locate2">
                 <p>พิพิธภัณฑ์ ชาวบางกอก</p>
                 <P>ชั้น 1 ห้องรับแขก</p>
              </div>


        </div>

      </div>

  </div>
</template>

<script>
import FocusPoint from "vue-focuspoint-component";

export default {
  components: {
    FocusPoint
  },
  data() {
    return {
      fixFocus: ""
    };
  },
  props: ["item", "floor"],
  mounted: function() {
    this.$watch("item.sound.file_url", () => {
      this.$refs.player.load();
    });
  },
  methods: {
    playAudio() {
      var a = new Audio(this.item.translation.audio_url);
      a.play();
    }
  },
  computed: {
    comFocus() {
      return this.item.focus;
    }
  },
  watch: {
    comFocus() {
      this.item.focus = this.fixFocus;
    }
  },
  created() {
    this.fixFocus = this.item.focus;
  }
};
</script>

<style >
body{
  background-color: #F6DDCC;
   font-family: Prompt;
}

@media screen and (max-width: 767px) {
  .navbar {
    display: none;
  }
  .container {
    padding-left: 0px;
    padding-right: 0px;
  }
  footer {
    display: none;
    }
  }
  .head{
    position: relative;
    width: 100%;
    height: 285px;
    max-height: 400px;
    background-color: #3e7a63;
    background-image: url(/uploads/images/items/banner-1.jpg);
    background-size: contain;
  }
  .top-bar{
    position: absolute;
    left: 35px;
    right: 35px;
    bottom: -25px;
    background-color: white;
    height: 50px;
    border-radius: 31px;
    box-shadow: 0px 1px 2px #aba9a9;
  }
  .head-text{
    color: black;
    position: absolute;
    left: 20px;
    right: 20px;
    top: 10px;
  }
  .content{
    position: relative;
    padding-top: 80px;
    height: 1300px;
  }
  .img-content{
    height: 300px;
    overflow: hidden
  }
  .slide{
    width: 1000px;
    max-width: 3200px;
    padding-bottom: 45px;
    height: auto;
  }
  .item-pic{
    padding: 5px;
    border: solid 1px #ccc;
    border-radius : 15px
  }
  .detail-content{
    margin-top: 60px;
    width: 94%;
    background-color: #B1BF93;
    height: auto;
    max-height: 500px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    padding-bottom: 20px;
  }
  .detail-sound{
    margin-top: 20px;
    background-color: #B1BF93;
    height: 6px;
    max-height: 6px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    margin-left: 20px;
  }
  .link-lang{
    position: absolute;
    width: 100%;
  }
  .locate{
    font-size: 20px;
    font-weight: bold;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.5;
    letter-spacing: normal;
    text-align: center;
    color: #000000;
    padding-top: 13px;
  }
  .locate2{
    font-family: mitr;
    font-size: 20px;
    font-weight: 500;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.5;
    letter-spacing: normal;
    text-align: center;
    color: #000000;
  }
  .detail-sound2{
    margin-top: 20px;
    background-color: #B1BF93;
    height: auto;

    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;
    margin-left: 20px;
  }
  /* .col-4x{
    width: 600px;
  } */
</style>
<style lang="scss">
@import "./node_modules/vue-focuspoint-component/src/scss/focus-point";

// overwrite variables from the simple theme
// $focuspoint-background: blue;
// $focuspoint-border: 3px solid white;
// $focuspoint-radius: 2px;
// find more variables in /src/scss/_focus-point-variables.scss

// @import "./node_modules/vue-focuspoint-component/src/scss/focus-point-theme";
</style>
