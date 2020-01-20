<template>
  <div>
    <div class="dashh">
      <div class="clearfix">
        <router-link to="/admin/room/1" class="float-left">
          <i class="flaticon-left-arrow"></i>
        </router-link>
        <h1 class="float-left ml-4" style="color:#3631C4 ;">Create Museum</h1>
      </div>
      <hr />
      <div class="col-12 " style="color: #3631C4;">
        <div class="row">
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Name (TH)</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Name (EN)</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-12">
            <label for="">
              <i class="flaticon-edit-button"></i> Description</label
            ><br />
            <textarea name="" id="" cols="80" rows="10" width="100%"></textarea>
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Google Map Link</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Website</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Time</label>
            <br />
            <div class="row">
              <div class="col-5">
                <input type="time" class="create-form" />
              </div>
              <div class="col-1">to</div>
              <div class="col-5">
                <input type="time" class="create-form" />
              </div>
            </div>
          </div>
          <div class="col-6">
            <form action="">
              <label for="">Day</label><br />
              <input type="checkbox" name="vehicle1" value="sun" /> Sun
              <input type="checkbox" name="vehicle1" value="mon" /> Mon
              <input type="checkbox" name="vehicle1" value="tue" /> Tue
              <input type="checkbox" name="vehicle1" value="wed" /> Wed
              <br />
              <input type="checkbox" name="vehicle1" value="thur" /> Thur
              <input type="checkbox" name="vehicle1" value="fri" /> Fri
              <input type="checkbox" name="vehicle1" value="sat" /> Sat
            </form>
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Phone number</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> E-mail</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Facebook</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Instagram</label>
            <br />
            <input type="text" class="create-form" />
          </div>
          <div class="col-6">
            <label for=""> <i class="flaticon-user"></i> Category</label>
            <br />
            <!-- <input type="text" class="create-form" /> -->
          </div>
          <div class="col-6">
            <label for="">Language</label>
          </div>
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
          <div class="col-12 text-center mt-5">
            <button>CANCEL</button>
            <button>CREATE</button>
          </div>
        </div>
      </div>
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
.dashh {
  padding: 50px 40px;
  background-color: white;
  border-radius: 30px;
  box-shadow: 3px 5px 5px;
  color: #7070707a;
}
.create-form {
  width: 80%;
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
  font-family: Kanit;
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
  font-family: Kanit;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #ffffff;
}
</style>
