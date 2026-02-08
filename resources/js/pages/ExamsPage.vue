<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Exams</h2>
      <BaseButton>Create Exam</BaseButton>
    </div>
    <DataTable :headers="['Exam', 'Batch', 'Date']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Term 1 Quiz', 'Batch A', '2024-10-15'],
  ['Mock Exam', 'Batch B', '2024-10-22']
];
</script>
