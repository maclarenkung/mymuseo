<template>
  <div>
    <div class="dashh">
      <div class="clearfix">
        <router-link to="/admin/items" class="float-left">
          <i class="flaticon-left-arrow" style="font-size: 25px; cursor: pointer; color:#ffcc57;"></i>
        </router-link>
        <span class="float-left ml-4" style="font-size:25px;">{{ id ? "Edit Item" : "Create Item" }}</span>
      </div>
      <!-- <pre>{{ form }}</pre> -->
      <!-- <pre>{{ show }}</pre> -->

      <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)" class="mt-5">
        <!-- Name -->
        <div class="row">
          <div class="col-4">
            <span class="flaticon-floor" style="font-size:20px; color:#3631c4">
              <!-- <h4>asdasd</h4> -->
              Floor
            </span>
            <br />
            <select v-model="floor_active" @change="loadRoom()" style="width: 100%; color:#3631c4;">
              <option value>please select</option>
              <option
                :value="floor.id"
                v-for="(floor, index) in floors"
                :key="index"
              >{{ floor.translation.name }}</option>
            </select>
          </div>
          <div class="col-4">
            <span class="flaticon-open-exit-door" style="font-size:20px; color:#3631c4">
              <!-- <h4>asdasd</h4> -->
              Room
            </span>
            <br />
            <select v-model="form.all.room_id" required style="width: 100%">
              <option value>please select</option>
              <option
                :value="room.id"
                v-for="(room, index) in rooms"
                :key="index"
              >{{ room.translation.name }}</option>
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
              <div class="col-md-4" v-for="(img, index) in form.all.image_url" :key="index">
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
          <div class="col-4 mt-4">
            <span style="color:#3631c4; font-size:20px;" class="flaticon-placeholder">
              <!-- <h4 style="color:#3631c4;"></h4> -->
              Map (พร้อมระบุตำแหน่ง)
            </span>
          </div>
          <div class="col-4 mt-4">
            <form>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" />
                <label class="custom-file-label" for="customFile">
                  <i class="flaticon-upload"></i> Upload Map
                </label>
              </div>
            </form>
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
                          <input class="form-control" type="file" name="image" @change="setFile" />
                          <has-error :form="form" field="file" />
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label class>Description</label>
                        <div class>
                          <textarea
                            v-model="form[lang.code].description"
                            :class="{
                              'is-invalid': form.errors.has('description')
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
            >{{ id ? "UPDATE" : "CREATE" }}</v-button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from "vform";
import { mapActions, mapGetters } from "vuex";

export default {
  data: () => ({
    form: new Form({
      all: {
        room_id: 1,
        image_url: []
      },
      th: {
        name: "",
        description: "",
        image_url: "",
        file_url: ""
      },
      en: {
        name: "",
        description: "",
        image_url: "",
        file_url: ""
      },
      cn: {
        name: "",
        description: "",
        image_url: "",
        file_url: ""
      }
    }),
    floor_active: 1,
    image: "",
    file: ""
  }),
  computed: {
    // room_id() {
    //   return parseInt(this.$route.query.room_id);
    // },
    ...mapGetters({
      show: "item/show",
      floors: "floor/items",
      rooms: "room/items"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    async setImg(e) {
      if (this.form.all.image_url.length >= 6) {
        alert("จำนวนไฟล์เกิน");
        return false;
      }
      this.image = e.target.files[0];
      let img = await this.upImg({
        image: this.image,
        path: "items"
      });
      this.form.all.image_url.push(img);
    },
    setFile(e) {
      this.file = e.target.files[0];
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

      const { data } = await this.form.post("/api/items");

      // if (data) {
      //   this.$router.push({
      //     name: "admin.room.show",
      //     params: { id: this.room_id }
      //   });
      // }
    },
    loadRoom() {
      this.form.room_id = "";
      this.fetchRoom(this.floor_active);
    },
    removeImg(index) {
      this.$delete(this.form.all.image_url, index);
    },
    async update() {
      if (this.image) {
        this.form.image_url = await this.upImg({
          image: this.image,
          path: "items"
        });
      }
      const { data } = await this.form.put(`/api/items/${this.id}`);

      if (data) {
        this.$router.push({
          name: "admin.item.show",
          params: { id: this.show.id }
        });
      }
    },
    ...mapActions({
      fetch: "item/show",
      fetchFloors: "floor/fetch",
      fetchRoom: "room/fetch"
    })
  }
  // async created() {
  //   console.log(this.id);
  //   if (this.id) {
  //     await this.fetch(this.id);
  //     this.form.keys().forEach(key => {
  //       this.form[key] = this.show[key];
  //     });
  //   }
  //   this.fetchFloors();
  //   this.fetchRoom(this.floor_active);
  // }
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
  font-family: Kanit !important;
}
label[data-v-74ec3927] {
  color: #3631c4;
}
input[data-v-74ec3927],
textarea[data-v-74ec3927] {
  border-color: aqua;
}
</style>
