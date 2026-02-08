<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Payments</h2>
      <BaseButton>Record Payment</BaseButton>
    </div>
    <DataTable :headers="['Receipt', 'Student', 'Amount', 'Method']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['RCPT-2024-0102', 'Anu Senanayake', 'LKR 3,500', 'Cash'],
  ['RCPT-2024-0103', 'Malith Jay', 'LKR 2,000', 'Card']
];
</script>
