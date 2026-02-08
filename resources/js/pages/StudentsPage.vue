<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Students</h2>
      <BaseButton>Register Student</BaseButton>
    </div>
    <DataTable :headers="['Reg No', 'Name', 'Grade', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['LAKB-2024-0012', 'Anu Senanayake', 'Grade 10', 'Active'],
  ['LAKB-2024-0013', 'Malith Jay', 'Grade 11', 'Active']
];
</script>
