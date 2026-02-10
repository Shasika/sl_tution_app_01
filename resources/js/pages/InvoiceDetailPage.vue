<template>
  <div class="space-y-4">
    <div class="rounded bg-white p-4 shadow">
      <h2 class="text-xl font-semibold">Invoice INV-CMB-202410-0022</h2>
      <p class="text-sm text-slate-500">Due: 2024-10-20 · Student: Malith Jay</p>
    </div>
    <div class="rounded bg-white p-4 shadow">
      <h3 class="text-lg font-semibold">Items</h3>
      <DataTable :headers="['Description', 'Qty', 'Amount']" :rows="rows" />
      <div class="mt-4 flex justify-end text-sm font-semibold">Total: LKR 3,500</div>
    </div>
  </div>
</template>

<script setup>
import DataTable from '../components/tables/DataTable.vue';

const rows = [['Grade 10 Maths · Monthly Fee', '1', 'LKR 3,500']];
</script>
