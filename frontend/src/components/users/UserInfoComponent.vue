<script setup lang="ts">
import type {User} from "@/interfaces/User";

const props = defineProps(['user']);
const user: User = props.user;

</script>

<template>
  <div class="w-full">
    <!--  Internal info  -->
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label for="id" class="block mb-2 text-sm font-medium text-gray-900 ">ID</label>
        <input
            type="text"
            id="id"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.id"
            disabled
        >
      </div>
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">E-mail</label>
        <input
            type="text"
            id="email"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.email"
            disabled
        >
      </div>
      <div>
        <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900 ">Latitude</label>
        <input
            type="text"
            id="latitude"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.latitude"
            disabled
        >
      </div>
      <div>
        <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900 ">Longitude</label>
        <input
            type="text"
            id="latitude"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.longitude"
            disabled
        >
      </div>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <div>
        <label for="weather_id" class="block mb-2 text-sm font-medium text-gray-900 ">Weather ID</label>
        <input
            type="text"
            id="weather_id"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.id"
            disabled
        >
      </div>
      <div>
        <label for="synced_at" class="block mb-2 text-sm font-medium text-gray-900 ">Synced at</label>
        <input
            type="text"
            id="synced_at"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.synced_at"
            disabled
        >
      </div>
    </div>
    <!--  External info  -->
    <div class="grid grid-cols-4 gap-4">
      <hr class="col-span-4">
      <div class="col-span-4">
        <span class="font-medium">Weather (on OpenWeather API)</span>
      </div>
      <div>
        <label for="dt" class="block mb-2 text-sm font-medium text-gray-900 ">DT</label>
        <input
            type="text"
            id="dt"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.dt"
            disabled
        >
      </div>
      <div>
        <label for="open_weather_id" class="block mb-2 text-sm font-medium text-gray-900 ">ID (on Open Weather)</label>
        <input
            type="text"
            id="open_weather_id"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.id"
            disabled
        >
      </div>
      <div class="col-span-2">
        <label for="cod" class="block mb-2 text-sm font-medium text-gray-900 ">Code</label>
        <input
            type="text"
            id="cod"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.cod"
            disabled
        >
      </div>
      <div>
        <label for="sunset" class="block mb-2 text-sm font-medium text-gray-900 ">Sunset</label>
        <input
            type="text"
            id="sunset"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.sys?.sunset"
            disabled
        >
      </div>
      <div>
        <label for="sunrise" class="block mb-2 text-sm font-medium text-gray-900 ">Sunrise</label>
        <input
            type="text"
            id="sunrise"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.sys?.sunrise"
            disabled
        >
      </div>
      <div>
        <label for="base" class="block mb-2 text-sm font-medium text-gray-900 ">Base</label>
        <input
            type="text"
            id="base"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.base"
            disabled
        >
      </div>
      <div>
        <label for="temperature" class="block mb-2 text-sm font-medium text-gray-900 ">Temperature</label>
        <input
            type="text"
            id="temperature"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.temp"
            disabled
        >
      </div>
      <div>
        <label for="humidity" class="block mb-2 text-sm font-medium text-gray-900 ">Humidity</label>
        <input
            type="text"
            id="humidity"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.humidity"
            disabled
        >
      </div>
      <div>
        <label for="pressure" class="block mb-2 text-sm font-medium text-gray-900 ">Pressure</label>
        <input
            type="text"
            id="pressure"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.pressure"
            disabled
        >
      </div>
      <div>
        <label for="max_temperature" class="block mb-2 text-sm font-medium text-gray-900 ">Max temperature</label>
        <input
            type="text"
            id="max_temperature"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.temp_max"
            disabled
        >
      </div>
      <div>
        <label for="min_temperature" class="block mb-2 text-sm font-medium text-gray-900 ">Min temperature</label>
        <input
            type="text"
            id="min_temperature"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.temp_min"
            disabled
        >
      </div>
      <div>
        <label for="sea_level" class="block mb-2 text-sm font-medium text-gray-900 ">Sea level</label>
        <input
            type="text"
            id="sea_level"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.sea_level"
            disabled
        >
      </div>
      <div>
        <label for="feels_like" class="block mb-2 text-sm font-medium text-gray-900 ">Feels like</label>
        <input
            type="text"
            id="feels_like"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.feels_like"
            disabled
        >
      </div>
      <div>
        <label for="ground_level" class="block mb-2 text-sm font-medium text-gray-900 ">Ground Level</label>
        <input
            type="text"
            id="ground_level"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.main?.grnd_level"
            disabled
        >
      </div>
      <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
        <input
            type="text"
            id="name"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.name"
            disabled
        >
      </div>
      <div>
        <label for="wind_degrees" class="block mb-2 text-sm font-medium text-gray-900 ">Wind degrees</label>
        <input
            type="text"
            id="wind_degrees"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.wind?.deg"
            disabled
        >
      </div>
      <div>
        <label for="wind_gust" class="block mb-2 text-sm font-medium text-gray-900 ">Wind gust</label>
        <input
            type="text"
            id="wind_gust"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.wind?.gust"
            disabled
        >
      </div>
      <div>
        <label for="wind_speed" class="block mb-2 text-sm font-medium text-gray-900 ">Wind speed</label>
        <input
            type="text"
            id="name"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.wind?.speed"
            disabled
        >
      </div>
      <div>
        <label for="clouds" class="block mb-2 text-sm font-medium text-gray-900 ">Clouds</label>
        <input
            type="text"
            id="clouds"
            class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :value="user.weather.description?.clouds?.all"
            disabled
        >
      </div>
      <hr class="col-span-4">
      <div class="col-span-4">
        <span class="font-medium">Weathers (multiple)</span>
      </div>
      <div v-for="weather in user.weather.description?.weather" class="grid grid-cols-4 gap-4 col-span-4">
        <div>
          <label for="id" class="block mb-2 text-sm font-medium text-gray-900 ">ID</label>
          <input
              type="text"
              id="id"
              class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              :value="weather.id"
              disabled
          >
        </div>
        <div>
          <label for="icon" class="block mb-2 text-sm font-medium text-gray-900 ">Icon</label>
          <input
              type="text"
              id="icon"
              class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              :value="weather.icon"
              disabled
          >
        </div>
        <div>
          <label for="main" class="block mb-2 text-sm font-medium text-gray-900 ">Main</label>
          <input
              type="text"
              id="main"
              class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              :value="weather.main"
              disabled
          >
        </div>
        <div>
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
          <input
              type="text"
              id="description"
              class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
              :value="weather.description"
              disabled
          >
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
