<script setup lang="ts">
import {listUsersService} from "@/services/users/UserService";
import {onMounted, ref} from "vue";
import UsersTableComponent from "@/components/users/UsersTableComponent.vue";

let data = ref();

function listUsers(page?: number) {
  listUsersService(page)
      .then((response: any) => {
        data.value = response.data;
      });
}

function onPageChange(page: number) {
  listUsers(page);
}

onMounted(() => {
  listUsers();
})

</script>

<template>
  <div v-if="data" class="row flex justify-center">
    <UsersTableComponent @on-page-change="(n) => onPageChange(n)" :data="data"/>
  </div>
</template>

<style scoped>

</style>
