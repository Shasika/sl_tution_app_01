<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Grades</h2>
      <BaseButton>Add Grade</BaseButton>
    </div>
    <DataTable :headers="['Grade', 'Level']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Grade 10', 'O/L'],
  ['Grade 12', 'A/L']
];
</script>
