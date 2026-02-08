<template>
  <div class="space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold">Users</h2>
      <BaseButton>Add User</BaseButton>
    </div>
    <DataTable :headers="['Name', 'Role', 'Branch']" :rows="rows" />
  </div>
</template>

<script setup>
import BaseButton from '../components/ui/BaseButton.vue';
import DataTable from '../components/tables/DataTable.vue';

const rows = [
  ['Nimali Perera', 'Institute Admin', 'Colombo 07'],
  ['Kasun Silva', 'Teacher', 'Negombo']
];
</script>
