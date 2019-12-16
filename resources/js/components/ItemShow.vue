<template>
  <div>
    <img :src="item.image_url" width="200" />
    <h2>{{ item.name }}</h2>
    <hr />
    <audio controls v-if="item.sound" ref="player">
      <source :src="item.sound.file_url" type="audio/mpeg" />Your browser does not support the audio element.
    </audio>
    <!-- <pre>
    {{ item }}
    </pre-->
  </div>
</template>

<script>
export default {
  props: ["item"],
  mounted: function() {
    this.$watch("item.sound.file_url", () => {
      this.$refs.player.load();
    });
  }
};
</script>

<style></style>
