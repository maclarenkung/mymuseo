<template>
  <div v-if="show">
    <h2>{{ show.name }}</h2>
    <hr />

    <div class="card p-3">
      <div v-for="room in show.rooms" :key="room.id">
        <router-link :to="{ name: 'admin.room.show', params: { id: room.id } }">{{ room.name }}</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "floor/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "floor/show",
      del: "floor/del"
    })
  },
  created() {
    this.fetch(this.id);
  }
};
</script>

<style></style>
