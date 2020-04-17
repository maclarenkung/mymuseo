<template>
  <div>
    <div v-for="item in museums" :key="item.id">
      <router-link
        :to="{ name: 'customer.museums.show', params: { id: item.id } }"
      >
        {{ item.name }}
        <!-- <button @click="del(item.id)">del</button> -->
      </router-link>
    </div>
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
      fetch: "museum/customerFetch",
      del: "museum/del"
    })
  },
  created() {
    this.fetch();
  }
};
</script>

<style></style>
