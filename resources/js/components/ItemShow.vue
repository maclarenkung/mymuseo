<template>
  <div>
    <img :src="item.image_url" width="200" />
    <h2>{{ item.name }}</h2>
    <hr />
    <pre>
    {{ item }}
  </pre
    >
  </div>
</template>

<script>
export default {
  props: ["item"]
};
</script>

<style></style>
