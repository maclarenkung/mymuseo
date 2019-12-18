<template>
  <div class="container">
    <card :title="$t('home')">
      {{ $t("you_are_logged_in") }}
      <div class="row">
        <div v-for="(museum, index) in museums" :key="index" class="col-md-4 mt-2">
          <MuseumCard :museum="museum" />
        </div>
      </div>

      <hr />
      <ScanQr />
    </card>
  </div>
</template>

<script>
import MuseumCard from "~/components/Museum/Card";
import ScanQr from "~/components/ScanQr";

export default {
  middleware: "auth",
  components: {
    MuseumCard,
    ScanQr
  },
  data() {
    return {
      museums: [
        {
          name: "xxx",
          des: "23121"
          // class: "bg-danger"
        },
        {
          name: "2222",
          des: "23121"
        }
      ]
    };
  },
  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
