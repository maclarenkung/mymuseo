<template>
  <div v-if="show">
    <!-- <h2>{{ show.name }}</h2> -->
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
      <span class="head-muse">พิพิธภัณฑ์ชาวบางกอก</span>
      <span class="head-muse">/ {{ show.name }}</span>

      <span class="head-muse" style="color:#3641FB"> / Room</span>
    </div>
    <br />
    <div class="col-12">
      <div class="card  table-room">
        <table>
          <thead class="mm-thead">
            <tr>
              <td style="width:70%;">Name</td>
              <td class="text-center" style="width: 40%">Action</td>
              <td class="text-center">Create At</td>
            </tr>
          </thead>
          <tbody class="mm-tbody ">
            <tr v-for="room in show.rooms" :key="room.id">
              <td>
                <router-link
                  :to="{ name: 'admin.room.show', params: { id: room.id } }"
                  >{{ room.name }}</router-link
                >
              </td>
              <td class="text-center">
                <el-button type="warning" round>Edit</el-button>
              </td>
              <td>15/11/62</td>
            </tr>
          </tbody>
        </table>
        <div
          class="col-12 text-center"
          style="margin-top:70px; margin-bottom:40px;"
        >
          <button class="add-room">
            <i class="flaticon-add"></i> ADD ROOM
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "floor/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "floor/show",
      del: "floor/del"
    })
  },
  created() {
    this.fetch(this.id);
  },
  mounted() {
    this.create.name = "floor";
  }
};
</script>

<style>
.table-room {
  border: none;
  border-radius: 20px;
  padding: 20px 50px;
  background-color: white;
}
.head-muse {
  font-size: 25px;
}
.add-room {
  background-color: #ff6e6e;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
.setting {
  right: 0;
  position: absolute;
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
</style>
