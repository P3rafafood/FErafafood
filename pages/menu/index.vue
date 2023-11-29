<script setup>
import { reactive, watch, onMounted, ref } from 'vue';
definePageMeta({
  layout: 'home'
})

const showToast = ref(false);

const { data: resFoods } = await useApiFetch('/home/menu?type=makanan')
const foods = resFoods.value

const { data: resDrinks } = await useApiFetch('/home/menu?type=minuman')
const drinks = resDrinks.value

const shoppingCart = reactive([])

onMounted(() => {
  const storedCart = JSON.parse(localStorage.getItem('shoppingCart') || '[]')
  shoppingCart.push(...storedCart)
});

watch(shoppingCart, (newValue) => {
  localStorage.setItem('shoppingCart', JSON.stringify(newValue))
});

function addToCart(menu) {
  let exists = false;

  for (const cartItem of shoppingCart) {
    if (cartItem._id === menu._id) {
      cartItem.qty += 1
      exists = true;
      break;
    }
  }

  if (!exists) {
    shoppingCart.push({
      ...menu,
      qty: 1
    })
  }

  showToast.value = true

  setTimeout(() => {
    showToast.value = false
  }, 2000)
}
</script>

<template>
  <div>
    <Alert v-if="showToast" title="Pesanan Berhasil Ditambahkan"/>
    <div class="row mb-3">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="card text-bg-warning text-center">
          <div class="card-header">
            <div class="card-title text-white">MENU MAKANAN</div>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-6" v-for="(food, index) in foods" :key="'food-'+index">
        <div class="card border-warning mb-3" style="max-width: 600px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img :src="food.image" class="img-fluid rounded-start" :alt="food.name">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ food.name }}<span class="float-end"><Rupiah :angka="food.price"/></span></h5>
                <p class="card-text">{{ food.desc }}</p>
                <p class="card-text"><small class="text-body-secondary">&nbsp;</small></p>
                <button type="button" class="btn btn-warning float-end text-white mb-3" @click="addToCart(food)">Tambah Pesanan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="card text-bg-warning text-center">
          <div class="card-header">
            <div class="card-title text-white">MENU MINUMAN</div>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div class="row">
      <div class="col-md-6" v-for="(drink, index) in drinks" :key="'drink-'+index">
        <div class="card border-warning mb-3" style="max-width: 600px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img :src="drink.image" class="img-fluid rounded-start" :alt="drink.name">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{ drink.name }}<span class="float-end"><Rupiah :angka="drink.price"/></span></h5>
                <p class="card-text">{{ drink.desc }}</p>
                <p class="card-text"><small class="text-body-secondary">&nbsp;</small></p>
                <button type="button" class="btn btn-warning float-end text-white" @click="addToCart(drink)">Tambah Pesanan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
