<template>
  <div>
    {{ museums ? museums : "please fetch on page museum" }}
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters({
      museums: "museum/museums"
    })
  }
};
</script>

<style></style>
