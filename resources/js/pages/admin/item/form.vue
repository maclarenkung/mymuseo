<template>
  <div>
    <!-- <pre>{{ show }}</pre> -->
    <div class="dashh">
      <!-- <div class="col-12 text-center">
        <div class="col-4 m-auto">
          <select v-model="museum_active" class="form-control">
            <option
              class="form-control"
              v-for="museum in user.museums"
              :key="museum.id"
              :value="museum.id"
              >{{ museum.name }}</option
            >
          </select>
        </div>
      </div>-->
      <!-- <focus-point v-model="focus">
        <img
          :src="filterMuse ? filterMuse.locate_image_url : ''"
          width="100%"
        />
      </focus-point>

      <div v-if="focus.x && focus.y">x: {{ focus.x }} | y: {{ focus.y }}</div>-->
      <div class="clearfix">
        <router-link to="/admin/items" class="float-left">
          <i
            class="flaticon-left-arrow"
            style="font-size: 25px; cursor: pointer; color:#ffcc57;"
          ></i>
        </router-link>
        <span class="float-left ml-4" style="font-size:25px;">{{
          id ? "Edit Item" : "Create Item"
        }}</span>
      </div>
      <!-- <pre>{{ form }}</pre> -->
      <!-- <pre>{{ show }}</pre> -->

      <form
        @submit.prevent="submitForm"
        @keydown="form.onKeydown($event)"
        class="mt-5"
      >
        <!-- Name -->
        <div class="row">
          <div class="col-4">
            <span class="flaticon-floor" style="font-size:20px; color:#3631c4">
              <!-- <h4>asdasd</h4> -->
              Floor
            </span>
            <br />
            <select
              v-model="floor_active"
              @change="loadRoom()"
              class="form-control"
              style="width: 100%; color:#3631c4;"
            >
              <option value>please select</option>
              <option
                :value="floor.id"
                v-for="(floor, index) in filterFloor(floors)"
                :key="index"
                >{{ floor.translation.name }}</option
              >
            </select>
          </div>
          <div class="col-4">
            <span
              class="flaticon-open-exit-door"
              style="font-size:20px; color:#3631c4"
            >
              <!-- <h4>asdasd</h4> -->
              Room
            </span>
            <br />
            <select
              v-model="form.all.room_id"
              required
              style="width: 100%"
              class="form-control"
            >
              <option value="1">please select</option>
              <option
                :value="room.id"
                v-for="(room, index) in rooms"
                :key="index"
                >{{ room.translation.name }}</option
              >
            </select>
          </div>

          <div class="col-12"></div>
          <br />
          <div class="col-4 mt-4">
            <span style="color:#3631c4; font-size:20px;" class="flaticon-photo">
              <!-- <h4 style="color:#3631c4;"></h4> -->
              Image (จำนวนไม่เกิน 6)
            </span>
          </div>

          <div class="col-4 mt-4">
            <form>
              <div class="custom-file">
                <input
                  type="file"
                  class="custom-file-input"
                  id="customFile"
                  name="image"
                  @change="setImg"
                />
                <has-error :form="form" field="image" />
                <label class="custom-file-label" for="customFile">
                  <i class="flaticon-upload"></i> Upload Image
                </label>
              </div>
            </form>
          </div>
          <div class="col-4"></div>
          <div class="col-12">
            <div class="row">
              <div
                class="col-md-4"
                v-for="(img, index) in form.all.image_url"
                :key="index"
              >
                <div class="card">
                  <div class="card-body">
                    <img :src="img" width="100%" />
                  </div>
                  <div class="card-footer">
                    <button @click="removeImg(index)" type="button">ลบ</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br />
          <div class="col-12 mt-4">
            <span
              style="color:#3631c4; font-size:20px;"
              class="flaticon-placeholder"
            >
              <!-- <h4 style="color:#3631c4;"></h4> -->
              Map (พร้อมระบุตำแหน่ง)
            </span>
          </div>
          <div class="col-8 mt-4">
            <focus-point v-model="focus">
              <template slot="pin">
                <!-- <img src="https://sv1.picz.in.th/images/2020/03/09/QdzRr1.png" alt width="10%" /> -->
                <i
                  class="fas fa-map-marker-alt"
                  style="color: #C70039; font-size:30px;"
                ></i>
              </template>
              <img
                :src="findFloor ? findFloor.map_image_url : ''"
                width="100%"
              />
            </focus-point>
            <div v-if="focus.x && focus.y">
              x: {{ focus.x }} | y: {{ focus.y }}
            </div>
          </div>

          <div class="col-12 mt-5">
            <b-card no-body>
              <b-tabs pills card>
                <b-tab
                  :title="lang.name"
                  :active="lang.code == 'th'"
                  v-for="lang in langConfigs"
                  :key="lang.code"
                >
                  <b-card-text>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label class>Title</label>
                        <div class>
                          <input
                            v-model="form[lang.code].name"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            class="form-control"
                            type="text"
                            name="name"
                          />
                          <has-error :form="form" field="name" />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Audio</label>
                        <div class>
                          <input
                            class="form-control"
                            type="file"
                            name="image"
                            @change="uploadAudio($event, lang.code)"
                          />
                          <has-error :form="form" field="file" />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label class>Description</label>
                        <div class>
                          <textarea
                            v-model="form[lang.code].description"
                            :class="{
                              'is-invalid': form.errors.has('description'),
                            }"
                            class="form-control"
                            type="text"
                            name="description"
                          />
                          <has-error :form="form" field="description" />
                        </div>
                      </div>
                    </div>
                  </b-card-text>
                </b-tab>
              </b-tabs>
            </b-card>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-7 offset-md-5 d-flex mt-5">
            <!-- Submit Button -->
            <v-button
              :loading="form.busy"
              id="createbtn2"
              style="width:130px;"
              class="text-white colorr"
              >{{ id ? "UPDATE" : "CREATE" }}</v-button
            >
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import { mapActions, mapGetters } from "vuex";
import FocusPoint from "vue-focuspoint-component";

export default {
  components: {
    FocusPoint,
  },
  data: () => ({
    focus: "",
    form: new Form({
      all: {
        room_id: "",
        locate_x: 0,
        locate_y: 0,
        image_url: [],
      },
      th: {
        name: "ตู้",
        description:
          "ตู้ทรงเหลี่ยม มี 4 ขา ด้านหน้ามีบานประตูกระจก 2 บาน มี 3 ชั้น ที่บานประตูมีกุญแจล็อก และปุ่มจับ 2 ปุ่ม ใช้สำหรับใส่ของจัดแสดง เช่น ถ้วยเบญจรงค์",
        image_url: "",
        file_url: "",
      },
      en: {
        name: "Cupboard",
        description:
          "Square shape cabinet with 4 legs. The front has 2 glass doors. There are 3 layers.The door has a lock and 2 buttons used for storing items such as Benjarong cups.",
        image_url: "",
        file_url: "",
      },
      cn: {
        name: "內閣",
        description:
          "四腿方形櫃子。前面有2個玻璃門。共3層。Î門上有一個鎖和2個用於存放Benjarong杯子等物品的按鈕。",
        image_url: "",
        file_url: "",
      },
    }),
    floor_active: 1,
    image: "",
    file: "",
  }),
  computed: {
    // room_id() {
    //   return parseInt(this.$route.query.room_id);
    // },
    ...mapGetters({
      show: "item/show",
      floors: "floor/items",
      rooms: "room/items",
      museum_active: "museum/museum_active",
    }),

    id() {
      return parseInt(this.$route.params.id);
    },
    filterMuse() {
      return this.user.museums.find((el) => el.id == this.museum_active);
    },
    findFloor(){
      return  this.floors.find(el=> el.id == this.floor_active)
    }
  },
  // components: {
  //   FocusPoint
  // },
  methods: {
    filterFloor(array, museum_active) {
      console.log(array);

      return array.filter((el) => el.museum_id == this.museum_active);
    },
    async setImg(e) {
      if (this.form.all.image_url.length >= 6) {
        alert("จำนวนไฟล์เกิน");
        return false;
      }
      this.image = e.target.files[0];
      let img = await this.upImg({
        image: this.image,
        path: "items",
      });
      this.form.all.image_url.push(img);
    },
    setFile(e) {
      this.file = e.target.files[0];
    },
    async uploadAudio(e, lang) {
      console.log("event", e);
      console.log("lang", lang);

      this.form[lang].file_url = await this.uploadFile({
        file: e.target.files[0],
        path: "items",
      });
    },
    submitForm() {
      if (this.id) {
        this.update();
      } else {
        this.save();
      }
    },
    async save() {
      // this.form.file_url = await this.uploadFile({
      //   file: this.file,
      //   path: "items"
      // });

      this.form.room_id;

      this.form.all.locate_x = this.focus.x;
      this.form.all.locate_y = this.focus.y;

      const { data } = await this.form.post("/api/items");

      if (data) {
        this.$router.push({
          name: "admin.room.show",
          params: { id: this.room_id }
        });
      }
    },
    loadRoom() {
      console.log("sss");
      this.fetchRoom(this.floor_active);
      this.form.all.room_id = this.rooms[0].id;
    },
    removeImg(index) {
      this.$delete(this.form.all.image_url, index);
    },
    async update() {
      if (this.image) {
        this.form.image_url = await this.upImg({
          image: this.image,
          path: "items",
        });
      }
      const { data } = await this.form.put(`/api/items/${this.id}`);

      if (data) {
        this.$router.push({
          name: "admin.item.show",
          params: { id: this.show.id },
        });
      }
    },
    ...mapActions({
      fetch: "item/show",
      fetchFloors: "floor/fetch",
      fetchRoom: "room/fetch",
    }),
  },
  async created() {
    console.log(this.id);
    if (this.id) {
      await this.fetch(this.id);
      this.form.keys().forEach((key) => {
        this.form[key] = this.show[key];
      });
    }
    this.fetchFloors();
    this.fetchRoom(this.floor_active);
    // this.museum_active = this.user.museum_active;
  },
};
</script>

<style scoped>
body {
  font-family: "Mitr", sans-serif !important;
}
.colorr {
  background: #305a9a;
}
.form-drop {
  border-radius: 10px;
  border-color: aqua;
  width: 100%;
}
input,
textarea {
  border-color: #305a9a;
}
textarea {
  min-height: 350px;
}
label {
  color: #305a9a;
}
.dashh {
  padding: 50px 40px;
  background-color: white;
  border-radius: 30px;
  box-shadow: 3px 5px 5px;
  color: #7070707a;
  margin-bottom: 100px !important;
}
.clearfix {
  color: #3631c4;
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
#createbtn2 {
  padding-bottom: 46px;
  border-radius: 10px;
  border-color: #ff6464;
  height: 40px;
  background-color: #ff6464;
  font-size: 24px;
}
h1,
h2,
h3,
h4,
h5 {
  font-family: mitr !important;
}
label[data-v-74ec3927] {
  color: #3631c4;
}
input[data-v-74ec3927],
textarea[data-v-74ec3927] {
  border-color: aqua;
}
.focus-point-pin {
  display: none !important;
}
</style>
<style lang="scss">
@import "./node_modules/vue-focuspoint-component/src/scss/focus-point";

// overwrite variables from the simple theme
// $focuspoint-background: rgba(0, 0, 255, 0);
// $focuspoint-border: none;
// $focuspoint-radius: none;
// find more variables in /src/scss/_focus-point-variables.scss

// @import "./node_modules/vue-focuspoint-component/src/scss/focus-point-theme";
</style>
