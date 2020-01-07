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
      <div class="col-12 mid row mt-5 mb-5">
        <div class="col-6 row">
          <div class="col-6">
            <div class="icon">
              <i>file</i>
              <h5>เก็บข้อมูลแม่นยำ</h5>
            </div>
            <div class="icon mt-5">
              <i>file</i>
              <h5>เก็บข้อมูลแม่นยำ</h5>
            </div>
          </div>
          <div class="col-6">
            <div class="icon" style="margin-top:70px;">
              <i>file</i>
              <h5>เก็บข้อมูลแม่นยำ</h5>
            </div>
          </div>
        </div>
        <dic class="col-5 offset-1 text-center">
          <h1>บริการของเรา</h1>

          <p>OUR SERVICE</p>
          <hr class="mindmuse" />

          <p>MINDMUSE คือ ผู้ดูแลและการจัดการข้อมูลพิพิธภัณฑ์ ที่ไม่เพียงแต่เก็บข้อมูลแต่ยังนำเสนอข้อมูลได้ด้วย</p>
          <button>
            <h4>สมัครใช้บริการ</h4>
          </button>
        </dic>
      </div>
    </div>
    <div class="contact">
      <div class="container">
        <div class="row">
          <div class="col-1"></div>
          <div class="col-10 text-center" style="margin-top:150px">
            <h2>ติดต่อสอบถาม</h2>
            <p>CONTACT US</p>
            <hr class="mindmuse" />
            <div class="row" style="margin-top: 200px">
              <div class="col-1"></div>
              <div class="col-2">
                <i class="icon-con">email</i>
              </div>
              <div class="col-2">
                <i class="icon-con">email</i>
              </div>
              <div class="col-2">
                <i class="icon-con">email</i>
              </div>
              <div class="col-2">
                <i class="icon-con">email</i>
              </div>
              <div class="col-2">
                <i class="icon-con">email</i>
              </div>
              <div class="col-1"></div>
            </div>
          </div>
          <div class="col-1"></div>
        </div>
      </div>
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
}
.mindmuse {
  height: 1px;
  background-color: #ffcc57;
}
.icon {
  text-align: center;
  padding: 30px 30px;
  border-color: #ffcc57;
  border-style: groove;
  border-width: 2px;
}
.contact {
  height: 844px;
  background-image: url(https://sv1.picz.in.th/images/2020/01/07/RhS5Cz.png);
}
.icon-con {
  background-color: white;
  border-radius: 99px;
  padding: 10px 10px;
}
</style>
