<template>
  <div class="col m-auto">
    <select v-model="active" class="form-control" @change="setActive()">
      <option v-for="museum in user.museums" :key="museum.id" :value="museum.id">{{ museum.name }}</option>
    </select>
    <!-- <p class="text-center">(Bangkok Museum)</p> -->
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
import _ from "lodash";
export default {
  middleware: "auth",
  data() {
    return {
      active: 0
    };
  },
  computed: {
    ...mapGetters({
      show: "floor/items",
      museum_active: "museum/museum_active"
    }),

    id() {
      return parseInt(this.$route.params.id);
    }
  },
  methods: {
    setActive() {
      this.setMuseumActive(this.active);
      this.active = this.museum_active;
    },
    filterFloor(array, museum_active) {
      console.log(array);
      console.log(this.active);

      return _.filter(array, el => el.museum_id == this.active);
    },
    ...mapActions({
      fetch: "floor/fetch",
      del: "museum/del",
      setMuseumActive: "museum/setMuseumActive"
    })
  },
  created() {
    this.fetch();
    this.active = this.user.museum_active;
  }
};
</script>
