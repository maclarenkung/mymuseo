<template>
  <div class="card w-100" :class="museum.class ? museum.class : ''">
    <img src="https://picsum.photos/536/354" class="card-img-top" alt="..." />
    <div class="card-body">
      <h5 class="card-title">{{ museum.name }}</h5>
      <p class="card-text">{{ museum.des }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["museum"]
};
</script>

<style></style>
