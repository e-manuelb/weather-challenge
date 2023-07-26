<script setup lang="ts">
import router from "@/router";
import type {ListUsersResponse} from "@/interfaces/responses/ListUsersResponse";
import {ref, watch} from "vue";

function navigation(url: string) {
  router.replace(url);
}

let emit = defineEmits(['onPageChange']);

let props = defineProps(['data']);

let tableData: ListUsersResponse = props.data;

let page = ref(1);

watch(page, (newPage) => {
  emit('onPageChange', newPage);
});

watch(props, (newProps) => {
  tableData = newProps.data;
});

function togglePreviousPage() {
  if (page.value != tableData.from) {
    page.value -= 1;

    togglePageChange(page.value);
  }
}

function toggleNextPage() {
  if (page.value != tableData.last_page) {
    page.value += 1;

    togglePageChange(page.value);
  }
}

function togglePageChange(number: number) {
  page.value = number;
}

</script>
<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          Name
        </th>
        <th scope="col" class="px-6 py-3">
          Email
        </th>
        <th scope="col" class="px-6 py-3">
          Latitude
        </th>
        <th scope="col" class="px-6 py-3">
          Longitude
        </th>
        <th scope="col" class="px-6 py-3">
          Min temperature
        </th>
        <th scope="col" class="px-6 py-3">
          Max temperature
        </th>
        <th scope="col" class="px-6 py-3">
          Weather
        </th>
        <th scope="col" class="px-6 py-3">
          Synced at
        </th>
        <th scope="col" class="px-6 py-3 text-center">
          Actions
        </th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="user in tableData.data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          {{ user.name }}
        </th>
        <td class="px-6 py-4">
          {{ user.email }}
        </td>
        <td class="px-6 py-4">
          {{ user.latitude }}
        </td>
        <td class="px-6 py-4">
          {{ user.longitude }}
        </td>
        <td class="px-6 py-4">
          {{ user.weather.description.main.temp_min }}
        </td>
        <td class="px-6 py-4">
          {{ user.weather.description.main.temp_max }}
        </td>
        <td class="px-6 py-4">
          {{ user.weather.description.weather[0].description }}
        </td>
        <td class="px-6 py-4">
          {{ user.weather.synced_at }}
        </td>
        <td class="px-6 py-4">
          <div class="inline-flex rounded-md shadow-sm" role="group">
            <button
                @click="navigation(`/users/${user.id}`)"
                type="button"
                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
              Info
            </button>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
      <div class="flex flex-1 justify-between sm:hidden">
        <a href="#"
           class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
        <a href="#"
           class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
      </div>
      <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>
          <p class="text-sm text-gray-700">
            Showing
            <span class="font-medium">{{ tableData.from }}</span>
            to
            <span class="font-medium">{{ tableData.to }}</span>
            of
            <span class="font-medium">{{ tableData.total }}</span>
            results
          </p>
        </div>
        <div>
          <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
            <a
                @click="togglePreviousPage()"
                href="#"
                class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
              <span class="sr-only">Previous</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                    clip-rule="evenodd"
                />
              </svg>
            </a>
            <div v-for="index in tableData.last_page">
              <a
                  v-if="page == index"
                  @click="togglePageChange(index)"
                  href="#"
                  aria-current="page"
                  class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ index }}
              </a>
              <a
                  v-else
                  @click="togglePageChange(index)"
                  href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                {{ index }}
              </a>
            </div>
            <a
                @click="toggleNextPage()"
                href="#"
                class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
              <span class="sr-only">Next</span>
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path
                    fill-rule="evenodd"
                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                    clip-rule="evenodd"
                />
              </svg>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>
