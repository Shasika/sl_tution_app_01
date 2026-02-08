<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Batches</h2>
      <BaseButton>Create Batch</BaseButton>
    </div>
    <DataTable :headers="['Batch', 'Course', 'Hall']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Batch A', 'Grade 10 Maths', 'Hall A'],
  ['Batch B', 'A/L Chemistry', 'Hall B']
];
</script>
