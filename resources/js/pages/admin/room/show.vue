<template>
  <div v-if="show">
    <h2>{{ show.name }}</h2>
    <hr />

    <div class="card p-3">
      <h4>Item</h4>
      <router-link
        :to="{
          name: 'admin.item.create',
          query: { room_id: show.id }
        }"
      >
        <button id="createbtn" style="width:200px;">Create</button>
      </router-link>

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
          <tr v-for="item in show.items" :key="item.id">
            <td>
              <router-link
                :to="{
            name: 'admin.item.show',
            params: { id: item.id },
            query: { room_id: show.id }
          }"
              >{{ item.name }}</router-link>
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
