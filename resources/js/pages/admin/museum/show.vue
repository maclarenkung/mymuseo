<template>
  <div>
    <!-- <h2>{{ show.name }}</h2> -->
    <!-- <hr /> -->
    <!-- <a :href="show.address_url" target="_blank" rel="noopener noreferrer">Google Map</a> -->

    <div class="card p-3" style="border:none;">
      <table style="width:100%">
        <tr>
          <th>Name</th>
          <th style="color:white">created at</th>
          <th>Action</th>

          <th>Created at</th>
        </tr>
        <tr>
          <td>
            <div v-for="floor in show.floors" :key="floor.id">
              <router-link :to="{ name: 'admin.floors.show', params: { id: floor.id } }">
                <p>{{ floor.name }}</p>
              </router-link>
            </div>
          </td>
          <td></td>
          <td>
            <div v-for="floor in show.floors" :key="floor.id">
              <router-link :to="{ name: 'admin.floors.show', params: { id: floor.id } }">
                <p class="btn btn-warning">Edit</p>
              </router-link>
            </div>
          </td>

          <td>
            <div v-for="floor in show.floors" :key="floor.id">
              <router-link :to="{ name: 'admin.floors.show', params: { id: floor.id } }">
                <p>15 - 12 - 62</p>
              </router-link>
            </div>
          </td>
        </tr>
      </table>
    </div>
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
