<template>
  <div>
    <div>
      <input
        type="text"
        style="display:block; width:100%"
        placeholder="Search Museum"
      />
    </div>
    <hr />
    <button id="createbtn" style="width:200px;">Create</button>
    <hr />
    <table style="width:100%" class="mt-3">
      <tr>
        <th>Name</th>
        <th>Action</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>
          <div v-for="item in museums" :key="item.id">
            <router-link
              :to="{ name: 'admin.museums.show', params: { id: item.id } }"
            >
              <p>{{ item.name }}</p>
              <!-- <button @click="del(item.id)">del</button> -->
            </router-link>
          </div>
        </td>
        <td>
          <div v-for="item in museums" :key="item.id">
            <router-link
              :to="{ name: 'admin.museums.show', params: { id: item.id } }"
            >
              <p
                class="btn btn-warning"
                style="border-radius: 99px;color:white;"
              >
                Edit
              </p>
              <p
                class="btn btn-secondary"
                style="border-radius: 99px;color:white;"
              >
                Setting
              </p>
              <!-- <button @click="del(item.id)">del</button> -->
            </router-link>
          </div>
        </td>
        <td>
          <div v-for="item in museums" :key="item.id">
            <router-link
              :to="{ name: 'admin.museums.show', params: { id: item.id } }"
            >
              <h6 class="btn btn-light actives">
                <li>Active</li>
              </h6>
              <!-- <button @click="del(item.id)">del</button> -->
            </router-link>
          </div>
        </td>
      </tr>
    </table>

    <div></div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      museums: "museum/museums"
    })
  },
  methods: {
    ...mapActions({
      fetch: "museum/fetch",
      del: "museum/del"
    })
  },
  created() {
    this.fetch();
  }
};
</script>

<style lang="scss">
.actives {
  color: #2dcd7a;
}
th {
  color: #305a9a;
}
</style>
