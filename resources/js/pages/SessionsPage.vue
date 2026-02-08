<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Sessions</h2>
      <BaseButton>Create Session</BaseButton>
    </div>
    <DataTable :headers="['Date', 'Batch', 'Hall', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['2024-10-12', 'Batch A', 'Hall A', 'Scheduled'],
  ['2024-10-13', 'Batch B', 'Hall B', 'Scheduled']
];
</script>
