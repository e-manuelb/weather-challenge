<script setup lang="ts">
import {useRoute} from "vue-router";
import {getUserService} from "@/services/users/UserService";
import {onMounted, ref} from "vue";
import UserInfoComponent from "@/components/users/UserInfoComponent.vue";

const route = useRoute();

const userId = route.params.id;

let user = ref();

function getUser() {
  getUserService(userId)
      .then((response: any) => {
        user.value = response.data;
      });
}

onMounted(() => {
  getUser();
})
</script>

<template>
  <div v-if="user" class="flex px-4 justify-center">
    <UserInfoComponent :user="user"/>
  </div>
</template>

<style scoped>

</style>
