<template>
  <div class="space-y-4">
    <div class="rounded bg-white p-4 shadow">
      <h2 class="text-xl font-semibold">Exam Marks · Term 1 Quiz</h2>
      <p class="text-sm text-slate-500">Batch A · 2024-10-15</p>
    </div>
    <DataTable :headers="['Student', 'Score', 'Grade']" :rows="rows" />
  </div>
</template>

<script setup>
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Anu Senanayake', '82', 'A'],
  ['Malith Jay', '76', 'B']
];
</script>
