<template>
  <div>
    <div class="dashh">
      <div class="clearfix">
        <router-link to="/admin/room/1" class="float-left">
          <i class="flaticon-left-arrow"></i>
        </router-link>
        <h1 class="float-left ml-4">Create Item</h1>
      </div>
      <div>{{ form }}</div>
      <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
        <!-- Name -->
        <div class="row">
          <select v-model="floor_active" @change="loadRoom()">
            <option
              :value="floor.id"
              v-for="(floor, index) in floors"
              :key="index"
              >{{ floor.name }}</option
            >
          </select>
          <select v-model="form.room_id" required>
            <option value>please select</option>
            <option
              :value="room.id"
              v-for="(room, index) in rooms"
              :key="index"
              >{{ room.name }}</option
            >
          </select>

          <!-- <div class="dropdown col-4">
            <h4 style="color:#3631c4;">Floor</h4>

            <a
              class="btn dropdown-toggle form-drop"
              href="#"
              role="button"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="flaticon-floor"></i> Floor
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">floor->name</a>
              <a class="dropdown-item" href="#">+ เพิ่ม floor</a>
            </div>
          </div>-->
          <div class="dropdown col-4">
            <h4 style="color:#3631c4;">Room</h4>

            <a
              class="btn dropdown-toggle form-drop"
              href="#"
              role="button"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="flaticon-open-exit-door"></i> room
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">room->name</a>
              <a class="dropdown-item" href="#">+ เพิ่ม room</a>
            </div>
          </div>
          <div class="col-4"></div>
          <br />
          <div class="col-4 mt-4">
            <i style="color:#3631c4;" class="flaticon-photo"></i>
            <h4 style="color:#3631c4;">Image (จำนวนไม่เกิน 6)</h4>
          </div>
          <div class="col-4 mt-4">
            <form>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" />
                <label class="custom-file-label" for="customFile">
                  <i class="flaticon-upload"></i> Upload image
                </label>
              </div>
            </form>
          </div>
          <div class="col-4"></div>
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
                  <i class="flaticon-upload"></i> Upload image
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
                  ><b-card-text>
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
                        <label class>Image</label>
                        <div class>
                          <input
                            class="form-control"
                            type="file"
                            name="image"
                            @change="setImg"
                          />
                          <has-error :form="form" field="image" />
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label class>Description</label>
                        <div class>
                          <textarea
                            v-model="form.description"
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
                      <div class="form-group col-md-6">
                        <label>Audio</label>
                        <div class>
                          <input
                            class="form-control"
                            type="file"
                            name="image"
                            @change="setFile"
                          />
                          <has-error :form="form" field="file" />
                        </div>
                      </div>
                    </div> </b-card-text
                ></b-tab>
              </b-tabs>
            </b-card>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="home-tab"
                  data-toggle="tab"
                  href="#home"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                  >TH</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="profile-tab"
                  data-toggle="tab"
                  href="#profile"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="false"
                  >ENG</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="contact-tab"
                  data-toggle="tab"
                  href="#contact"
                  role="tab"
                  aria-controls="contact"
                  aria-selected="false"
                  >CH</a
                >
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home"
                role="tabpanel"
                aria-labelledby="home-tab"
              ></div>
            </div>
          </div>
        </div>

        <!-- description -->
        <!-- <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">description</label>
        <div class="col-md-7">
          <textarea
            v-model="form.description"
            :class="{ 'is-invalid': form.errors.has('description') }"
            class="form-control"
            type="text"
            name="description"
          />
          <has-error :form="form" field="description" />
        </div>
        </div>-->

        <div class="form-group row">
          <div class="col-md-7 offset-md-5 d-flex">
            <!-- Submit Button -->
            <v-button
              :loading="form.busy"
              id="createbtn"
              style="width:130px;"
              class="text-white colorr"
              >{{ id ? "update" : "save" }}</v-button
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

export default {
  data: () => ({
    form: new Form({
      all: {},
      th: {
        room_id: "",
        name: "",
        description: "",
        image_url: "",
        file_url: ""
      },
      en: {
        room_id: "",
        name: "",
        description: "",
        image_url: "",
        file_url: ""
      },
      cn: {
        room_id: "",
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
    setImg(e) {
      this.image = e.target.files[0];
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
      this.form.image_url = await this.upImg({
        image: this.image,
        path: "items"
      });

      this.form.file_url = await this.uploadFile({
        file: this.file,
        path: "items"
      });

      this.form.room_id;

      const { data } = await this.form.post("/api/items");

      if (data) {
        this.$router.push({
          name: "admin.room.show",
          params: { id: this.room_id }
        });
      }
    },
    loadRoom() {
      this.form.room_id = "";
      this.fetchRoom(this.floor_active);
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
}
.clearfix {
  color: #3631c4;
}
</style>
