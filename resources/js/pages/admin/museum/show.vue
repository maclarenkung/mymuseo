<template>
  <div>
    <h2>{{ show.name }}</h2>
    <hr />
    <a :href="show.address_url" target="_blank" rel="noopener noreferrer">Google Map</a>

    <!-- <div class="card p-3">
      <h6>Floor</h6>
      <div v-for="floor in show.floors" :key="floor.id">
        <router-link
          :to="{ name: 'admin.floors.show', params: { id: floor.id } }"
        >
          {{ floor.name }}
        </router-link>
      </div>
    </div>-->
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      show: "museum/show"
    }),
    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions({
      fetch: "museum/show",
      del: "museum/del"
    })
  },
  created() {
    this.fetch(this.id);
  }
};
</script>

<style></style>
