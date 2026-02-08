<template>
  <div class="space-y-4">
    <h2 class="text-xl font-semibold">Class Performance Report</h2>
    <DataTable :headers="['Class', 'Avg Score', 'Attendance %']" :rows="rows" />
  </div>
</template>

<script setup>
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Grade 10 Maths', '78', '92%'],
  ['A/L Chemistry', '81', '89%']
];
</script>
