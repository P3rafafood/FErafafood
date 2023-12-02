<script setup>
const { id } = useRoute().params
const token = useCookie('token')
const {data:res} = await useApiFetch(`/admin/order/${id}`, {
    headers: {
      'Authorization': 'Bearer '+token.value
    }
  })

const transaction = res.value

definePageMeta({
  layout: 'admin'
})
</script>

<template>
  <div>
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            <div class="card-title">
              Pesananan No Meja <span class="float-end">{{ transaction.table_number }}</span>
            </div>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item" v-for="(detail, index) in transaction.details" :key="index">{{ detail.menu.name }} <span class="float-end"><strong>{{ detail.qty }}</strong></span></li>
          </ul>
          <div class="card-footer">
            <NuxtLink class="btn btn-danger" to="/admin/order/history">Back</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
