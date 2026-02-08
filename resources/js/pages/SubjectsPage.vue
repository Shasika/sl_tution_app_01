<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Subjects</h2>
      <BaseButton>Add Subject</BaseButton>
    </div>
    <DataTable :headers="['Subject', 'Stream']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Mathematics', 'O/L'],
  ['Chemistry', 'A/L']
];
</script>
