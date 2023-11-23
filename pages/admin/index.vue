<script setup>
const token = useCookie('token')
const { data:res } = await useApiFetch('/admin/dashboard', {
  headers: {
    'Authorization': 'Bearer '+token.value
  }
})

const dashboard = res.value

definePageMeta({
  layout: 'admin'
})
</script>

<template>
  <div>
    <div class="row">
      <div class="col-md-3 me-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Menu <span class="float-end">({{ dashboard.menu }})</span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 me-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Today Order <span class="float-end">({{ dashboard.today_order }})</span></h5>
          </div>
        </div>
      </div>
      <div class="col-md-3 me-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">All Order <span class="float-end">({{ dashboard.all_order }})</span></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
