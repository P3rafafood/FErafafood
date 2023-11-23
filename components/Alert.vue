<script setup>
  const { title } = defineProps(['title'])
</script>

<template>
  <div>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ title }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
</template>

<style scoped></style>
