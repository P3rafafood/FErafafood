<script setup>
import { reactive, onMounted } from 'vue'

const { id } = useRoute().params
const token = useCookie('token')
const menu = reactive({
  name: '',
  price: '',
  type: '',
  desc: '',
  image: null
})

onMounted(async () => {
  const { data:res, error } = await useApiFetch(`/admin/menu/${id}`, {
    headers:{
      'Authorization': 'Bearer '+token.value,
    }
  });

  menu.name = res.value.name
  menu.price = res.value.price
  menu.type = res.value.type
  menu.desc = res.value.desc
})

function onChangeFile(event) {
  const file = event.target.files[0]
  menu.image = file
}

async function update() {
  let formData = new FormData();
  formData.append('name', menu.name)
  formData.append('price', menu.price)
  formData.append('type', menu.type)
  formData.append('desc', menu.desc)
  if (menu.image != null) {
    formData.append('image', menu.image)
  }
  formData.append('_method', "PUT")

  const {data, error} = await useApiFetch(`/admin/menu/${id}`, {
    headers:{
      'Authorization': 'Bearer '+token.value
    },
    method: 'POST',
    body: formData,
  })

  await navigateTo('/admin/menu')
}

definePageMeta({
  layout: 'admin'
})
</script>

<template>
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title">Edit Menu Form</div>
      </div>
      <div class="card-body">
        <form @submit.prevent="update" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="name" class="form-label">Menu Name</label>
            <input type="text" class="form-control" id="name" v-model="menu.name">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" v-model="menu.price">
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Menu Type</label>
            <select class="form-select" v-model="menu.type">
              <option selected disabled>Choose Menu Type</option>
              <option value="minuman">Minuman</option>
              <option value="makanan">Makanan</option>
            </select>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a desc menu" id="desc" v-model="menu.desc"></textarea>
            <label for="desc">Menu Desc</label>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image Menu</label>
            <input type="file" class="form-control" id="image" @change="onChangeFile">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
