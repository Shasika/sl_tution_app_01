<template>
  <div class="overflow-hidden rounded border border-slate-200 bg-white">
    <table class="min-w-full text-sm">
      <thead class="bg-slate-100 text-left text-slate-600">
        <tr>
          <th v-for="header in headers" :key="header" class="px-4 py-2 font-semibold">
            {{ header }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(row, index) in rows" :key="index" class="border-t border-slate-200">
          <td v-for="(cell, cellIndex) in row" :key="cellIndex" class="px-4 py-2">
            {{ cell }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
defineProps({
  headers: Array,
  rows: Array
});
</script>
