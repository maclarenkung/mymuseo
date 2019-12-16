<template>
  <div v-if="show" class="container">
    <img :src="show.qrcode_url" alt />
    <br />
    <a :href="`/item/${show.id}`" target="_blank" class="btn btn-primary"
      >Open</a
    >

    <hr />
    <router-link
      :to="{
        name: 'admin.item.edit',
        params: { id: show.id }
      }"
    >
      <button class="btn btn-warning">edit</button>
    </router-link>
    <button class="btn btn-danger" @click="deletex(show.id)">delete</button>
    <hr />
    <ItemShow :item="show" />
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
    }
  },
  created() {
    this.fetch(this.id);
  }
};
</script>

<style></style>
