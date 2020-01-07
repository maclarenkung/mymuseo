<template>
  <div class="home-page">
    <div class="headtag">
      <div class="container">
        <!-- <card :title="$t('home')">
      {{ $t("you_are_logged_in") }}
      <div class="row">
        <div v-for="(museum, index) in museums" :key="index" class="col-md-4 mt-2">
          <MuseumCard :museum="museum" />
        </div>
      </div>

      <hr />
      <ScanQr />
        </card>-->
        <div class="col-12 header">
          <div class="col-4">
            <div class="head" style="padding-top: 350px; color:white">
              <h1 style="font-size: 60px">
                MINDMUSE
                <hr class="mindmuse" />
              </h1>
              <h5>เราคือนักพัฒนาและจัดการ</h5>
              <h3>" ข้อมูลพิพิธภัณฑ์ "</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-12 mid row  mb-5">
        <div class="col-6 row">
          <div class="col-6">
            <div class="icon-1">
              <i class="icon-in flaticon-folders"></i>
              <h5 class="low-font">เก็บข้อมูลแม่นยำ</h5>
            </div>
            <div class="icon-2 mt-5">
              <i class="icon-in flaticon-qr-code"></i>
              <h5 class="low-font" style="font-size:17px">
                นำเสนอข้อมูลผ่าน QR
              </h5>
            </div>
          </div>
          <div class="col-6">
            <div class="icon-3" style="margin-top:121px;">
              <i class="icon-in flaticon-loudspeaker"></i>
              <h5 class="low-font">โฆษณาพิพิธภัณฑ์</h5>
            </div>
          </div>
        </div>
        <dic class="col-5 offset-1 text-center">
          <h1 style="font-weight: bold; color:#2D4D16;">บริการของเรา</h1>

          <p class="low-font">OUR SERVICE</p>
          <hr class="mindmuse" style="background-color:#85F0E7" />

          <p style="font-size: 23px; color:#707070;">
            MINDMUSE คือ ผู้ดูแลและการจัดการข้อมูลพิพิธภัณฑ์
            ที่ไม่เพียงแต่เก็บข้อมูลแต่ยังนำเสนอข้อมูลได้ด้วย
          </p>
          <router-link to="/register" class="btn">
            <button class="bt-re" style="margin-top: 85px;">
              <h4>สมัครใช้บริการ</h4>
            </button>
          </router-link>
        </dic>
      </div>
    </div>
    <div class="contact">
      <div class="container">
        <div class="row">
          <div class="col-1"></div>
          <div
            class="col-10 text-center"
            style="margin-top:200px; color:white;"
          >
            <h2 style="font-size:60px;">ติดต่อสอบถาม</h2>
            <p>CONTACT US</p>
            <div class="col-4 offset-4">
              <hr class="mindmuse" />
            </div>

            <div class="row" style="margin-top: 40px">
              <div class="col-1"></div>
              <div class="col-2 ">
                <div class="">
                  <i class="icon-con dot flaticon-paper-plane"></i>
                </div>
              </div>
              <div class="col-2">
                <i
                  class="icon-con dot flaticon-facebook"
                  style="color:#4365B2"
                ></i>
              </div>
              <div class="col-2">
                <i
                  class="icon-con dot flaticon-instagram-logo"
                  style="color:#FF6464"
                ></i>
              </div>
              <div class="col-2">
                <i
                  class="icon-con dot flaticon-telephone"
                  style="color:#FECD57"
                ></i>
              </div>
              <div class="col-2">
                <i
                  class="icon-con dot flaticon-placeholder"
                  style="color:#3631C4"
                ></i>
              </div>
              <div class="col-1"></div>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
    </div>
    <div class="bottom  text-center ">
      <siv class="container">
        <div class="col-12">
          <h1 style="font-weight: bold; color:#3E7A63;">
            พิพิธภัณฑ์ที่ร่วมกับเรา
          </h1>
          <div class="col-4 offset-4">
            <p style="color:#B2B3B5;">Partners Museum</p>
            <hr class="mindmuse" />
          </div>
        </div>

        <div class="container" style="margin-top:60px;">
          <div class="row blog">
            <div class="col-md-12">
              <div
                id="blogCarousel"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#blogCarousel"
                    data-slide-to="0"
                    class="active"
                  ></li>

                  <li data-target="#blogCarousel" data-slide-to="1"></li>
                </ol>

                <!-- Carousel items -->

                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-md-4">
                        <a href="#">
                          <img
                            src="https://sv1.picz.in.th/images/2020/01/08/RhHXCg.png"
                            alt="Image"
                            style="max-width:100%;"
                          />
                        </a>
                      </div>
                      <div class="col-md-4">
                        <a href="#">
                          <img
                            src="https://sv1.picz.in.th/images/2020/01/08/RhHVgn.png"
                            alt="Image"
                            style="max-width:100%;"
                          />
                        </a>
                      </div>

                      <div class="col-md-4">
                        <a href="#">
                          <img
                            src="https://sv1.picz.in.th/images/2020/01/08/RhHaIW.png"
                            alt="Image"
                            style="max-width:100%;"
                          />
                        </a>
                      </div>
                    </div>

                    <!--.row-->
                  </div>

                  <!--.item-->

                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-md-4">
                        <a href="#">
                          <img
                            src="https://sv1.picz.in.th/images/2020/01/08/RhHXCg.png"
                            alt="Image"
                            style="max-width:100%;"
                          />
                        </a>
                      </div>
                      <div class="col-md-4">
                        <a href="#">
                          <img
                            src="https://sv1.picz.in.th/images/2020/01/08/RhHVgn.png"
                            alt="Image"
                            style="max-width:100%;"
                          />
                        </a>
                      </div>

                      <div class="col-md-4">
                        <a href="#">
                          <img
                            src="https://sv1.picz.in.th/images/2020/01/08/RhHaIW.png"
                            alt="Image"
                            style="max-width:100%;"
                          />
                        </a>
                      </div>
                    </div>

                    <!--.row-->
                  </div>

                  <!--.item-->
                </div>

                <!--.carousel-inner-->
              </div>

              <!--.Carousel-->
            </div>
          </div>
        </div>
      </siv>
    </div>
  </div>
</template>

<script>
import MuseumCard from "~/components/Museum/Card";
import ScanQr from "~/components/ScanQr";

export default {
  middleware: "auth",
  components: {
    MuseumCard,
    ScanQr
  },
  data() {
    return {
      museums: [
        {
          name: "xxx",
          des: "23121"
          // class: "bg-danger"
        },
        {
          name: "2222",
          des: "23121"
        }
      ]
    };
  },
  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
<style lang="scss" scoped>
.headtag {
  height: 700px;
  background-image: url(https://sv1.picz.in.th/images/2020/01/07/RhdlGQ.png);
  background-attachment: fixed;
  background-size: cover;
  background-size: 100% 100%;
}
.mindmuse {
  height: 1px;
  background-color: #ffcc57;
}
.mid {
  margin-top: 100px;
}
.low-font {
  color: #6f6f6f;
}
.bt-re {
  height: 70px;
  width: 300px;
  background-color: #3631c4;
  border-radius: 10px;
  color: white;
}
.icon-1 {
  text-align: center;
  padding: 30px 30px;
  border-color: #ff6464;
  color: #ff6464;
  border-style: groove;
  border-width: 2px;
  box-shadow: 3px 5px 10px;
}
.icon-2 {
  text-align: center;
  padding: 30px 30px;
  border-color: #3e7a63;
  color: #3e7a63;
  border-style: groove;
  border-width: 2px;
  box-shadow: 3px 5px 10px;
}
.icon-3 {
  text-align: center;
  padding: 30px 30px;
  border-color: #ffcc57;
  color: #ffcc57;
  border-style: groove;
  border-width: 2px;
  box-shadow: 3px 5px 10px;
}
.contact {
  height: 844px;
  background-image: url(https://sv1.picz.in.th/images/2020/01/07/RhS5Cz.png);
  background-attachment: fixed;
  background-size: cover;
  background-size: 100% 100%;
}
.icon-con {
  font-size: 40px !important;
  margin-top: 10px !important;
  color: green;
  position: absolute;
}
.icon-in {
  font-size: 60px;
}
.dot {
  // margin-top: -10px;
  height: 70px;
  width: 70px;
  background-color: white;
  border-radius: 50%;
  // display: inline-block;
}
.blog .carousel-indicators {
  left: 0;

  top: auto;

  bottom: -40px;
}

.blog .carousel-indicators li {
  background: #dbdbdb;

  border-radius: 50%;

  height: 8px;
}

.blog .carousel-indicators .active {
  background: #3e7a63;
}
.bottom {
  margin-top: 80px;
  margin-bottom: 90px;
}
</style>
