<script setup>
const token = useCookie('token')

const { data:res } = await useApiFetch('/admin/menu', {
    headers: {
      'Authorization': 'Bearer '+token.value
    }
  })

const menus = res.value

async function deleteMenu(event, id) {
  if (confirm('Are You Sure Want To Delete This ?')) {
    await useApiFetch(`/admin/menu/${id}`, {
      method: 'DELETE',
      headers: {
        'Authorization': 'Bearer '+token.value
      }
    })

    location.reload()
  }
}

definePageMeta({
  layout: 'admin'
})
</script>

<template>
  <div>
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <div class="row">
            <div class="col-md-6">
              Menu List
            </div>
            <div class="col-md-6">
              <NuxtLink class="btn btn-primary float-end" to="/admin/menu/create">Create</NuxtLink>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Desc</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(menu, index) in menus" :key="'menu-'+index">
                <td>
                  <img :src="menu.image" alt="image-menu" height="100px">
                </td>
                <td>{{ menu.name }}</td>
                <td>{{ menu.desc }}</td>
                <td>
                  <Rupiah :angka="menu.price"/>
                </td>
                <td>{{ menu.type }}</td>
                <td>
                  <NuxtLink class="btn btn-warning text-white" :to="'/admin/menu/'+menu._id">Edit</NuxtLink>
                  <button type="button" class="btn btn-danger mx-3" @click="deleteMenu(event, menu._id)">Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
