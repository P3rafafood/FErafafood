<script lang="ts" setup>
const { title } = defineProps(['title'])
</script>

<template>
  <div>
    <div class="row mb-3">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="card text-bg-warning text-center">
          <div class="card-header">
            <div class="card-title text-white">{{ title }}</div>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</template>

<style scoped></style>
