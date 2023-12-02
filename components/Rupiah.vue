<script setup>
const rupiah = (number) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR"
  }).format(number);
}

const { angka } = defineProps(['angka'])
</script>

<template>
  <div>
    {{ rupiah(angka) }}
  </div>
</template>

<style scoped></style>
