<template>
  <div class="space-y-4">
    <h2 class="text-xl font-semibold">Arrears Report</h2>
    <DataTable :headers="['Student', 'Amount Due', 'Days']" :rows="rows" />
  </div>
</template>

<script setup>
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Malith Jay', 'LKR 3,500', '12'],
  ['Saji Perera', 'LKR 7,000', '25']
];
</script>
