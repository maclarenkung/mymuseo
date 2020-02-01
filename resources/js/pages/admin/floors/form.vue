<template>
  <div>
    <div class="dashh">
      <div class="clearfix">
        <router-link to="/admin/museums/1" class="float-left">
          <i
            class="flaticon-left-arrow"
            style="font-size:25px; color:#ffcc57;"
          ></i>
        </router-link>
        <span class="ml-4" style="font-size:25px;">{{
          id ? "Edit Floor" : "Create Floor"
        }}</span>
      </div>
      <!-- <pre>{{ form }}</pre> -->
      <!-- <pre>{{ user }}</pre> -->

      <form
        @submit.prevent="submitForm"
        @keydown="form.onKeydown($event)"
        class="mt-3"
      >
        <!-- Name -->
        <div class="row">
          <div class="col-12">
            <div class="col-4">
              <span>Museum</span>
              <select
                v-model="form.all.museum_id"
                @change="loadRoom()"
                style="width: 100%; color:#3631c4;"
              >
                <!-- <option value>please select</option> -->
                <option
                  :value="museum.id"
                  v-for="(museum, index) in user.museums"
                  :key="index"
                  >{{ museum.name }}</option
                >
              </select>
            </div>
          </div>
          <br />
          <div class="col-4 mt-4">
            <span style="color:#3631c4; font-size:20px;" class="flaticon-photo">
              <!-- <h4 style="color:#3631c4;"></h4> -->
              Image (จำนวนไม่เกิน 6)
            </span>
          </div>

          <div class="col-4 mt-4">
            <form>
              <!-- <input type="text" value="1" v-model="form.museum_id" /> -->
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
          <div class="col-4 mt-4">
            <span
              style="color:#3631c4; font-size:20px;"
              class="flaticon-placeholder"
            >
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
                          <input
                            class="form-control"
                            type="file"
                            name="image"
                            @change="setFile"
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

export default {
  data: () => ({
    form: new Form({
      all: {
        museum_id: "",
        image_url: []
      },
      th: {
        name: "ชั้น 1",
        description:
          "อาคารหลังนี้ถูกสร้างขึ้นเมื่อปี พ.ศ. 2480 หรือเมื่อประมาณ 80 กว่าปีที่แล้ว โดยเป็นอาคารที่คุณแม่ของท่านอาจารย์วราพรได้สร้างขึ้นมาด้วยเงินจำนวน 2,400 บาท อาคารแห่งนี้จะเป็นอาคารที่ครอบครัวของท่านอาจารย์วราพรเคยอาศัยอยู่เมื่อในอดีต โดยคุณแม่ของท่านมีลูกทั้งหมด 5 คน เป็นผู้หญิงล้วน และท่านอาจารย์เป็นลูกคนที่ 4 ครับ ลักษณะของอาคารจะเป็นอาคารไม้สองชั้น หลังคาทรงปั้นหยา มุงด้วยกระเบื้องว่าวสีแดง ผนังอาคารสร้างด้วยไม้ทาสีเลียนแบบผนังก่ออิฐ และสถาปัตยกรรมหลายๆ อย่างจะได้รับอิทธิพลมาจากทางตะวันตกซึ่งกำลังเป็นที่นิยมในยุคนั้น",

        file_url: ""
      },
      en: {
        name: "1st floor",
        description:
          "This building was built in 2480, or about 80 years ago. The building is the mother of Master Waraporn was built with funds of 2,400 baht this building is the building where the family of Master Waraporn had lived in the past. The mother of five children, all of whom are girls. The teacher and the child's fourth appearance of the building will be a two-story wooden building. Hip roof Roofed with tiles, red kites. Wall built of wood painted in imitation masonry. And multiple platforms Will be influenced by the West, which were popular in that era.",

        file_url: ""
      },
      cn: {
        name: "地板层",
        description:
          "该建筑建于2480年，大约80年前。这是瓦拉波恩老师的母亲以2,400泰铢建造的建筑物，它将是瓦拉波恩老师的家人过去居住的建筑物  你妈妈有五个孩子，都是女人师父是第四个孩子，这座建筑有两层楼的木制建筑臀部屋顶茅草屋顶的红色风筝瓷砖建筑物的墙壁是用彩绘木材建造的，模仿了砖砌。还有很多建筑会受到那个时代流行的西方的影响",

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

      this.form.museum_id;

      const { data } = await this.form.post("/api/floors");

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
label[data-v-7be66d13] {
  color: #3631c4;
}
input[data-v-7be66d13],
textarea[data-v-7be66d13] {
  border-color: aqua;
}
</style>
