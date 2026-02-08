<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Invoices</h2>
      <BaseButton>Create Invoice</BaseButton>
    </div>
    <DataTable :headers="['Invoice', 'Student', 'Total', 'Status']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['INV-CMB-202410-0021', 'Anu Senanayake', 'LKR 3,500', 'Paid'],
  ['INV-CMB-202410-0022', 'Malith Jay', 'LKR 3,500', 'Unpaid']
];
</script>
