<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Halls</h2>
      <BaseButton>Add Hall</BaseButton>
    </div>
    <DataTable :headers="['Hall', 'Branch', 'Capacity']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Hall A', 'Colombo 07', '120'],
  ['Hall B', 'Colombo 07', '80']
];
</script>
