<template>
  <div>
    <!-- <pre>{{ show }}</pre> -->
    <!-- <h2>{{ show.name }}</h2> -->
    <!-- <hr /> -->
    <!-- <a :href="show.address_url" target="_blank" rel="noopener noreferrer">Google Map</a> -->
    <div class="col-12">
      <div class="dropdown text-center" style="color:#4A4A4A">
        <button
          class="btn  dropdown-toggle text-center"
          type="button"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          style="font-size:30px; color:#4A4A4A"
        >
          พิพิธภัณฑ์ ชาวบางกอก
        </button>
        <button class="setting">
          <i class="flaticon-wheel"></i>
          setting
        </button>
        <p>(Bangkok Museum)</p>
        <div
          class="dropdown-menu text-center"
          aria-labelledby="dropdownMenuButton"
        >
          <a class="dropdown-item text-center" href="#" style="font-size:25px;">
            <i class="flaticon-add"></i> เพิ่มพิพิธภัณฑ์</a
          >
        </div>
      </div>
    </div>
    <div class="col-12">
      <span class="head-muse">{{ show.name }}</span>

      <span class="head-muse" style="color:#3641FB"> / Floor</span>
    </div>
    <br />
    <div class="col-12">
      <div class="card  table-flo">
        <!-- <div class="clearfix">
        <router-link to="/admin/museums" class="float-left">
          <img
            src="/icon/left-arrow.png"
            width="40"
            style="margin-top:rem(10);"
          />
        </router-link>
      </div>
      <hr />
      <div>
        <button id="createbtn" style="width:200px;">Create</button>
        <hr /> -->
        <!-- <div class="row"> -->
        <!-- <div class="col-md-8">
            <table class="mm-table">
              <tbody>
                <tr>
                  <td class="label">Name</td>
                  <td class="text">{{show.name}}</td>
                </tr>
                <tr>
                  <td class="label">Locate Url</td>
                  <td class="text">{{show.address_url}}</td>
                </tr>
                <tr>
                  <td class="label">Phone number</td>
                  <td class="text">{{show.phonenumber}}</td>
                </tr>
                <tr>
                  <td class="label">Email</td>
                  <td class="text">{{show.email}}</td>
                </tr>
                <tr>
                  <td class="label">Facebook</td>
                  <td class="text">{{show.facebook}}</td>
                </tr>
                <tr>
                  <td class="label">Instragram</td>
                  <td class="text">{{show.instagram}}</td>
                </tr>
                <tr>
                  <td class="label">Description</td>
                  <td class="text">{{show.description}}</td>
                </tr>
                <tr>
                  <td class="label">Language support</td>
                  <td class="text">
                    <button class="btnlang active">
                      <img src="https://sv1.picz.in.th/images/2019/12/19/iniVWR.png" />
                    </button>
                    <button class="btnlang">
                      <img src="https://sv1.picz.in.th/images/2019/12/19/inirxz.png" />
                    </button>
                    <button class="btnlang">
                      <img src="https://sv1.picz.in.th/images/2019/12/19/inipeZ.png" />
                    </button>
                  </td>
                </tr>
                <tr>
                  <td class="label">Expire Date</td>
                  <td class="text">{{show.expried_date}}</td>
                </tr>
              </tbody>
            </table>
          </div> -->
        <!-- <div class="col-md-4">
            <img :src="show.image_url" class="w-50" />
          </div> -->
        <!-- <div class="col-12 mt-2 clearfix">
            <div class="float-right">
              <el-button type="danger" round>Reject</el-button>
              <el-button type="success" round>Approve</el-button>
            </div>
          </div> -->
        <!-- </div> -->
        <!-- </div> -->
        <table>
          <thead class="mm-thead">
            <tr>
              <td style="width:60%;">Name</td>
              <td class="text-center" style="width: 10%">Action</td>
              <td class="text-center">Create At</td>
            </tr>
          </thead>
          <tbody class="mm-tbody ">
            <tr v-for="floor in show.floors" :key="floor.id">
              <td>
                <router-link
                  :to="{
                    name: 'admin.floors.show',
                    params: { id: floor.id }
                  }"
                >
                  <p>{{ floor.translation.name }}</p>
                </router-link>
              </td>
              <td class="text-center">
                <el-button type="warning" round>Edit</el-button>
              </td>
              <td class="text-center">
                <router-link
                  :to="{
                    name: 'admin.floors.show',
                    params: { id: floor.id }
                  }"
                >
                  <!-- <p class="btn btn-warning">Edit</p> -->
                  {{ floor.created_at }}
                </router-link>
              </td>
            </tr>
          </tbody>
        </table>
        <div
          class="col-12 text-center"
          style="margin-top:70px; margin-bottom:40px;"
        >
          <button class="add-floor">
            <i class="flaticon-add"></i> ADD FLOOR
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "museum/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "museum/show",
      del: "museum/del"
    })
  },
  created() {
    this.fetch(this.id);
  }
};
</script>
<style>
.head-muse {
  font-size: 25px;
}
.table-flo {
  border: none;
  border-radius: 20px;
  padding: 20px 50px;
}
.setting {
  right: 0;
  position: absolute;
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
.add-floor {
  background-color: #ff6e6e;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
</style>
