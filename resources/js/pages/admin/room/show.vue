<template>
  <div v-if="show">
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
      <span class="head-muse">/ ชั้น 1</span>

      <span class="head-muse"> / {{ show.name }}</span>
      <span class="head-muse" style="color:#3641FB"> / Item</span>
    </div>
    <br />
    <div class="col-12">
      <div class="card  table-room">
        <table>
          <thead class="mm-thead">
            <tr>
              <td style="width:50%;">Name</td>
              <td class="text-center" style="width: 30%">Action</td>
              <td class="text-center">Create At</td>
            </tr>
          </thead>
          <tbody class="mm-tbody ">
            <tr v-for="item in show.items" :key="item.id">
              <td>
                <router-link
                  :to="{
                    name: 'admin.item.show',
                    params: { id: item.id },
                    query: { room_id: show.id }
                  }"
                  >{{ item.name }}</router-link
                >
              </td>
              <td class="text-center">
                <router-link
                  :to="{
                    name: 'admin.item.edit',
                    params: { id: show.id }
                  }"
                >
                  <el-button type="warning" round>Edit</el-button>
                </router-link>
              </td>
              <td>{{ item.created_at }}</td>
            </tr>
          </tbody>
        </table>
        <div
          class="col-12 text-center"
          style="margin-top:70px; margin-bottom:40px;"
        >
          <router-link
            :to="{
              name: 'admin.item.create',
              query: { room_id: show.id }
            }"
          >
            <button class="add-room">
              <i class="flaticon-add"></i> ADD ITEM
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
  computed: {
    ...mapGetters({
      show: "room/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "room/show",
      del: "room/del"
    })
  },
  created() {
    this.fetch(this.id);
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
