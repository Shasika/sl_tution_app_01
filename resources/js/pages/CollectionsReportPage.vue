<template>
  <div class="space-y-4">
    <h2 class="text-xl font-semibold">Collections Report</h2>
    <DataTable :headers="['Date', 'Branch', 'Total']" :rows="rows" />
  </div>
</template>

<script setup>
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['2024-10-12', 'Colombo 07', 'LKR 120,000'],
  ['2024-10-12', 'Negombo', 'LKR 65,000']
];
</script>
