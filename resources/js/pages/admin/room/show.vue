<template>
  <div v-if="show">
    <h2>{{ show.name }}</h2>
    <hr />

    <div class="card p-3">
      <h6>Item</h6>
      {{ windowWidth }}
      <router-link
        :to="{
          name: 'admin.item.create',
          query: { room_id: show.id }
        }"
        ><button class="btn btn-success">
          create
        </button>
      </router-link>
      <div v-for="item in show.items" :key="item.id">
        <router-link
          :to="{
            name: 'admin.item.show',
            params: { id: item.id },
            query: { room_id: show.id }
          }"
        >
          {{ item.name }}
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "room/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "room/show",
      del: "room/del"
    })
  },
  created() {
    this.fetch(this.id);
  }
};
</script>

<style></style>
