<template>
  <div>
    <div class="dashh">
      <div class="clearfix">
        <router-link to="/admin/room/1" class="float-left">
          <i class="flaticon-left-arrow"></i>
        </router-link>
        <h1 class="float-left ml-4">Create Item</h1>
      </div>
      <!-- <pre>{{ form }}</pre> -->
      <!-- <pre>{{ floors }}</pre> -->

      <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)" class="mt-5">
        <!-- Name -->
        <div class="row">
          <div class="col-12"></div>
          <br />
          <div class="col-4 mt-4">
            <i style="color:#3631c4;" class="flaticon-photo"></i>
            <h4 style="color:#3631c4;">Image (จำนวนไม่เกิน 6)</h4>
          </div>

          <div class="col-4 mt-4">
            <form>
              <input type="text" value="1" v-model="form.museum_id" />
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
            <i style="color:#3631c4;" class="flaticon-placeholder"></i>
            <h4 style="color:#3631c4;">Map (พร้อมระบุตำแหน่ง)</h4>
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
        floor_id: 1,
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
    // floor_active: 1,
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

      this.form.floor_id;

      const { data } = await this.form.post("/api/rooms");

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
  },
  async created() {
    console.log(this.id);
    if (this.id) {
      await this.fetch(this.id);
      this.form.keys().forEach(key => {
        this.form[key] = this.show[key];
      });
    }
    this.fetchFloors();
    this.fetchRoom(this.floor_active);
  }
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
#createbtn2 {
  padding-bottom: 46px;
  border-radius: 10px;
  border-color: #ff6464;
  height: 40px;
  background-color: #ff6464;
  font-size: 24px;
}
</style>
