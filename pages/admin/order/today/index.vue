<script setup>
import { ref, watch } from 'vue';
const token = useCookie('token')
const { data:res } = await useApiFetch('/admin/order', {
  headers: {
    'Authorization': 'Bearer '+token.value
  }
})


const orders = res.value

const btnLabel = ref('Process')
watch(btnLabel, (newStatus) => {
  btnLabel.value = newStatus
})

async function procesOrder(event, id) {
  const {data:res} = await useApiFetch(`/admin/order/${id}`, {
    headers: {
      'Authorization': 'Bearer '+token.value
    }
  })

const transaction = res.value

const status = changeStatus(transaction.status)
btnLabel.value = status

const {data:resUpdate} = await useApiFetch(`/admin/order/${id}`, {
    method: 'PUT',
    body: {
      status
    },
    headers: {
      'Authorization': 'Bearer '+token.value
    }
  })

  location.reload()
}

function changeStatus(currentStatus) {
  let newStatus = ''
  switch (currentStatus) {
    case 'waiting':
      newStatus = 'process'
      break;
    case 'process':
      newStatus = 'payment'
      break;
  
    default:
    newStatus = 'finish'
      break;
  }

  return newStatus
}

definePageMeta({
  layout: 'admin'
})
</script>

<template>
  <div>
    <div class="row">
      <div class="col-md-3 me-3" v-for="(order, index) in orders" :key="index">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Table Number <span class="float-end"><strong>{{ order.table_number }}</strong></span></li>
              <li class="list-group-item">Order Name <span class="float-end"><strong>{{ order.order_name }}</strong></span></li>
              <li class="list-group-item">Status <span class="float-end"><strong>{{ order.status }}</strong></span></li>
              <li class="list-group-item">Total Price <span class="float-end"><strong><Rupiah :angka="order.grand_total"/></strong></span></li>
            </ul>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-success" @click="procesOrder($event, order._id)" v-if="order.status != 'finish'">{{ btnLabel }}</button>
            <NuxtLink class="btn btn-info text-white float-end" :to="'/admin/order/today/'+order._id">Detail</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
