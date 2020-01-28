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
        <div class="text-center">
          <select v-model="museum_active">
            <option
              v-for="museum in user.museums"
              :key="museum.id"
              :value="museum.id"
              >{{ museum.name }}</option
            >
          </select>

          <button @click="fetchUser()">refresh</button>
          <button class="setting">
            <i class="flaticon-wheel"></i>
            setting
          </button>
          <!-- <p>{{}}</p> -->
          <div
            class="dropdown-menu text-center"
            aria-labelledby="dropdownMenuButton"
          >
            <a
              class="dropdown-item text-center"
              href="#"
              style="font-size:25px;"
            >
              <i class="flaticon-add"></i> เพิ่มพิพิธภัณฑ์
            </a>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="container mt-5 dashh">
          <div class="row">
            <div class="col-6">
              <span style="font-size: 35px; color:#4A4A4A">Your package :</span>
              <span style="color: #3e7a63; font-size:35px;">{{
                museumFilter.package.name
              }}</span>
              <br />
              <br />
              <span style="color: #4A4A4A; font-size:24px;">Package :</span>
              <span style="color: #3e7a63; font-size:24px;">1 month</span>
            </div>
            <div class="col-6 text-right">
              <div class="row">
                <div class="col-8">
                  <p style="color: #4A4A4A; font-size:24px;">Expired date</p>
                  <span style="color: #FF6464; font-size:35px;">{{
                    museumFilter.expiry_date
                  }}</span>
                </div>
                <div class="col-4" style="margin-top:30px">
                  <button class="upgrade">upgrade</button>
                </div>
              </div>
            </div>
          </div>
          <hr class="dash-b" style="border-color: #1FE2D4;" />
          <div class="row">
            <div class="col-4">
              <div class="row">
                <div class="col-6 text-right">
                  <i
                    class="flaticon-edit-button"
                    style="font-size: 50px; color: #3e7a63"
                  ></i>
                </div>
                <div class="col-6">
                  <h4 class="h8">Content</h4>
                  <p style="color: #3e7a63;">
                    {{ museumFilter.package.item_max }} items
                  </p>
                  <!-- <i class="vl"></i> -->
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-6 text-right">
                  <i
                    class="flaticon-qr-code"
                    style="font-size: 50px; color: #3e7a63;"
                  ></i>
                </div>
                <div class="col-6">
                  <h4 class="h8">Qr-code</h4>
                  <p style="color: #3e7a63;">
                    {{ museumFilter.package.qrcode }}
                  </p>
                  <!-- <i class="vl"></i> -->
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="row">
                <div class="col-6 text-right">
                  <i
                    class="flaticon-photo"
                    style="font-size: 50px; color: #3e7a63;"
                  ></i>
                </div>
                <div class="col-6">
                  <h4 class="h8">Item</h4>
                  <p style="color: #3e7a63;">
                    {{ museumFilter.item_count }} /
                    {{ museumFilter.package.item_max }} items
                  </p>
                  <!-- <i class="vl"></i> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row mt-5">
          <div class="col-4">
            <div class="col-10 tab">
              <div class="icon-1 text-center">
                <i class="flaticon-user"></i>
              </div>

              <p class="mt-4 h7">500</p>
              <span class="h8">Visit today</span>
            </div>
          </div>
          <div class="col-4">
            <div class="col-10 tab">
              <div class="icon-2 text-center">
                <i class="flaticon-team"></i>
              </div>

              <p class="mt-4 h7">Saturday</p>
              <span class="h8">Most People (300)</span>
            </div>
          </div>
          <div class="col-4">
            <div class="col-10 tab">
              <div class="icon-3 text-center">
                <i class="flaticon-qr-code"></i>
              </div>

              <p class="mt-4 h7">เปียโน</p>
              <span class="h8">Most Scan (489)</span>
            </div>
          </div>
          <div class="col-4 mt-5">
            <div class="col-10 tab">
              <div class="icon-4 text-center">
                <i class="flaticon-witness"></i>
              </div>
              <p class="mt-4 h7">ห้องรับแขก</p>
              <span class="h8">Most Visit (300)</span>
            </div>
          </div>
          <div class="col-4 mt-5">
            <div class="col-10 tab">
              <!-- <vue-funnel-graph
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
              ></vue-funnel-graph> -->
            </div>
          </div>
          <div class="col-12 mt-5">
            <div class="col-10">
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
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      User No museum
      <router-link to="/admin/museums/create">
        <button>Create</button>
      </router-link>
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

export default {
  components: {
    VueFunnelGraph
  },
  data() {
    return {
      labels: ["ยอดผู้เข้าชมรายวัน", "Add To Cart", "Buy"],
      subLabels: ["Direct", "Social Media", "Ads"],
      values: [
        // with the given Labels and SubLabels here's what the values represent:
        //
        // Direct, Social, Ads
        //    |      |     |
        //    v      v     v
        [3000, 2500, 6500], // Segments of "Impressions" from top to bottom
        [3000, 1700, 1000], // Segments of "Add To Cart"
        [600, 200, 130] // Segments of "Buy"
      ],
      colors: [
        ["#3e7a63", "#3e7a63"], // color set for "Impressions" segment
        ["#ffcc57", "#ffcc57"], // color set for "Add To Cart" segment
        ["#3631c4", "#3631c4"] // color set for "Buy" segment
      ],
      direction: "horizontal",
      gradientDirection: "horizontal",
      height: 300,
      width: 800,
      selected: null,
      museum_active: 1,
      options: [
        { value: null, text: "Please select an option" },
        { value: "museum1", text: "พิพิธภัณฑ์ ไปรษณีย์ สามเสน" },
        { value: "add museum", text: "+ เพิ่มพิพิธภัณฑ์" }
      ]
    };
  },
  computed: {
    museumFilter() {
      let res = this.user.museums.find(el => el.id == this.museum_active);
      return res.museum_package;
    }
  },
  created() {
    this.museum_active = this.user.museum_active;
  }
};
</script>

<style>
.tab {
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
  height: 60px;
  width: 60px;
  background-color: #ff6464;
  border-radius: 50%;
  color: white;
  border-style: none;
  font-size: 30px;
}
.icon-2 {
  height: 60px;
  width: 60px;
  background-color: #ffcc57;
  border-radius: 50%;
  color: white;
  border-style: none;
  font-size: 30px;
}
.icon-3 {
  height: 60px;
  width: 60px;
  background-color: #3e7a63;
  border-radius: 50%;
  color: white;
  border-style: none;
  font-size: 30px;
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
  padding: 50px 40px;
  background-color: white;
  border-radius: 30px;
  box-shadow: 3px 5px 5px;
  color: #7070707a;
}
.h7 {
  color: #4a4a4a;
  font-size: 25px;
}
.h8 {
  color: #4a4a4a;
}
.setting {
  right: 0;
  position: absolute;
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
.svg-funnel-js .svg-funnel-js__labels .svg-funnel-js__label .label__title {
  color: #3e7a63 !important;
  font-size: 20px !important;
}
.svg-funnel-js .svg-funnel-js__labels .svg-funnel-js__label .label__value {
  color: #3631c4;
  font-weight: 800;
}
</style>
