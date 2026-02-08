<template>
  <div class="space-y-4">
    <div class="rounded bg-white p-4 shadow">
      <h2 class="text-xl font-semibold">Attendance · Batch A</h2>
      <p class="text-sm text-slate-500">Sunday 2:00 PM · Hall A</p>
      <div class="mt-4 flex items-center gap-4">
        <div class="rounded border border-dashed border-slate-300 p-4 text-sm text-slate-500">
          QR code placeholder
        </div>
        <div class="text-sm text-slate-600">
          Students can scan the QR to check in. Manual overrides require Attendance Manager permission.
        </div>
      </div>
    </div>
    <DataTable :headers="['Student', 'Status', 'Method']" :rows="rows" />
  </div>
</template>

<script setup>
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Anu Senanayake', 'Present', 'QR'],
  ['Malith Jay', 'Late', 'Manual']
];
</script>
