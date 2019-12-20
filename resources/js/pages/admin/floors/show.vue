<template>
  <div v-if="show">
    <h2>{{ show.name }}</h2>
    <hr />

    <div class="card p-3">
      <button id="createbtn" style="width:200px;">Create</button>
      <hr />
      <table>
        <thead class="mm-thead">
          <tr>
            <td style="width:70%;">Name</td>
            <td>Action</td>
            <td>Create At</td>
          </tr>
        </thead>
        <tbody class="mm-tbody">
          <tr v-for="room in show.rooms" :key="room.id">
            <td>
              <router-link
                :to="{ name: 'admin.room.show', params: { id: room.id } }"
              >{{ room.name }}</router-link>
            </td>
            <td>
              <el-button type="warning" round>Edit</el-button>
            </td>
            <td>15/11/62</td>
          </tr>
        </tbody>
      </table>
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
  },
  mounted() {
    this.create.name = "floor";
  }
};
</script>

<style></style>
