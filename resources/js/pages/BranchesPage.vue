<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Branches</h2>
      <BaseButton>Add Branch</BaseButton>
    </div>
    <DataTable :headers="['Branch', 'Address', 'Phone']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Colombo 07', 'Ward Place', '011 123 4567'],
  ['Negombo', 'Main Road', '031 555 8934']
];
</script>
