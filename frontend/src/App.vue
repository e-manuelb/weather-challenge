<script setup lang="ts">
import {RouterView} from "vue-router";
import Navbar from "@/components/navbar/Navbar.vue";
import Footer from "@/components/footer/Footer.vue";
</script>

<template>
  <header class="mb-5">
    <div class="wrapper">
      <Navbar/>
    </div>
  </header>
  <RouterView />
  <footer class="mt-5">
    <Footer/>
  </footer>
</template>

<style scoped>

</style>
