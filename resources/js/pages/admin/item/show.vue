<template>
  <div v-if="show" class>
    <!-- <img :src="show.qrcode_url" alt />
    <br />
    <a :href="`/item/${show.id}`" target="_blank" class="btn btn-primary">Open</a>

    <hr />-->
    <!-- <pre>{{ show }}</pre> -->
    <div class="col-12"></div>
    <div class="card p-4">
      <div class="clearfix">
        <!-- <router-link to="/admin/items" class="float-left"> -->

        <!-- </router-link> -->
        <div class="col-12">
          <div class="row">
            <div class="col-6">
              <router-link to="/admin/items">
                <i
                  class="flaticon-left-arrow"
                  style="font-size: 25px; cursor: pointer; color:#ffcc57;"
                ></i>
              </router-link>

              <span class="head-muse">พิพิธภัณฑ์ชาวบางกอก</span>
              <!-- <span class="head-muse">/ {{ show.name }}</span> -->

              <span class="head-muse" style="color:#3641FB">/ {{ show.translation.name }}</span>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6"></div>
                <div class="col-3">
                  <div class="setting">
                    <router-link
                      :to="{
                        name: 'admin.item.edit',
                        params: { id: show.id }
                      }"
                    >
                      <span class="flaticon-edit-button">Edit</span>
                    </router-link>
                  </div>
                </div>
                <div class="col-3">
                  <div class="del">
                    <span class @click="deletex(show.id)">Delete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <br />
            <div class="col-4 mt-4">
              <span style="color:#3631c4; font-size:27px;" class="flaticon-photo">
                <!-- <h4 style="color:#3631c4;"></h4> -->
                Image
              </span>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-4" v-for="image in show.images" :key="image.id">
                  <img :src="image.image_url" alt width="100%" height />
                </div>
              </div>
            </div>
            <!-- <div class="col-4 mt-4">
              <div class="col-4"></div>
              <div class="col-12">
                <div class="row">
                  <div class="col-md-4">
                    <img :src="show.images.image_url" />
                  </div>
                </div>
              </div>
            </div>-->
          </div>
          <br />
          <div class="col-4 mt-4">
            <span style="color:#3631c4; font-size:27px;" class="flaticon-placeholder">
              <!-- <h4 style="color:#3631c4;"></h4> -->
              Map (พร้อมระบุตำแหน่ง)
            </span>
          </div>

         
          <div class="col-12 mt-5">
            <b-card no-body>
              <b-tabs pills card v-model="tabIndex">
                <b-tab :title="lang.name" v-for="lang in langConfigs" :key="lang.code">
                  <b-card-text>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <h3 class>Title</h3>
                        <!-- {{ lang.code }} -->
                        <p>{{ show.translation.name }}</p>
                        <!-- <div class> -->
                        <!-- <input
                            v-model="form[lang.code].name"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            class="form-control"
                            type="text"
                            name="name"
                          />
                        <has-error :form="form" field="name" />-->
                        <!-- </div> -->
                      </div>
                      <div class="form-group col-md-6">
                        <h3>Audio</h3>
                        <div class>
                          <audio controls v-if="show.translation" ref="player">
                            <source :src="show.translation.audio_url" type="audio/mpeg" />Your browser does not support the audio element.
                          </audio>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <h3 class>Description</h3>
                        <div class>
                          <!-- <textarea class="form-control" type="text" name="description" />
                          <has-error :form="form" field="description" />-->
                          {{ show.translation.description }}
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <h3 class="label">QrCode</h3>
                        <div class="text">
                          <div class="clearfix">
                            <div class="float-left">
                              <img
                                :src="show.qrcode_url"
                                width="120"
                                style="border:5px soild #305a9a;"
                              />
                              <br />
                            </div>
                            <div class="float-left pl-2">
                              <a
                                :href="`${show.qrcode_url}`"
                                target="_blank"
                                class="btn btn-primary"
                                download
                              >Save as</a>
                              <br />

                              <button
                                class="btn btn-primary mt-3"
                                @click="printimage(show.qrcode_url)"
                              >Print</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </b-card-text>
                </b-tab>
              </b-tabs>
            </b-card>
          </div>
        </div>
      </div>
      <!-- <table class="mm-table">
        <tbody>
          <tr>
            <td class="label">Image</td>
            <td class="text">
              <img :src="show.image_url" height="120" width="300" />
            </td>
          </tr>
          <tr>
            <td class="label">Title</td>
            <td class="text">{{ show.translation.name }}</td>
          </tr>
          <tr>
            <td class="label">Description</td>
            <td class="text">{{ show.translation.description }}</td>
          </tr>

          <tr>
            <td class="label">Audio</td>
            <td class="text">
              <audio controls v-if="show.sound" ref="player">
                <source :src="show.sound.file_url" type="audio/mpeg" />Your browser does not support the audio element.
              </audio>
            </td>
          </tr>
          <tr>
            <td class="label">QrCode</td>
            <td class="text">
              <div class="clearfix">
                <div class="float-left">
                  <img :src="show.qrcode_url" width="120" style="border:5px soild #305a9a;" />
                </div>
                <div class="float-left pl-2">
                  <a
                    :href="`${show.qrcode_url}`"
                    target="_blank"
                    class="btn btn-primary"
                    download
                  >Save as</a>
                  <br />

                  <button class="btn btn-primary mt-3" @click="printimage(show.qrcode_url)">Print</button>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>-->
    </div>

    <!-- <ItemShow :item="show" /> -->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import ItemShow from "~/components/ItemShow";
export default {
  data() {
    return {
      tabIndex: 0
    };
  },
  components: {
    ItemShow
  },
  watch: {
    tabIndex() {
      let ti = this.tabIndex;
      if (ti == 2) {
        this.fetch({ id: this.id, lang: "cn" });
      } else if (ti == 1) {
        this.fetch({ id: this.id, lang: "en" });
      } else {
        this.fetch({ id: this.id, lang: "th" });
      }
    }
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
    },
    tabChange(e) {
      console.log(e);
    }
  },
  created() {
    console.log("12e21");
    this.fetch({ id: this.id, lang: "th" });
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
  /* right: 20px; */
  /* position: absolute; */
  background-color: #3631c4;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
  text-align: center;
}
.del {
  background-color: #ff6464;
  color: whitesmoke;
  padding: 10px 15px;
  border-radius: 10px;
  text-align: center;
  cursor: pointer;
}
.nav-pills .nav-link.active {
  background-color: #ffcc57 !important;
  opacity: 100% !important;
}
/* .card-header {
  background-color: white !important;
} */
.card {
  border: none;
  border-radius: 20px;
}
h1,
h2,
h3,
h4,
h5 {
  font-family: mitr !important;
}
</style>
