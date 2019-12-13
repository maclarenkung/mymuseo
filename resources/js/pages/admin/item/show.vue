<template>
  <div v-if="show" class="container">
    <img :src="show.qrcode_url" alt="" />
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
    })
  },
  created() {
    this.fetch(this.id);
  }
};
</script>

<style></style>
