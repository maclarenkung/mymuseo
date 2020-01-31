<template>
  <div>
    <!-- <pre>{{ show }}</pre> -->
    <div class="dashh">
      <div class="clearfix">
        <router-link to="/admin/customer" class="float-left">
          <i class="flaticon-left-arrow" style="font-size: 35px; color:#FFCC57;"></i>
        </router-link>
        <p class="float-left ml-4" style="color:black; font-size:35px;">Create Museum</p>
      </div>
      <hr />
      <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)" class="mt-5">
        <div class="col-12" style="color: #3631C4;">
          <div class="row">
            <div class="col-6">
              <label for>
                <i class="flaticon-user"></i> Name (TH)
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.name" />
            </div>
            <div class="col-6">
              <label for>
                <i class="flaticon-user"></i> Name (EN)
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.name_en" />
            </div>
            <div class="col-12 mt-4">
              <label for>
                <i class="flaticon-edit-button"></i> Description
              </label>
              <br />
              <!-- <textarea name id cols="80" rows="10" width="100%" ></textarea> -->
              <textarea
                class
                style="width:90%; border-radius: 10px; border-color: #1fe2d4;"
                id="exampleFormControlTextarea1"
                v-model="form.description"
                rows="10"
              ></textarea>
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-placeholder"></i> Google Map Link
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.address_url" />
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-unlink"></i> Website
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.website_url" />
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-clock-circular-outline"></i> Time
              </label>
              <br />
              <div class="row">
                <div class="col-5">
                  <input type="time" class="create-form" v-model="form.time_open" />
                </div>
                <div class="col-1">to</div>
                <div class="col-5">
                  <input type="time" class="create-form" v-model="form.time_close" />
                </div>
              </div>
            </div>
            <div class="col-6 mt-4">
              <form action>
                <label for>
                  <i class="flaticon-calendar"></i> Day
                </label>
                <br />
                <input type="text" class="create-form" v-model="form.day_open" />
              </form>
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-call-answer"></i> Phone number
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.phonenumber" />
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-envelope"></i> E-mail
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.email" />
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-facebook"></i> Facebook
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.facebook" />
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-instagram-logo"></i> Instagram
              </label>
              <br />
              <input type="text" class="create-form" v-model="form.instagram" />
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-list"></i> Category
              </label>
              <br />
              <!-- <input type="text" class="create-form" /> -->
              <div>
                <b-tabs content-class="mt-3">
                  <b-tab title="ประจำ" active>
                    <p>ประจำ</p>
                  </b-tab>
                  <b-tab title="หมุนเวียน">
                    <div>
                      <p>เริ่ม</p>
                      <b-form-input v-model="form.day_start" type="date"></b-form-input>
                      <p>ถึง</p>
                      <b-form-input v-model="form.day_end" type="date"></b-form-input>
                    </div>
                  </b-tab>
                </b-tabs>
              </div>
            </div>
            <div class="col-6 mt-4">
              <label for>
                <i class="flaticon-dashboard"></i> Package
                (เริ่มนับตั้งแต่วันสร้าง)
              </label>
              <br />
              <select
                v-model="form.package_id"
                required
                style="width: 80%; border-color:#1fe2d4; background-color: white;"
              >
                <option
                  v-for="(packagex, index) in packagexs"
                  :key="index"
                  :value="packagex.id"
                >{{ packagex.name }}</option>
              </select>
            </div>
            <div class="col-4 mt-4">
              <label style="color:#3631c4;">
                <i style="color:#3631c4;" class="flaticon-photo"></i> Image
                (จำนวนไม่เกิน 6)
              </label>

              <div class="custom-file mt-3">
                <input
                  type="file"
                  class="custom-file-input"
                  id="customFile"
                  name="image"
                  @change="setImg()"
                />
                <has-error :form="form" field="image" />
                <label class="custom-file-label" for="customFile">
                  <i class="flaticon-upload"></i> Upload Image
                </label>
              </div>

              <!-- <div class="col-12">
                <div class="row">
                  <div
                    class="col-md-4"
                    v-for="(img, index) in form.image_url"
                    :key="index"
                  >
                    <div class="card">
                      <div class="card-body">
                        <img :src="img" width="100%" />
                      </div>
                      <div class="card-footer">
                        <button @click="removeImg(index)" type="button">
                          ลบ
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
            <div class="col-4 mt-5"></div>
            <div class="col-12 text-center mt-5">
              <router-link to="/admin/customer" class>
                <button class="btn-create3">CANCEL</button>
              </router-link>
              <button class="btn-create2">CREATE</button>
            </div>
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
      package_id: 1,
      name: "",
      name_en: "",
      description: "",
      address_url: "",
      website_url: "",
      time_open: "",
      time_close: "",
      day_open: "",
      phonenumber: "",
      email: "",
      facebook: "",
      instagram: "",
      day_start: "",
      day_end: "",
      image_url: "https://image.freepik.com/free-photo/_34998-128.jpg"
    }),
    image: ""
  }),

  computed: {
    // room_id() {
    //   return parseInt(this.$route.query.room_id);
    // },
    ...mapGetters({
      packagexs: "package/packages"
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
      // this.form.image_url = await this.upImg({
      //   image: this.image,
      //   path: "items"
      // });

      this.form.room_id;

      const { data } = await this.form.post("/api/museums");

      if (data) {
        this.fetchUser();
        this.$router.push("/admin/customer");
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
      fecthPackage: "package/fetch"
    })
  },
  async created() {
    this.fecthPackage();
  }
};
</script>

<style scoped>
body {
  font-family: "Mitr", sans-serif !important;
}
.dashh {
  padding: 50px 40px;
  background-color: white;
  border-radius: 30px;
  box-shadow: 3px 5px 5px;
  color: #7070707a;
}
.create-form {
  width: 80%;
  border-color: #1fe2d4;
  border-style: solid;
  border-radius: 6px;
  border-width: thin;
}
/* .col-12 {
      padding-left: 0px;
      padding-right: 0px;
    } */
.Rectangle-1 {
  width: auto;
  height: 100px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.13);
  background-color: #ffffff;
  text-align: center;
}
.Path-61 {
  margin-top: 30px;
}
.Path-53 {
  width: auto;
  height: auto;
  background-color: #c9def7;
}
.Image-22 {
  width: 37px;
  height: 37px;
  object-fit: contain;
  margin-top: 30px;
}
.lang {
  text-align: center;
}
.speaker {
  text-align: center;
  margin-top: 20px;
}
.Rectangle-6 {
  width: 80px;
  height: 80px;
  border-radius: 40px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
  background-color: #305a9a;
}
.text-1 {
  width: 130px;
  height: 24px;
  font-family: Prompt;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  margin-top: 10px;
  color: #000000;
}
.Image-42 img {
  border-radius: 5px;
  width: 100%;
}
.Image-36 {
  width: 74px;
  height: 55px;
  object-fit: contain;
}
.Image-36 img {
  width: 100%;
  border-radius: 5px;
}
.sm-img {
  margin-left: 13px;
}
.sm-img2 {
  margin-left: 32px;
  margin-top: 20px;
}
.Rectangle-9 {
  width: 314px;
  height: 263px;
  border-radius: 11px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
  background-color: #ffffff;
  margin-top: 30px;
  margin-left: 30px;
}
.Rectangle-68 {
  width: 314px;
  height: 163px;
  border-radius: 11px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
  background-color: #ffffff;
  margin-top: 20px;
  margin-left: 30px;
}
.Rectangle-69 {
  width: 314px;
  height: 317px;
  border-radius: 11px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
  background-color: #ffffff;
  margin-top: 20px;
  margin-left: 30px;
}
.Rectangle-7 {
  width: 80px;
  height: 80px;
  border-radius: 40px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.16);
  background-color: #305a9a;
  margin-top: 50px;
  margin-left: 71px;
}
.text-2 {
  font-family: mitr;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #305a9a;
  margin-top: 15px;
}
.Rectangle-3 {
  width: auto;
  height: 170px;
  background-color: #305a9a;
}
.Contact-us {
  margin-top: 23px;
  font-family: mitr;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #ffffff;
}
.btn-create2 {
  padding: 10px 50px;

  color: white;
  background-color: #ff6e6e;
  border-radius: 10px;
  font-size: 15px;
}
.btn-create3 {
  padding: 10px 50px;

  color: #ffce57;
  background-color: white;
  border-color: #ffce57;
  border-radius: 10px;
  font-size: 15px;
}
label {
  font-size: 18px;
}
</style>
