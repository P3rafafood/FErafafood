<script lang="ts" setup>
const { angka } = defineProps(['angka'])
function formatDate(time: any) {
    const date = new Date(time);
    
    // Get year, month, and day part from the date
    const year = date.toLocaleString("default", { year: "numeric" });
    const month = date.toLocaleString("default", { month: "2-digit" });
    const day = date.toLocaleString("default", { day: "2-digit" });
    
    return `${day} - ${month} - ${year}`;
}

</script>

<template>
  <div>
    {{ formatDate(angka) }}
  </div>
</template>

<style scoped></style>
