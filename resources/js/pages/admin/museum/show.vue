<template>
  <div>
    <!-- <pre>{{ show }}</pre> -->
    <!-- <h2>{{ show.name }}</h2> -->
    <!-- <hr /> -->
    <!-- <a :href="show.address_url" target="_blank" rel="noopener noreferrer">Google Map</a> -->
    <div class="col-12">
      <div class="dropdown text-center" style="color:#4A4A4A">
        <!-- <button
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
        </button>-->

        <select v-model="active">
          <option
            v-for="museum in user.museums"
            :key="museum.id"
            :value="museum.id"
            >{{ museum.name }}</option
          >
        </select>
        <p>(Bangkok Museum)</p>
      </div>
    </div>
    <div class="col-12">
      <span class="head-muse"></span>

      <span class="head-muse" style="color:#3641FB">/ Floor</span>
    </div>
    <br />
    <div class="col-12">
      <div class="card table-flo">
        <table>
          <thead class="mm-thead">
            <tr>
              <td style="width:60%;">Name</td>
              <td class="text-center" style="width: 10%">Action</td>
              <td class="text-center">Create At</td>
            </tr>
          </thead>
          <br />
          <tbody class="mm-tbody">
            <tr
              v-for="floor in filterFloor(show, user.museum_active)"
              :key="floor.id"
            >
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
                <router-link
                  :to="{
                    name: 'admin.floor.edit',
                    params: { id: floor.id }
                  }"
                >
                  <el-button type="warning" round>Edit</el-button>
                </router-link>
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
          <router-link
            :to="{
              name: 'admin.floors.create'
            }"
          >
            <button class="add-floor">
              <i class="flaticon-add"></i> ADD FLOOR
            </button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data() {
    return {
      active: 0
    };
  },
  computed: {
    ...mapGetters({
      show: "floor/items"
    }),

    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    filterFloor(array, museum_active) {
      console.log(array);
      console.log(this.active);

      return array.filter(el => el.museum_id == this.active);
    },
    ...mapActions({
      fetch: "floor/fetch",
      del: "museum/del"
    })
  },
  created() {
    this.fetch();
    this.active = this.user.museum_active;
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
.add-floor {
  background-color: #ff6e6e;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
</style>
