<template>
  <div>
    <div v-if="user.museum_active">
      <div class="col-12">
        <!-- <div>
        <b-form-select
          v-model="selected"
          :options="options"
          style="border-style: none;"
          class="text-center"
        ></b-form-select>
        </div>-->
        <!-- <pre>{{ museumFilter }}</pre> -->
        <!-- <pre>{{museum_active}}</pre> -->

        <div class="col-12" style="height: 28px;">
          <div class="row">
            <div class="col-4" >
              <select
                v-model="museum_active"
                style="font-family: mitr;
                      text-align: center;
                      width: 330px;
                      height: 50px;
                      font-size: 25px;"
              >
                <option
                  v-for="museum in user.museums"
                  :key="museum.id"
                  :value="museum.id"
                  >{{ museum.name }}</option
                >
              </select>
            </div>
            <div class="col-8">
              <div class="row">
                <div class="offset-3"></div>
                <div class="col-3" style="float: right;">
                  <router-link to="/admin/museums/create">
                    <button class="setting2">
                      <i class="flaticon-add"></i> Create
                    </button>
                  </router-link>
                </div>
                <div class="col-3" style="float: right;">
                  <router-link
                    :to="{
                      name: 'admin.museum.edit',
                      params: { id: museum_active },
                    }"
                  >
                    <button class="setting">
                      <i class="flaticon-wheel"></i>
                      Setting
                    </button>
                  </router-link>
                </div>
                <div class="col-3" style="float: right;">
                  <div >
                    <!-- <button class="upgrade">จ่ายเงิน</button> -->
                    <paymentOmise
                      :amount="2000000"
                      :price_all="20000"
                      
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 mt-5">
        <div class="container mt-5 dashh" style="">
          <div class="row">
            <div class="col-6" style="
    line-height: 20px;">
              <span style="font-size: 35px; color:#4A4A4A"
                >Your Package :
              </span>
              <span style="color: #3e7a63; font-size:35px;">
                {{ museumFilter.package.name }}
              </span>
              <br />
              <br />
              <span style="color: #4A4A4A; font-size:24px;">Package : </span>
              <span style="color: #3e7a63; font-size:24px;">1 month</span>
            </div>
            <div class="col-6 text-right" style="
    line-height: 27px;">
              <div class="row">
                <div class="col-12">
                  <p style="color: #4A4A4A; font-size:30px;">Expired date</p>
                  <span style="color: #FF6464; font-size:25px;">
                   <strong> {{ museumFilter.expiry_date }}</strong>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <hr class="dash-b" style="border-color: grey; opacity: 60%;" />
          <div class="row">
            <div class="col-4">
              <div class="row">
                <div class="col-3 text-right">
                  <i
                    class="flaticon-edit-button"
                    style="font-size: 56px; color: #3e7a63"
                  ></i>
                </div>
                <div class="col-9 ">
                  <h4 class="h8" style=" margin-top: 1rem !important;">
                    Content
                  </h4>
                  <p style="color: #3e7a63;">
                    <strong style="font-size: 18px">{{ museumFilter.package.item_max }}</strong> items
                  </p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-5 text-right">
                  <i
                    class="flaticon-qr-code"
                    style="font-size: 56px; color: #3e7a63;"
                  ></i>
                </div>
                <div class="col-7">
                  <h4 class="h8" style=" margin-top: 1rem !important;">
                    Qr-code
                  </h4>
                  <p style="color: #3e7a63;">
                    {{ museumFilter.package.qrcode }}
                  </p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-6 text-right">
                  <i
                    class="flaticon-photo"
                    style="font-size: 56px; color: #3e7a63;"
                  ></i>
                </div>
                <div class="col-6">
                  <h4 class="h8" style=" margin-top: 1rem !important;">Item</h4>
                  <p style="color: #3e7a63;">
                   <strong style="font-size:18px">{{ museumFilter.item_count }} /
                    {{ museumFilter.package.item_max }}</strong> items
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row mt-5">
          <div class="col-4">
            <b-button
              v-b-modal.modal-1
              style="background-color:white; border-color:white;padding-top: 0; padding-right: 0; padding-left: 0;"
              class="col-12 tab"
            >
              <div class="">
                <div class="icon-1 text-center">
                  <i class="flaticon-user"></i>
                </div>

                <p class="mt-4 h7">จำนวน QR Scan ทั้งหมด</p>
                <span class="h8">500 คน</span>
              </div>
            </b-button>
            <div>
              <b-modal id="modal-1" title="จำนวนคนที่ scan">
                <p class="my-4">500 คน</p>
              </b-modal>
            </div>
          </div>
          <div class="col-4">
            <b-button
              v-b-modal.modal-2
              style="background-color:white; border-color:white;padding-top: 0; padding-right: 0; padding-left: 0;"
              class="col-12 tab"
            >
              <div class="">
                <div class="icon-2 text-center">
                  <i class="flaticon-team"></i>
                </div>
                <p class="mt-4 h7">จำนวนห้องจัดแสดง</p>
                <!-- <span class="h8">Room</span> -->
              </div>
            </b-button>
            <div>
              <b-modal id="modal-2" title="จำนวนห้อง">
                <p class="my-4">8 ห้อง</p>
              </b-modal>
            </div>
          </div>
          <div class="col-4">
            <b-button
              v-b-modal.modal-_
              style="background-color:white; border-color:white;padding-top: 0; padding-right: 0; padding-left: 0;"
              class="col-12 tab"
            >
              <div class="">
                <div class="icon-3 text-center">
                  <i class="flaticon-qr-code"></i>
                </div>
                <p class="mt-4 h7">จำนวน QR Scan ของจัดแสดง</p>
                <!-- <span class="h8">Items</span> -->
              </div>
            </b-button>
            <div>
              <b-modal id="modal-_" title="จำนวน scan">
                <p class="my-4">ตู้</p>
                <p class="my-4">400 ครั้ง</p>
              </b-modal>
            </div>
          </div>
          <!-- <div class="col-4 mt-5">
            <div class="col-12 tab">
              <div class="icon-4 text-center">
                <i class="flaticon-witness"></i>
              </div>
              <p class="mt-4 h7">ห้องรับแขก</p>
              <span class="h8">Most Visit (300)</span>
            </div>
          </div> -->

          <!-- graph -->
          <!-- <div class="col-4 mt-5">
            <div class="col-12 tab">
              <apexcharts
                width="300"
                type="bar"
                :options="chartOptions"
                :series="series"
              ></apexcharts>
            </div>
          </div> -->
          <!-- graph -->

          <!-- <div class="col-12 mt-5">
            <div class="col-12">
              <vue-funnel-graph
                :width="width"
                :height="height"
                :labels="labels"
                :values="values"
                :colors="colors"
                :sub-labels="subLabels"
                :direction="direction"
                :gradient-direction="gradientDirection"
                :animated="true"
                :display-percentage="true"
              ></vue-funnel-graph>
            </div>
          </div>-->
          <!-- <canvas id="my-chart"></canvas> -->
        </div>
      </div>
    </div>
    <div v-else>
      <div class="col-12" style="height: 800px">
        <div class="row" style="margin-top:150px">
          <div class="col-4"></div>
          <div class="col text-center">
            <router-link to="/admin/museums/create">
              <button class="btn-create">
                <i class="flaticon-add"></i> CREATE
              </button>
            </router-link>

            <p class="mt-3" style="color:#A8A9B7;">
              กดปุ่ม
              <a href="/admin/museums/create" style="color:#ff6e6e">Create</a>
              เพื่อเริ่มสร้างพิพิธภัณฑ์ใหม่ของคุณ
            </p>
          </div>
          <div class="col-4"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="card p-4 text-center">
      <h4 class="text-mm">พิพิธภัณฑ์ ชาวบางกอก</h4>
      <div class="p-5">
        <div class="card p-3 text-left text-mm">
          <div class="clearfix">
            <h3 class="float-left">Your Package: Small</h3>
            <h6 class="btn btn-light actives float-left ml-2">
              <li>Active</li>
            </h6>
            <button class="btn-mm float-right">upgrade</button>
          </div>
          <div>
            <br />
            <table>
              <tr>
                <td style="width:200px;">Content</td>
                <td>100 Items</td>
              </tr>
              <tr>
                <td>Qr-code life</td>
                <td>Unlimited</td>
              </tr>
              <tr>
                <td>Image/ item</td>g
                <td>6</td>
              </tr>
              <tr>
                <td>Package</td>
                <td>1 mounth</td>
              </tr>
              <tr>
                <td>Expired date</td>
                <td>15 - 1 - 63</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col col-md-2">
            <div class="card" style="padding-top:100px;">
              <div class="card-body text-left pl-4">
                <button class="btn round-mm">V</button>
                <h6>500</h6>
                <span>Visit today</span>
              </div>
            </div>
          </div>
          <div class="col col-md-2">
            <div class="card" style="padding-top:100px;">
              <div class="card-body text-left pl-4">
                <button class="btn round-mm">I</button>
                <h6>60</h6>
                <span>items / 100</span>
              </div>
            </div>
          </div>

          <div class="col col-md-2">
            <div class="card" style="padding-top:100px;">
              <div class="card-body text-left pl-4">
                <button class="btn round-mm">S</button>
                <h6>Saturday</h6>
                <span>Most People (300)</span>
              </div>
            </div>
          </div>

          <div class="col col-md-2">
            <div class="card" style="padding-top:100px;">
              <div class="card-body text-left pl-4">
                <button class="btn round-mm">ห</button>
                <h6>ห้องรับแขก</h6>
                <span>Most Visit (300)</span>
              </div>
            </div>
          </div>

          <div class="col col-md-2">
            <div class="card" style="padding-top:100px;">
              <div class="card-body text-left pl-4">
                <button class="btn round-mm">ป</button>
                <h6>เปียโน</h6>
                <span>Most Scan (489)</span>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>-->
</template>

<script>
import { VueFunnelGraph } from "vue-funnel-graph-js";
import VueApexCharts from "vue-apexcharts";

import paymentOmise from "../../../components/paymentOmise";
export default {
  components: {
    VueFunnelGraph,
    apexcharts: VueApexCharts,
    paymentOmise,
  },
  data() {
    return {
      museum_active: 1,

      chartOptions: {
        chart: {
          id: "vuechart-example",
        },
        xaxis: {
          categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998],
        },
      },
      series: [
        {
          name: "series-1",
          data: [30, 40, 45, 50, 49, 60, 70, 91],
        },
      ],

      //   labels: ["ยอดผู้เข้าชมรายวัน", "Add To Cart", "Buy"],
      //   subLabels: ["Direct", "Social Media", "Ads"],
      //   values: [
      //     // with the given Labels and SubLabels here's what the values represent:
      //     //
      //     // Direct, Social, Ads
      //     //    |      |     |
      //     //    v      v     v
      //     [3000, 2500, 6500], // Segments of "Impressions" from top to bottom
      //     [3000, 1700, 1000], // Segments of "Add To Cart"
      //     [600, 200, 130] // Segments of "Buy"
      //   ],
      //   colors: [
      //     ["#3e7a63", "#3e7a63"], // color set for "Impressions" segment
      //     ["#ffcc57", "#ffcc57"], // color set for "Add To Cart" segment
      //     ["#3631c4", "#3631c4"] // color set for "Buy" segment
      //   ],
      //   direction: "horizontal",
      //   gradientDirection: "horizontal",
      //   height: 300,
      //   width: 800,
      //   selected: null,

      //   options: [
      //     { value: null, text: "Please select an option" },
      //     { value: "museum1", text: "พิพิธภัณฑ์ ไปรษณีย์ สามเสน" },
      //     { value: "add museum", text: "+ เพิ่มพิพิธภัณฑ์" }
      //   ]
    };
  },
  computed: {
    museumFilter() {
      let res = this.user.museums.find((el) => el.id == this.museum_active);
      return res.museum_package;
    },
  },
  async created() {
    await this.fetchUser();
    this.museum_active = this.user.museum_active;
  },
};
</script>

<style>
.tab {
  height: 222px;
  background-color: white;
  padding: 20px 20px;
  border-radius: 20px;
  box-shadow: 3px 5px 5px;
  color: #7070707a;
}
.upgrade {
  height: 50px;
  width: 100px;
  background-color: #ffcc57;
  border-radius: 10px;
  color: white;
  border-style: none;
}
.vl {
  border-left: 6px solid green;
  height: 30px;
}
.icon-1 {
  /* height: 30px; */
  width: 100%;
  background-color: #ff6464;
  /* border-radius: 50%; */
  color: white;
  /* border-style: none; */
  font-size: 36px;
}
.icon-2 {
  /* height: 30px; */
  width: 100%;
  background-color: #ffcc57;
  /* border-radius: 50%; */
  color: white;
  /* border-style: none; */
  font-size: 36px;
}
.icon-3 {
  /* height: 30px; */
  width: 100%;
  background-color: #3e7a63;
  /* border-radius: 50%; */
  color: white;
  /* border-style: none; */
  font-size: 36px;
}
.icon-4 {
  height: 60px;
  width: 60px;
  background-color: #3631c4;
  border-radius: 50%;
  color: white;
  border-style: none;
  font-size: 30px;
}
.dashh {
  margin-top: 5rem!important;
  padding: 50px 40px;
  background-color: white;
  border-radius: 30px;
  box-shadow: 3px 4px 18px;
  color: #7070707a;
}
.h7 {
  color: #4a4a4a;
  font-size: 18px;
}
.h8 {
  font-family: mitr;
  font-weight: 600;
  color: #4a4a4a;
}
.setting {
  
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
  width: 100%;
}
.svg-funnel-js .svg-funnel-js__labels .svg-funnel-js__label .label__title {
  color: #3e7a63 !important;
  font-size: 20px !important;
}
.svg-funnel-js .svg-funnel-js__labels .svg-funnel-js__label .label__value {
  color: #3631c4;
  font-weight: 800;
}
.btn-create {
  padding: 15px 15px;
  width: 80%;
  color: white;
  background-color: #ff6e6e;
  border-radius: 10px;
  font-size: 25px;
}
.setting2 {
  
  background-color: #ff6e6e;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
  width: 100%;
}
</style>
