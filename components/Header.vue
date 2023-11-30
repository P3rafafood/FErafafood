<script lang="ts" setup>

</script>

<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <NuxtLink to="/" class="navbar-brand">
          <img src="/assets/img/logo.jpg" alt="logo" width="50px" height="50px">
        </NuxtLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <NuxtLink class="nav-link" to="/menu">Macam Menu</NuxtLink>
            </li>
            <li class="nav-item mx-2">
              <NuxtLink class="nav-link" to="/order">Order Pesanan</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink class="btn btn-orange" to="/login">Log In</NuxtLink>
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