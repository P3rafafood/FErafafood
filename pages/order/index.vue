<script setup>
import { reactive, onMounted, watch, computed, ref } from 'vue';

const shoppingCart = reactive([])
const table_number = ref()
const order_name = ref()
const payment = ref()
const showToast = ref(false);

onMounted(() => {
  const storedCart = JSON.parse(localStorage.getItem('shoppingCart') || '[]')
  shoppingCart.push(...storedCart)
});

watch(shoppingCart, (newValue) => {
  localStorage.setItem('shoppingCart', JSON.stringify(newValue))
});

const totalPrice = computed(() => {
  let sum = 0

  for (const menu of shoppingCart) {
    sum += menu.price * menu.qty
  }

  return sum;
})

const totalItem = computed(() => {
  let sum = 0

  for (const menu of shoppingCart) {
    sum += 1
  }

  return sum;
})

function removeFromCart(product) {
    const productIndex = shoppingCart.findIndex(item => item._id === product._id)
    shoppingCart[productIndex].qty -= 1;
    if (shoppingCart[productIndex].qty < 1) {
      shoppingCart.splice(productIndex, 1)
    }
  }

async function sendOrder() {
  const orders = shoppingCart.map((item) => {
    return {
      'menu_id' : item._id,
      'qty': item.qty
    }
  })

  const reqOrder = {
    table_number :table_number.value,
    order_name : order_name.value,
    payment: payment.value,
    orders
  }

  await useApiFetch('/home/order', {
    method: 'POST',
    body: reqOrder,
  })

  table_number.value = ''
  order_name.value = ''
  payment.value = ''

  localStorage.setItem('shoppingCart', JSON.stringify([]))

  showToast.value = true

  setTimeout(() => {
    showToast.value = false
  }, 2000)
}

definePageMeta({
  layout: 'home'
})
</script>

<template>
  <div>
    <Alert v-if="showToast" title="Pesanan Berhasil DIbuat"/>
    <div class="card mb-3">
      <div class="card-header">
        <div class="card-title">
          <div class="row">
            <div class="col-md-6">Pemesanan</div>
            <div class="col-md-6">
              <NuxtLink to="menu" class="btn btn-success float-end">Tambah Pesanan</NuxtLink>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-border table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(menu, index) in shoppingCart" :key="'menu-'+index">
                <td>{{ menu.name }}</td>
                <td>{{ menu.qty }}</td>
                <td><Rupiah :angka="menu.price"/></td>
                <td>
                  <button type="button" class="btn btn-danger" @click="removeFromCart(menu)">Remove</button>
                </td>
              </tr>
              <tr>
                <td class="fw-bold" colspan="2">Total Item : {{ totalItem }}</td>
                <td colspan="2"><Rupiah :angka="totalPrice"/></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <div class="card-title" style="text-align: center;">HARAP DI ISI</div>
      </div>
      <div class="card-body">
        <form @submit.prevent="sendOrder">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
              <span class="input-group-text" id="order_name">
                <i class="bi bi-person"></i>
              </span>
              <input type="text" class="form-control" placeholder="Nama Pemesan" v-model="order_name">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
              <span class="input-group-text" id="table_number">
                <i class="bi bi-journal-richtext"></i>
              </span>
              <input type="number" class="form-control" placeholder="Table No" v-model="table_number">
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="input-group mb-3">
              <label class="input-group-text" for="payment">Pembayaran</label>
              <select class="form-select" id="payment" v-model="payment">
                <option selected>Choose...</option>
                <option value="cash">Cash</option>
                <option value="debit">Debit</option>
              </select>
            </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary float-end">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
