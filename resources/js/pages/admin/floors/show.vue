<template>
  <div v-if="show">
    <!-- <pre>{{ show }}</pre> -->
    <!-- <div class="col-12 text-center">
      <select v-model="active">
        <option v-for="floor in floors" :key="floor.id" :value="floor.id">{{
          floor.name
        }}</option>
      </select>
    </div> -->
    <div class="col-12">
      <span class="head-muse">พิพิธภัณฑ์ชาวบางกอก</span>
      <!-- <span class="head-muse"></span> -->

      <span class="head-muse" style="color:#3641FB">/ Room</span>
    </div>
    <br />
    <div class="col-12">
      <div class="card table-room">
        <table>
          <thead class="mm-thead">
            <tr>
              <td style="width:70%;">Name</td>
              <td class="text-center" style="width: 40%">Action</td>
              <td class="text-center">Create At</td>
            </tr>
          </thead>
          <tbody class="mm-tbody">
            <tr v-for="room in show.rooms" :key="room.id">
              <td>
                <router-link
                  :to="{ name: 'admin.room.show', params: { id: room.id } }"
                  >{{ room.translation.name }}</router-link
                >
              </td>
              <td class="text-center">
                <router-link
                  :to="{
                    name: 'admin.room.edit',
                    params: { id: room.id }
                  }"
                >
                  <el-button type="warning" round>Edit</el-button>
                </router-link>
              </td>
              <td>15/11/62</td>
            </tr>
          </tbody>
        </table>
        <div
          class="col-12 text-center"
          style="margin-top:70px; margin-bottom:40px;"
        >
          <router-link :to="{ name: 'admin.room.create' }">
            <button class="add-room">
              <i class="flaticon-add"></i> ADD ROOM
            </button>
          </router-link>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  // components: {
  //   ItemShow
  // },
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
    this.create.name = "room";
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
