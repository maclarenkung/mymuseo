<template>
  <div style="background: white;">
    <div class="head text-center">
      <div class="top-bar text-center">
        <h4 class="head-text">พิพิธภัณฑ์ ชาวบางกอก</h4>
      </div>
    </div>
    <div class="content text-center">
      <div class="container" style="overflow-x:scroll; ">
        <div class="slidex">
          <div class="row">
            <div
              class="Image-36 sm-img pl-5"
              v-for="(image, index) in item.images"
              :key="image.id"
              v-if="index > 0"
            >
              <div class="pr-3">
                <img
                  :src="image.image_url"
                  width="100%"
                  style="max-width:300px"
                  class=" item-pic"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="head-text-content">
        <h4>
          <p>{{ item.translation.name }}</p>
        </h4>
      </div>
      <div class="y">
        <div class="detail-sound"></div>
        <div class="speaker">
          <div class="col-12 text-center">
            <div class="col-4 offset-4">
              <i class="flaticon-speaker dot2" @click="playAudio()"></i>
            </div>
          </div>
          <!-- <audio controls v-if="show.translation" ref="player">
                <source :src="show.translation.audio_url" type="audio/mpeg" />
              </audio> -->
        </div>
      </div>
      <div class="link-lang" style="font-size:20px; margin-top: 20px;">
        <strong>
          <a href="?lang=th">TH</a>
          |
          <a href="?lang=en">ENG</a>
          |
          <a href="?lang=cn">CN</a>
        </strong>
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
            <i
              class="fas fa-map-marker-alt"
              style="color: #C70039; font-size:30px;"
            ></i>
          </template>
          <div class="container">
            <img
              :src="item.room.floor.museum.locate_image_url"
              width="70%"
              class="item-pic"
            />
          </div>
        </focus-point>

        <div class="locate2">
          <p class="head-locate">พิพิธภัณฑ์ ชาวบางกอก</p>
          <P class="room">ชั้น 1 ห้องรับแขก</P>
        </div>
      </div>
      <div class="detail-content2">
        <div class="locate3">
          <p>ห้องอื่นๆ</p>
        </div>
        <b-container fluid="sm" style="    padding:0px 55px 55px;">
          <div class="position">
            <b-carousel
              id="carousel-fade"
              style="text-shadow: 0px 0px 2px #000"
              fade
              indicators
              img-width="1024"
              img-height="480"
            >
              <a href="">
                <b-carousel-slide
                  caption="First slide"
                  img-src="https://picsum.photos/1024/480/?image=10"
                ></b-carousel-slide>
              </a>
              <a href="">
                <b-carousel-slide
                  caption="Second Slide"
                  img-src="https://picsum.photos/1024/480/?image=12"
                ></b-carousel-slide>
              </a>
              <a href="">
                <b-carousel-slide
                  caption="Third Slide"
                  img-src="https://picsum.photos/1024/480/?image=22"
                ></b-carousel-slide>
              </a>
            </b-carousel>
          </div>
        </b-container>
      </div>
      <div class="detail-content3" >
        <div class="Rectangle-3">
          <div class="col-12">
            <div class="row">
              
              <div class="col-12">
                
              </div>
             
              <div class="col-3"></div>
              <div
                class="col-6 text-center"
                style="margin-top:20px; font-size:30px; color:#3E7A63;"
              >
                <i class="flaticon-facebook"></i>
                <i class="flaticon-line"></i>
                <i class="flaticon-call-answer"></i>
              </div>
              <div class="col-3"></div>
              <div class="col-12">
               
                  mindmuse.com All right resered
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import FocusPoint from "vue-focuspoint-component";

export default {
  components: {
    FocusPoint,
  },
  data() {
    return {
      fixFocus: "",
      slide: 0,
      sliding: null,
    };
  },
  props: ["item", "floor"],
  mounted: function() {
    this.$watch("item.sound.file_url", () => {
      this.$refs.player.load();
    });
  },
  methods: {
    onSlideStart(slide) {
      this.sliding = true;
    },
    onSlideEnd(slide) {
      this.sliding = false;
    },
    playAudio() {
      var a = new Audio(this.item.translation.audio_url);
      a.play();
    },
  },
  computed: {
    comFocus() {
      return this.item.focus;
    },
  },
  watch: {
    comFocus() {
      this.item.focus = this.fixFocus;
    },
  },
  created() {
    this.fixFocus = this.item.focus;
  },
};
</script>

<style>
body {
  background-color: #020024;
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
.head {
  position: relative;
  width: 100%;
  height: 285px;
  max-height: 400px;
  background-color: #1c5925;
  background-image: url(/uploads/images/items/banner-1.jpg);
  background-size: contain;
}
.top-bar {
  position: absolute;
  left: 35px;
  right: 35px;
  bottom: -25px;
  background-color: white;
  height: 50px;
  border-radius: 31px;
  box-shadow: 0px 1px 2px #aba9a9;
}
.head-text-content {
  color: #1c5925;
}
.head-text {
  color: black;
  position: absolute;
  left: 20px;
  right: 20px;
  top: 10px;
}
.speaker {
  padding-top: 20px;
}
.dot2 {
  font-size: 50px;
  /* padding: 30px; */
  /* border-radius: 50%; */
  /* border: solid 1px #ccc; */
}
.content {
  position: relative;
  padding-top: 80px;
  /* height: 1300px; */
}
.img-content {
  height: 300px;
  overflow: hidden;
}
.slidex {
  width: 1000px;
  max-width: 3200px;
  padding-bottom: 45px;
  height: auto;
}
.item-pic {
  padding: 5px;
  border: solid 2px #1c5925;
  border-radius: 15px;
}
.detail-content {
  margin-top: 75px;
  /* width: 97%; */
  background-color: #ccc693;
  height: auto;
  max-height: 500px;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
  /* border-radius: 20px; */
  padding-bottom: 20px;
  margin-left: 20px;
  margin-right: 20px;
}
.detail-content2 {
  margin-top: 20px;
  /* width: 97%; */
  background-color: #ccc693;
  height: auto;
  max-height: 500px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
  margin-left: 20px;
  margin-right: 20px;
}
.detail-sound {
  margin-top: 20px;
  background-color: #1c5925;
  height: 6px;
  max-height: 6px;
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
  margin-left: 20px;
  margin-right: 20px;
}
.link-lang {
  position: absolute;
  /* padding-top: 80px; */
  width: 100%;
  color: #1c5925;
}
.link-lang a {
  color: #1c5925;
}
.locate {
  font-size: 20px;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #1c5925;
  padding-top: 13px;
}
.locate2 .head-locate {
  padding-top: 20px;

  font-family: mitr;
  font-size: 20px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 0px;
  letter-spacing: normal;
  text-align: center;
  color: #1c5925;
}
.locate2 .room {
  font-family: mitr;
  font-size: 15px;
  font-weight: 400;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #000000;
  padding-bottom: 25px;
}
.locate3 {
  color: #1c5925;
  padding-top: 20px;
  font-family: mitr;
  font-size: 20px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
}
.detail-sound2 {
  margin-top: 20px;
  background-color: #ccc693;
  height: auto;
  /* border-bottom-left-radius: 115px;
  border-bottom-right-radius: 115px; */
  margin-left: 20px;
  margin-right: 20px;
}
.detail-content3{
  padding-top: 30px;
  padding-bottom: 20px;
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
