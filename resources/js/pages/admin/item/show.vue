<template>
  <div v-if="show" class>
    <!-- <img :src="show.qrcode_url" alt />
    <br />
    <a :href="`/item/${show.id}`" target="_blank" class="btn btn-primary">Open</a>

    <hr />-->
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
    <div class="card p-4">
      <div class="clearfix">
        <router-link to="/admin/museums" class="float-left">
          <i class="flaticon-left-arrow" style="font-size: 25px;"></i>
        </router-link>
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <span class="head-muse">พิพิธภัณฑ์ชาวบางกอก</span>
              <span class="head-muse">/ {{ show.name }}</span>

              <span class="head-muse" style="color:#3641FB">
                / {{ show.name }}</span
              >
            </div>
            <div class="col-6">
              <div class=" setting">
                <i class="flaticon-edit-button"></i> Edit
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <table class="mm-table">
        <tbody>
          <tr>
            <td class="label">Title</td>
            <td class="text">{{ show.name }}</td>
          </tr>
          <tr>
            <td class="label">Description</td>
            <td class="text">{{ show.description }}</td>
          </tr>
          <tr>
            <td class="label">Image</td>
            <td class="text">
              <img :src="show.image_url" height="120" width="300" />
            </td>
          </tr>
          <tr>
            <td class="label">Audio</td>
            <td class="text">
              <audio controls v-if="show.sound" ref="player">
                <source :src="show.sound.file_url" type="audio/mpeg" />
                Your browser does not support the audio element.
              </audio>
            </td>
          </tr>
          <tr>
            <td class="label">QrCode</td>
            <td class="text">
              <div class="clearfix">
                <div class="float-left">
                  <img
                    :src="show.qrcode_url"
                    width="120"
                    style="border:5px soild #305a9a;"
                  />
                </div>
                <div class="float-left pl-2">
                  <a
                    :href="`${show.qrcode_url}`"
                    target="_blank"
                    class="btn btn-primary"
                    download
                    >Save as</a
                  >
                  <br />

                  <button
                    class="btn btn-primary mt-3"
                    @click="printimage(show.qrcode_url)"
                  >
                    Print
                  </button>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <hr />
    <router-link
      :to="{
        name: 'admin.item.edit',
        params: { id: show.id }
      }"
    >
      <button class="btn btn-warning">edit</button>
    </router-link>
    <a href></a>
    <button class="btn btn-danger" @click="deletex(show.id)">delete</button>
    <hr />

    <!-- <ItemShow :item="show" /> -->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import ItemShow from "~/components/ItemShow";
export default {
  components: {
    ItemShow
  },
  computed: {
    ...mapGetters({
      show: "item/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "item/show",

      del: "item/del"
    }),
    async deletex(id) {
      await this.del(id);
      this.$router.push({
        name: "admin.room.show",
        params: { id: this.show.room_id }
      });
    },
    printimage(url) {
      var URL = url;

      var W = window.open(URL);

      W.window.print();
    }
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
  right: 20px;
  position: absolute;
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
}
</style>
