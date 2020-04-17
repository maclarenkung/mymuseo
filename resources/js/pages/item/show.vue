<template>
  <div v-if="show" class="container">
    <ItemShow :item="show" />
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import ItemShow from "~/components/ItemShow";

import axios from "axios";
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
    },
    langSlug() {
      return this.$route.query.lang ? this.$route.query.lang : "th";
    }
  },
  methods: {
    ...mapActions({
      fetch: "item/show",
      del: "item/del"
    })
  },
  async created() {
    this.fetch({ id: this.id, lang: this.langSlug });

    if (this.show) {
      await axios.post("/api/items/scan", {
        item_id: this.id
      });
    }
  }
};
</script>

<style></style>
