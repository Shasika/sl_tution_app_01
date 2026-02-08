<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Institutes</h2>
      <BaseButton>Create Institute</BaseButton>
    </div>
    <DataTable :headers="['Name', 'Code', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Lakbima Institute', 'LAKB', 'Active'],
  ['City Scholars', 'CITY', 'Active']
];
</script>
