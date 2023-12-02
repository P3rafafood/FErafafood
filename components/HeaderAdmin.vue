<script setup>
  const token = useCookie('token')
  const { data: res } = await useApiFetch('/admin/order/notification', {
    headers: {
      'Authorization': 'Bearer '+token.value
    }
  })
  const notifCount = res.value.count

  async function logout() {
    const token = useCookie('token')
    const { data: res } = await useApiFetch('/auth/logout', {
      headers: {
        'Authorization': 'Bearer '+token.value
      },
      method: 'POST'
    })

    token.value = ''

    await navigateTo('/')
  }
</script>

<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <NuxtLink to="/admin" class="navbar-brand">
          <img src="/img/logo.jpg" alt="logo" width="50px" height="50px">
        </NuxtLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/admin/menu">Menu</NuxtLink>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Order
              </a>
              <ul class="dropdown-menu">
                <li><NuxtLink class="dropdown-item" to="/admin/order/today">Today ({{ notifCount }}) </NuxtLink></li>
                <li><NuxtLink class="dropdown-item" to="/admin/order/history">History</NuxtLink></li>
              </ul>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-orange" @click="logout">Sign Out</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<style scoped>
.btn-orange {
  color: white;
  background-color: orange;
}
</style>