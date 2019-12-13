<template>
  <div>
    <div class="form-group row">
      <label class="col-md-3 col-form-label text-md-right">รูปภาพ</label>
      <div class="col-md-7">
        <input @change="setImg" class="form-control" type="file" name="image" />
        <has-error :form="form" field="image" />
      </div>
    </div>

    <form @submit.prevent="submitForm" @keydown="form.onKeydown($event)">
      <!-- Name -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">item_name</label>
        <div class="col-md-7">
          <input
            v-model="form.name"
            :class="{ 'is-invalid': form.errors.has('name') }"
            class="form-control"
            type="text"
            name="name"
          />
          <has-error :form="form" field="name" />
        </div>
      </div>

      <!-- description -->
      <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">description</label>
        <div class="col-md-7">
          <textarea
            v-model="form.description"
            :class="{ 'is-invalid': form.errors.has('description') }"
            class="form-control"
            type="text"
            name="description"
          >
          </textarea>
          <has-error :form="form" field="description" />
        </div>
      </div>

      <div class="form-group row">
        <div class="col-md-7 offset-md-3 d-flex">
          <!-- Submit Button -->
          <v-button :loading="form.busy">
            {{ id ? "update" : "save" }}
          </v-button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "vform";
import { mapActions, mapGetters } from "vuex";

export default {
  data: () => ({
    form: new Form({
      room_id: "",
      name: "",
      description: "",
      image_url: ""
    }),
    image: ""
  }),
  computed: {
    room_id() {
      return parseInt(this.$route.query.room_id);
    },
    ...mapGetters({
      show: "item/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    setImg(e) {
      this.image = e.target.files[0];
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
      this.form.room_id = this.room_id;

      const { data } = await this.form.post("/api/items");

      if (data) {
        this.$router.push({
          name: "admin.room.show",
          params: { id: this.room_id }
        });
      }
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
      fetch: "item/show"
    })
  },
  async created() {
    if (this.id) {
      await this.fetch(this.id);
      this.form.keys().forEach(key => {
        this.form[key] = this.show[key];
      });
    }
  }
};
</script>

<style></style>
