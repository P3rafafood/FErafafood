<script setup>
const token = useCookie('token')
const { data:res } = await useApiFetch('/admin/order/history', {
  headers: {
    'Authorization': 'Bearer '+token.value
  }
})

const orders = res.value

definePageMeta({
  layout: 'admin'
})
</script>

<template>
  <div>
    <div class="row">
      <div class="col-md-3 me-3" v-for="(order, index) in orders" :key="index">
        <div class="card mb-3" style="width: 18rem;">
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Order Date <span class="float-end"><strong><DateFormat :angka="order.created_at"/></strong></span></li>
              <li class="list-group-item">Table Number <span class="float-end"><strong>{{ order.table_number }}</strong></span></li>
              <li class="list-group-item">Order Name <span class="float-end"><strong>{{ order.order_name }}</strong></span></li>
              <li class="list-group-item">Status <span class="float-end"><strong>{{ order.status }}</strong></span></li>
              <li class="list-group-item">Total Price <span class="float-end"><strong><Rupiah :angka="order.grand_total"/></strong></span></li>
            </ul>
          </div>
          <div class="card-footer">
            <NuxtLink class="btn btn-info text-white float-end" :to="'/admin/order/history/'+order._id">Detail</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
